<?php

namespace app\models\pay;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property string $email
 * @property string $service_order
 * @property string $order_dako
 * @property string $sum
 * @property string $status
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'email', 'service_order', 'order_dako', 'sum', 'status'], 'required'],
            [['name', 'phone', 'email', 'service_order', 'order_dako', 'sum', 'status'], 'string', 'max' => 200],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'email' => 'Email',
            'service_order' => 'Service Order',
            'order_dako' => 'Order Dako',
            'sum' => 'Sum',
            'status' => 'Status',
        ];
    }
}
