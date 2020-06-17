<?php

namespace app\models\opisi;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\opisi\RegionFondName;

/**
 * RegionFondNameSearch represents the model behind the search form of `app\models\opisi\RegionFondName`.
 */
class RegionFondNameSearch extends RegionFondName
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fond_name'], 'safe'],
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
        $query = RegionFondName::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['tagNames'] = [
            'asc' => ['tagNames.tagsString' => SORT_ASC],
            'desc' => ['tagNames.tagsString' => SORT_DESC],
        ];


        $query->joinWith('tagNames');

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

        $query->andFilterWhere(['like', 'fond_name', $this->fond_name]);


        return $dataProvider;
    }
}
