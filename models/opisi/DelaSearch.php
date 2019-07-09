<?php

namespace app\models\opisi;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\opisi\Dela;

/**
 * DelaSearch represents the model behind the search form of `app\models\opisi\Dela`.
 */
class DelaSearch extends Dela
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nomer_fonda', 'opisi_num', 'delo_num', 'papka_fond', 'papka_opis', 'papka_delo', 'title'], 'safe'],
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
        $query = Dela::find();

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

        $query->andFilterWhere(['like', 'nomer_fonda', $this->nomer_fonda])
            ->andFilterWhere(['like', 'opisi_num', $this->opisi_num])
            ->andFilterWhere(['like', 'delo_num', $this->delo_num])
            ->andFilterWhere(['like', 'papka_fond', $this->papka_fond])
            ->andFilterWhere(['like', 'papka_opis', $this->papka_opis])
            ->andFilterWhere(['like', 'papka_delo', $this->papka_delo])
            ->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
