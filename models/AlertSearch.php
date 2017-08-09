<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Alert;

/**
 * AlertSearch represents the model behind the search form about `app\models\Alert`.
 */
class AlertSearch extends Alert
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'scan_id', 'test_id', 'count', 'cweid', 'wascid', 'sourceid'], 'integer'],
            [['alert', 'name', 'riskcode', 'confidence', 'riskdesc', 'description', 'solution', 'reference', 'review_status', 'reviewed_by', 'review_completed'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Alert::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'scan_id' => $this->scan_id,
            'test_id' => $this->test_id,
            'count' => $this->count,
            'cweid' => $this->cweid,
            'wascid' => $this->wascid,
            'sourceid' => $this->sourceid,
            'review_completed' => $this->review_completed,
        ]);

        $query->andFilterWhere(['like', 'alert', $this->alert])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'riskcode', $this->riskcode])
            ->andFilterWhere(['like', 'confidence', $this->confidence])
            ->andFilterWhere(['like', 'riskdesc', $this->riskdesc])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'solution', $this->solution])
            ->andFilterWhere(['like', 'reference', $this->reference])
            ->andFilterWhere(['like', 'review_status', $this->review_status])
            ->andFilterWhere(['like', 'reviewed_by', $this->reviewed_by]);

        return $dataProvider;
    }
}
