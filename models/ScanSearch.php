<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Scan;

/**
 * ScanSearch represents the model behind the search form about `app\models\Scan`.
 */
class ScanSearch extends Scan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id'], 'integer'],
            [['tool', 'version', 'scan_date', 'base_url', 'host', 'port', 'reviewed_by', 'review_completed'], 'safe'],
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
        $query = Scan::find();

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
            'project_id' => $this->project_id,
            'scan_date' => $this->scan_date,
            'review_completed' => $this->review_completed,
        ]);

        $query->andFilterWhere(['like', 'tool', $this->tool])
            ->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'base_url', $this->base_url])
            ->andFilterWhere(['like', 'host', $this->host])
            ->andFilterWhere(['like', 'port', $this->port])
            ->andFilterWhere(['like', 'reviewed_by', $this->reviewed_by]);

        return $dataProvider;
    }
}
