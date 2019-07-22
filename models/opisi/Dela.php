<?php

namespace app\models\opisi;

use Yii;

/**
 * This is the model class for table "dela".
 *
 * @property int $id
 * @property string $nomer_fonda
 * @property string $opisi_num
 * @property string $delo_num
 * @property string $papka_fond
 * @property string $papka_opis
 * @property string $papka_delo
 * @property string $title
 */
class Dela extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dela';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['opisi_num', 'papka_fond', 'papka_opis', 'papka_delo'], 'required'],
            [['title'], 'string'],
            [['nomer_fonda'], 'string', 'max' => 100],
            [['opisi_num', 'delo_num'], 'string', 'max' => 11],
            [['papka_fond', 'papka_opis', 'papka_delo'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nomer_fonda' => '№ фонду',
            'opisi_num' => '№ опису ',
            'delo_num' => '№ справи',
            'papka_fond' => 'Papka Fond',
            'papka_opis' => 'Papka Opis',
            'papka_delo' => 'Papka Delo',
            'title' => 'Заголовок справи (подано мовою оригіналу)',
        ];
    }



}
