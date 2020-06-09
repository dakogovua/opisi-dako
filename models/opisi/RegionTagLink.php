<?php

namespace app\models\opisi;

use Yii;

/**
 * This is the model class for table "region_tag_link".
 *
 * @property int $id
 * @property int $fond_name_id
 * @property int $tag_id
 */
class RegionTagLink extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region_tag_link';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fond_name_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fond_name_id' => 'Fond Name ID',
            'tag_id' => 'Tag ID',
        ];
    }


}
