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

    public $tag_name;
    public $fond_name;

    public function rules()
    {
        return [
            [['papka', 'nomer_fonda', 'name_fond', 'count_opisi', 'tag_id'], 'required'],
            [['name_fond', 'dates'], 'string'],
            [['count_opisi', 'fond_id', 'tag_id'], 'integer'],
            [['papka', 'count_items'], 'string', 'max' => 20],
            [['nomer_fonda'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'papka' => 'Papka',
            'nomer_fonda' => 'Nomer Fonda',
            'name_fond' => 'Name Fond',
            'count_items' => 'Count Items',
            'count_opisi' => 'Count Opisi',
            'dates' => 'Dates',
            'fond_id' => 'Fond ID',
            'tag_id' => 'Tag ID',
        ];
    }

    public function getNameFond(){
        return $this->hasOne(RegionFondName::className(), ['id' => 'fond_id']);
    }

    public function getNameTag(){
        return $this->hasOne(RegionTagName::className(), ['id' => 'tag_id']);
    }
}
