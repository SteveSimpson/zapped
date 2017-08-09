<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scan".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $tool
 * @property string $version
 * @property string $scan_date
 * @property string $base_url
 * @property string $host
 * @property string $port
 * @property string $reviewed_by
 * @property string $review_completed
 * 
 * @property Project $project
 * @property Alert[] $alerts
 * @property Note[] $notes
 */
class Scan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'scan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'integer'],
            [['scan_date', 'review_completed'], 'safe'],
            [['tool', 'version', 'base_url', 'host', 'port', 'reviewed_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => 'Project ID',
            'tool' => 'Tool',
            'version' => 'Version',
            'scan_date' => 'Scan Date',
            'base_url' => 'Base Url',
            'host' => 'Host',
            'port' => 'Port',
            'reviewed_by' => 'Reviewed By',
            'review_completed' => 'Review Completed',
        ];
    }
    
    /**
     * 
     * {@inheritDoc}
     * @see \yii\base\Arrayable::toArray()
     */
    public function toArray(array $fields = [], array $expand = [], $recursive = true)
    {
        return [
            'id' => $this->id,
            'project_id' => $this->project_id,
            'tool' => $this->tool,
            'version' => $this->version,
            'scan_date' => $this->scan_date,
            'base_url' => $this->base_url,
            'host' => $this->host,
            'port' => $this->port,
            'reviewed_by' => $this->reviewed_by,
            'review_completed' => $this->review_completed,
        ];
    }
    
    /**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id'=>'project_id']);
    }
    
    /**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getAlerts()
    {
        return $this->hasMany(Alert::className(), ['scan_id'=>'id'])->orderBy(['riskcode'=>SORT_DESC]);
    }
    
    /**
     * 
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['scan_id'=>'id']);
    }
    
    /**
     * 
     * @param string $xmlstring
     * @return \app\models\Scan
     */
    public static function createScanFromZapXml($projectId, $xmlstring)
    {                    
        $alertProps = [
            'pluginid' => 'test_id',
            'alert',
            'name',
            'riskcode',
            'riskdesc',
            'confidence',
            'desc' => 'description',
            'count',
            'solution',
            'reference',
            'cweid',
            'wascid',
            'sourceid',
        ];
            
        $instanceProps = [
            'uri',
            'method',
            'parameter' => 'param',
            'evidence',
            'attack',
        ];
        
        $scan = new self();
        
        $scan->project_id = $projectId;
        
        $xml = simplexml_load_string($xmlstring);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        
        if (isset($array['@attributes']['version'])) {
            $scan->version = $array['@attributes']['version'];
        }
        
        if (isset($array['@attributes']['generated'])) {
            $scan->scan_date = date('Y-m-d H:i:s', strtotime($array['@attributes']['generated']));
        }
        
        
        
        if (isset($array['site'])) {
            $site = $array['site'];
            
            foreach (['name'=>'base_url', 'host'=>'host', 'port'=>'port'] as $key=>$prop) {
                if (isset($site['@attributes'][$key])) {
                    $scan->$prop = $site['@attributes'][$key];
                }
            }
            
            if (!$scan->save()) {
                \Yii::Error("Scan not saved.", __CLASS__ . '::' . __FUNCTION__);
                if ($scan->hasErrors()) {
                    \Yii::warning(json_encode($scan->errors), __CLASS__ . '::' . __FUNCTION__);
                }
                return false;
            }

            if (isset($site['alerts']['alertitem'])) {
                foreach ($site['alerts']['alertitem'] as $alertitem) {
                    $alert = new Alert();
                    
                    $alert->scan_id = $scan->id;
                    
                    foreach ($alertProps as $key => $prop) {
                        if (is_int($key)) {
                            $key = $prop;
                        }
                        
                        if (isset($alertitem[$key])) {
                            $alert->$prop = $alertitem[$key];
                        }
                    }
                    
                    if (!$alert->save()) {
                        \Yii::warning("Alert for scan: " . $scan->id . " not saved.", __CLASS__ . '::' . __FUNCTION__);
                        
                        if ($alert->hasErrors()) {
                            \Yii::warning(json_encode($alert->errors), __CLASS__ . '::' . __FUNCTION__);
                        }
                    } else {
                        if (isset($alertitem['instances']['instance'])) {
                            foreach ($alertitem['instances']['instance'] as $instanceitem) {
                                $instance = new Instance();
                                
                                $instance->alert_id = $alert->id;
                                foreach ($instanceProps as $key => $prop) {
                                    if (is_int($key)) {
                                        $key = $prop;
                                    }
                                    
                                    if (isset($instanceitem[$key])) {
                                        $instance->$prop = $instanceitem[$key];
                                    }
                                }
                                
                                if (!$instance->save()) {
                                    \Yii::warning("Instance for scan: " . $scan->id . ", alert: ".$alert->id." not saved.", __CLASS__ . '::' . __FUNCTION__);
                                    
                                    if ($instance->hasErrors()) {
                                        \Yii::warning(json_encode($instance->errors), __CLASS__ . '::' . __FUNCTION__);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        
        return $scan;
    }
}
