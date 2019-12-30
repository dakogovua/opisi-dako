<?php

namespace app\models\opisi;

use Yii;

/**
 * This is the model class for table "secondpage".
 *
 * @property int $id
 * @property string $papka
 * @property string $podpapka
 * @property string $nomer_opisi
 * @property string $name_opisi
 * @property string $copy_opisi
 * @property string $count_opisis
 * @property string $years
 */
class Secondpage extends \yii\db\ActiveRecord
{
    protected static $table;
    public static function useTable($table) {
        static::$table = $table;

        return new static();
    }

    public static function tableName() {
        return static::$table;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['papka', 'podpapka', 'name_opisi', 'years'], 'string'],
            [[ 'nomer_opisi', 'name_opisi', 'count_opisis'], 'required'],
            [['podpapka'], 'string', 'max' => 15],
            [['nomer_opisi'], 'string', 'max' => 11],
            [['copy_opisi'], 'string', 'max' => 10],
            [['count_opisis'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'papka' => 'Папка',
            'podpapka' => 'Подпапка',
            'nomer_opisi' => '№ опису',
            'name_opisi' => 'Анотація складу документів опису справ',
            'copy_opisi' => 'Оцифровані копії опису',
            'count_opisis' => 'Кількість од.зб.',
            'years' => 'Крайні дати',
        ];
    }
    //выводит дело
    public function getDelocount(){
        return $this->hasMany(Dela::className(), [
            'papka_fond' => 'papka'
        ])
            ->andWhere([
                'and',
                ['papka_opis' => $this->podpapka],
            ])
            ->count();
    }
////////
    public function getDela(){
        return $this->hasOne(Dela::className(), [
            'papka_fond' => 'papka',
            'papka_opis' => 'podpapka'
        ]);
           // ->groupBy('papka_opis');
    }


    /*function Search($value, $array)
    {
        return(array_search($value, $array));
    }*/




}
