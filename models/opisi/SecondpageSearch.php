<?php

namespace app\models\opisi;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\opisi\Secondpage;

/**
 * SecondpageSearch represents the model behind the search form of `app\models\opisi\Secondpage`.
 */
class SecondpageSearch extends Secondpage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['papka', 'podpapka', 'nomer_opisi', 'name_opisi', 'copy_opisi', 'count_opisis', 'years'], 'safe'],
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
        $query = Secondpage::useTable($tablename);//::find();
        $query = $query -> find();

        if($cfk){
            $query->innerjoinWith('dela')->groupBy($tablename.'.papka');
            echo $query->createCommand()->getRawSql();

        }
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
        ]);

        $query->andFilterWhere(['like', 'papka', $this->papka])
            ->andFilterWhere(['like', 'podpapka', $this->podpapka])
            ->andFilterWhere(['like', 'nomer_opisi', $this->nomer_opisi])
            ->andFilterWhere(['like', 'name_opisi', $this->name_opisi])
            ->andFilterWhere(['like', 'copy_opisi', $this->copy_opisi])
            ->andFilterWhere(['like', 'count_opisis', $this->count_opisis])
            ->andFilterWhere(['like', 'years', $this->years]);

        return $dataProvider;
    }
}
