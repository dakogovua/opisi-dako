<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 10.03.2020
 * Time: 21:50
 */

namespace app\models;


use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $email;


    public function rules() {
        return [
            [['username', 'password'], 'required', 'message' => 'Заполните поле'],
            ['username', 'unique', 'targetClass' => Client::className(),  'message' => 'Этот логин уже занят'],
            ['username', 'email',  'message' => 'Is it email address?'],
            ['email', 'email',  'message' => 'Is it email address?'],
        ];
    }

    public function attributeLabels() {
        return [
            'username' => 'E-mail',
            'password' => 'Пароль',
        ];
    }

    public function signup()
    {
        if ($this->validate()) {
            $user = new Client();
            $user->username = $this->username;
            $user->email = $this->username;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->status = 0;

            if ($user->save(false)) {

                return $user;
            }
        }

        return null;
    }

}