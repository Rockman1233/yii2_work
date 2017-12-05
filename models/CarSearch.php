<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Car;

/**
 * CarSearch represents the model behind the search form about `app\models\Car`.
 */
class CarSearch extends Car
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['car_id', 'car_owner', 'consumption', 'cost_less_30_inc', 'cost_more_31', 'mileage', 'year'], 'integer'],
            [['colour', 'foto', 'mark', 'model', 'state_num'], 'safe'],
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
        $query = Car::find();

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
            'car_id' => $this->car_id,
            'car_owner' => $this->car_owner,
            'consumption' => $this->consumption,
            'cost_less_30_inc' => $this->cost_less_30_inc,
            'cost_more_31' => $this->cost_more_31,
            'mileage' => $this->mileage,
            'year' => $this->year,
        ]);

        $query->andFilterWhere(['like', 'colour', $this->colour])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'mark', $this->mark])
            ->andFilterWhere(['like', 'model', $this->model])
            ->andFilterWhere(['like', 'state_num', $this->state_num]);

        return $dataProvider;
    }
}
