<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "note".
 *
 * @property integer $id
 * @property integer $scan_id
 * @property integer $alert_id
 * @property integer $instance_id
 * @property string $text
 * @property string $created_by
 * @property string $created_date
 * @property string $updated_by
 * @property string $updated_date
 */
class Note extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'note';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['scan_id', 'alert_id', 'instance_id'], 'integer', 'skipOnEmpty' => true],
            [['text'], 'string'],
            [['created_date', 'updated_date'], 'safe'],
            [['created_by', 'updated_by'], 'string', 'max' => 255],
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
            'alert_id' => 'Alert ID',
            'instance_id' => 'Instance ID',
            'text' => 'Text',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'updated_by' => 'Updated By',
            'updated_date' => 'Updated Date',
        ];
    }
}
