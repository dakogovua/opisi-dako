<?php

namespace app\models\opisi;

use Yii;

/**
 * This is the model class for table "region_tag_name".
 *
 * @property int $id
 * @property string $tag_name
 */
class RegionTagName extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_tag_name';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Tag Name',
        ];
    }

    public function getFonds(){
        return $this->hasMany(RegionFondName::className(), ['id'=> 'fond_name_id'])
            ->viaTable(RegionTagLink::tableName(), ['tag_id' => 'id']);
    }

//    public function getFondsString()
//    {
//        $arr = \yii\helpers\ArrayHelper::map($this->fonds,'id', 'fond_name');
//        echo implode("</li></a><li><a>", $arr);
//        return implode("</li></a><li><a>", $arr);
//    }
}
