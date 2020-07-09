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
//    public $nameTagsString;
    public $nameFondsString;
    public $nameFondsTagString;


    public function rules()
    {
        return [
            [['id', 'count_opisi', 'fond_id', 'tag_id'], 'integer'],
            [['papka', 'nomer_fonda', 'name_fond', 'count_items',
                'dates', 'nameFondsString', 'nameTagsString', 'nameFondsTagString'], 'safe'],
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

//        $query->joinWith(['nameFonds']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'nomer_fonda',
                'name_fond',
                'nameFondsString' => [
                    'asc' => ['region_fond_name.fond_name' => SORT_ASC],
                    'desc' => ['region_fond_name.fond_name' => SORT_DESC],
                    'label' => 'Link Name'
                ],
                'nameFondsTagString' => [
                    'asc' => ['region_tag_name.tag_name' => SORT_ASC],
                    'desc' => ['region_tag_name.tag_name' => SORT_DESC],
                    'label' => 'Link Name tag'
                ]
            ]]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
//            $query->joinWith(['nameFonds']);
            return $dataProvider;
        }



        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'count_opisi' => $this->count_opisi,
            'fond_id' => $this->fond_id,
//            'tag_id' => $this->tag_id,
        ]);

        $query->andFilterWhere(['like', 'papka', $this->papka])
            ->andFilterWhere(['like', 'nomer_fonda', $this->nomer_fonda])
            ->andFilterWhere(['like', 'name_fond', $this->name_fond])
            ->andFilterWhere(['like', 'count_items', $this->count_items])
            ->andFilterWhere(['like', 'dates', $this->dates]);

        $query->joinWith(['nameFonds' => function ($q) {
            $q->where('region_fond_name.fond_name LIKE "%' . $this->nameFondsString . '%"');
        }]);
        $query->joinWith(['nameTags' => function ($q) {
            //$q->where('region_tag_name.tag_name LIKE "%' . $this->nameTagsString . '%"');
            $q->where('region_tag_name.tag_name LIKE "%' . $this->nameFondsTagString . '%"');
        }]);


        return $dataProvider;
    }
}
