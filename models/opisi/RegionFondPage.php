<?php

namespace app\models\opisi;

use Yii;

/**
 * This is the model class for table "region_fond_page".
 *
 * @property int $id
 * @property string $papka
 * @property string $nomer_fonda
 * @property string $name_fond
 * @property string $count_items
 * @property int $count_opisi
 * @property string $dates
 * @property int $fond_id
 * @property int $tag_id
 */
class RegionFondPage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */


    public static function tableName()
    {
        return 'region_fond_page';
    }

    /**
     * {@inheritdoc}
     */



    public function rules()
    {
        return [
            [['papka', 'nomer_fonda', 'name_fond', 'count_opisi', 'tag_id'], 'required'],
            [['name_fond', 'dates'], 'string'],
            [['count_opisi', 'fond_id', 'tag_id'], 'integer'],
            [['papka', 'count_items'], 'string', 'max' => 20],
            [['nomer_fonda'], 'string', 'max' => 100],
            [['nameFond'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'papka' => 'Папка',
            'nomer_fonda' => '№ фонду',
            'name_fond' => 'Назва фонду',
            'count_items' => 'Кількість од.зб.',
            'count_opisi' => 'Кількість описів',
            'dates' => 'Крайні дати',
            'nameTagsString' => 'Тип установи',
            'nameFondsString' => 'Назва установи',
        ];
    }

    public function getNameFonds(){
        return $this->hasOne(RegionFondName::className(), ['id' => 'fond_id']);
    }

    public function getNameTags(){
        return $this->hasOne(RegionTagName::className(), ['id' => 'tag_id']);
    }

    public function getNameFondsString() {
        return $this->nameFonds->fond_name;
    }

    public function getNameTagsString(){
        return $this->nameTags->tag_name;
    }
}
