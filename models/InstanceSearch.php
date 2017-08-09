<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Instance;

/**
 * InstanceSearch represents the model behind the search form about `app\models\Instance`.
 */
class InstanceSearch extends Instance
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'alert_id'], 'integer'],
            [['uri', 'method', 'parameter', 'evidence', 'attack', 'review_status', 'reviewed_by', 'review_completed'], 'safe'],
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
        $query = Instance::find();

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
            'alert_id' => $this->alert_id,
            'review_completed' => $this->review_completed,
        ]);

        $query->andFilterWhere(['like', 'uri', $this->uri])
            ->andFilterWhere(['like', 'method', $this->method])
            ->andFilterWhere(['like', 'parameter', $this->parameter])
            ->andFilterWhere(['like', 'evidence', $this->evidence])
            ->andFilterWhere(['like', 'attack', $this->attack])
            ->andFilterWhere(['like', 'review_status', $this->review_status])
            ->andFilterWhere(['like', 'reviewed_by', $this->reviewed_by]);

        return $dataProvider;
    }
}
