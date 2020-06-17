<?php

namespace app\models\opisi;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\opisi\RegionFondPage;

/**
 * RegionFondPageSearch represents the model behind the search form of `app\models\opisi\RegionFondPage`.
 */
class RegionFondPageSearch extends RegionFondPage
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'count_opisi', 'fond_id', 'tag_id'], 'integer'],
            [['papka', 'nomer_fonda', 'name_fond', 'count_items', 'dates'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = RegionFondPage::find();

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
            'count_opisi' => $this->count_opisi,
            'fond_id' => $this->fond_id,
            'tag_id' => $this->tag_id,
        ]);

        $query->andFilterWhere(['like', 'papka', $this->papka])
            ->andFilterWhere(['like', 'nomer_fonda', $this->nomer_fonda])
            ->andFilterWhere(['like', 'name_fond', $this->name_fond])
            ->andFilterWhere(['like', 'count_items', $this->count_items])
            ->andFilterWhere(['like', 'dates', $this->dates]);

        return $dataProvider;
    }
}
