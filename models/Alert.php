<?php

namespace app\models;

use Yii;
use \kartik\helpers\Html;

/**
 * This is the model class for table "alert".
 *
 * @property integer $id
 * @property integer $scan_id
 * @property integer $test_id
 * @property string $alert
 * @property string $name
 * @property string $riskcode
 * @property string $confidence
 * @property string $riskdesc
 * @property string $description
 * @property string $descriptionClean
 * @property integer $count
 * @property string $solution
 * @property string $solutionClean
 * @property string $reference
 * @property string $referenceClean
 * @property integer $cweid
 * @property integer $wascid
 * @property integer $sourceid
 * @property string $review_status
 * @property string $reviewed_by
 * @property string $review_completed
 *
 * @property Project $project
 * @property Scan $scan
 * @property Note[] $notes
 * @property Instance[] $instances
 * @property string $severity
 */
class Alert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['scan_id', 'test_id', 'count', 'cweid', 'wascid', 'sourceid'], 'integer'],
            [['riskdesc', 'description', 'solution', 'reference'], 'string'],
            [['review_completed'], 'safe'],
            [['alert', 'name', 'riskcode', 'confidence', 'review_status', 'reviewed_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'scan_id' => 'Scan ID',
            'test_id' => 'Test ID',
            'alert' => 'Alert',
            'name' => 'Name',
            'riskcode' => 'Riskcode',
            'confidence' => 'Confidence',
            'riskdesc' => 'Riskdesc',
            'description' => 'Description',
            'descriptionClean' => 'Description',
            'count' => 'Count',
            'solution' => 'Solution',
            'reference' => 'Reference',
            'solutionClean' => 'Solution',
            'referenceClean' => 'Reference',
            'cweid' => 'CWEID',
            'wascid' => 'WASCID',
            'sourceid' => 'Source ID',
            'review_status' => 'Review Status',
            'reviewed_by' => 'Reviewed By',
            'review_completed' => 'Review Completed',
        ];
    }

    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id'=>'project_id'])->viaTable('scan', ['scan_id'=>'id']);
    }

    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScan()
    {
        return $this->hasOne(Scan::className(), ['id'=>'scan_id']);
    }

    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInstances()
    {
        return $this->hasMany(Instance::className(), ['alert_id'=>'id']);
    }

    /**
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNotes()
    {
        return $this->hasMany(Note::className(), ['alert_id'=>'id']);
    }

    public function getSeverity()
    {
        switch ($this->riskcode) {
            case 3:
                return "High";
            case 2:
                return "Medium";
            case 1:
                return "Low";
        }
        return "Info";
    }

    public function getDescriptionClean()
    {
        return $this->clean($this->description);
    }

    public function getSolutionClean()
    {
        return $this->clean($this->solution);
    }

    public function getReferenceClean()
    {
        $refList = explode('</p>', $this->reference);
        //explode($this->clean($this->reference);

        $urls = [];

        foreach ($refList as $ref){
            $url = trim(filter_var($ref, FILTER_SANITIZE_STRING));

            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $urls[] = Html::a($url, $url, ['target'=>'_blank']);
            } elseif (strlen($url) > 0) {
                $urls[] = $url;
            }
        }

        return Html::ul($urls,['encode'=>false]);
    }

    protected function clean($value)
    {
        $value = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
        return str_replace(['&#60;p&#62;','&#60;/p&#62;'], ['<p>','</p>'], $value);
    }
}
