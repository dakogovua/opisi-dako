<?php

namespace app\models\opisi;

use Yii;

/**
 * This is the model class for table "firstpage".
 *
 * @property int $id
 * @property string $papka
 * @property string $nomer_fonda
 * @property string $name_fond
 * @property int $count_items
 * @property int $count_opisi
 * @property string $dates
 */
class Firstpage extends \yii\db\ActiveRecord
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
 //   public static function tableName()
 //   {
 //       return 'firstpage';
 //   }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['papka', 'nomer_fonda', 'name_fond', 'count_items', 'count_opisi', 'dates'], 'required'],
            [['name_fond', 'dates'], 'string'],
            [['count_items', 'count_opisi'], 'integer'],
            [['papka'], 'string', 'max' => 20],
            [['nomer_fonda'], 'string', 'max' => 10],

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
            'nomer_fonda' => '№ Фонду',
            'name_fond' => 'Назва Фонду',
            'count_items' => 'Кількість од.зб.',
            'count_opisi' => 'Кількість описів',
            'dates' => 'Крайні дати',
        ];
    }
    public static function opisi($tblname) {
        return $tblname;

    }

    public function getDela(){
        return $this->hasMany(Dela::className(), [
            'papka_fond' => 'papka'
        ]);
           // ->count();
    }

    public function getDelacount(){
        return $this->hasMany(Dela::className(), [
            'papka_fond' => 'papka'
        ])->count();
    }

}
