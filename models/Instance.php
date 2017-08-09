<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "instance".
 *
 * @property integer $id
 * @property integer $alert_id
 * @property string $uri
 * @property string $method
 * @property string $parameter
 * @property string $evidence
 * @property string $attack
 * @property string $review_status
 * @property string $reviewed_by
 * @property string $review_completed
 */
class Instance extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'instance';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alert_id'], 'integer'],
            [['uri', 'evidence', 'attack'], 'string'],
            [['review_completed'], 'safe'],
            [['method', 'parameter', 'review_status', 'reviewed_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alert_id' => 'Alert ID',
            'uri' => 'Uri',
            'method' => 'Method',
            'parameter' => 'Parameter',
            'evidence' => 'Evidence',
            'attack' => 'Attack',
            'review_status' => 'Review Status',
            'reviewed_by' => 'Reviewed By',
            'review_completed' => 'Review Completed',
        ];
    }
}
