<?php

namespace app\models\opisi;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\opisi\Firstpage;

/**
 * FirstpageSearch represents the model behind the search form of `app\models\opisi\Firstpage`.
 */
class FirstpageSearch extends Firstpage
{


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count_items', 'count_opisi'], 'integer'],
            [['papka', 'nomer_fonda', 'name_fond', 'dates'], 'safe'],
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
    public function search($params, $tablename)
    {
        $query = Firstpage::useTable($tablename);//::find();
        $query=$query->find();


        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => array('pageSize' => 50),
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
            'count_items' => $this->count_items,
            'count_opisi' => $this->count_opisi,
        ]);

        $query->andFilterWhere(['like', 'papka', $this->papka])
            ->andFilterWhere(['like', 'nomer_fonda', $this->nomer_fonda])
            ->andFilterWhere(['like', 'name_fond', $this->name_fond])
            ->andFilterWhere(['like', 'dates', $this->dates]);



        return $dataProvider;

    }
}
