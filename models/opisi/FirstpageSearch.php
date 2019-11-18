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
    public $dela;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'count_items', 'count_opisi'], 'integer'],
            [['papka', 'nomer_fonda', 'name_fond', 'dates', 'dela'], 'safe'],
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
    public function search($params, $tablename, $cfk)
    {
        $query = Firstpage::useTable($tablename);//::find();
        $query = $query->find();

        if($cfk){
            $query->innerjoinWith('dela')->groupBy($tablename.'.papka');
        }


       // print_r($query);
       // exit();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
			'pagination' => array('pageSize' => 50),
        ]);

        $dataProvider->sort->attributes['dela'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['dela.id' => SORT_ASC],
            'desc' => ['dela.id' => SORT_DESC],
        ];

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
            ->andFilterWhere(['like', 'dates', $this->dates])
            ->andFilterWhere(['like', 'dela.id', $this->dela]);



        return $dataProvider;

    }
}
