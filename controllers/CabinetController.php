<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 11.03.2020
 * Time: 22:09
 */

namespace app\controllers;


use yii\web\Controller;
use app\models\SignupForm;
use Yii;

class CabinetController extends Controller
{
    public function beforeAction($action)
    {
        $this->layout = 'pay';
        return parent::beforeAction($action);
    }
    public function actionIndex(){
        echo "CABINET";
    }

    public function actionSignup()
    {


        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {

            if ($user = $model->signup()) {
                $email = \Yii::$app->mailer->compose()
                    ->setTo($user->email)
                    //->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
                    ->setFrom(['ingener@dako.gov.ua' => 'Dako.service'])
                    ->setSubject('Signup Confirmation')
                    ->setTextBody("
                                Click this link ".

                        Yii::$app->urlManager->createAbsoluteUrl(
                        //['pay/confirm','id'=>$user->id,'key'=>$user->auth_key]
                            ['cabinet/confirm', 'key'=>$user->auth_key]))
                    ->send();
                if($email){
                    Yii::$app->getSession()->setFlash('success','Перевірте свій е-мейл. Check Your email!');
                }
                else{
                    Yii::$app->getSession()->setFlash('warning','Помилка! Failed, contact Admin!');
                }
             //   $this->getView()->registerJsFile('https://code.jquery.com/jquery-3.4.1.min.js');
                return $this->render('regok', [
                    'model' => $model

                ]);
            }



        }

        return $this->render('regok', [
            'model' => $model,
        ]);
    }

    public function actionConfirm($key)
    {
        //    print_r($_GET);
        //    die;

        $user = Client::find()->where([
            //    'id'=>$id,
            'auth_key'=>$key,
            'status'=>0,
        ])->one();


        if(!empty($user)){
            $user->status=10;
            $user->save();
            Yii::$app->getSession()->setFlash('success','Success!');
        }
        else{
            Yii::$app->getSession()->setFlash('warning','Failed!');
        }
        return $this->render('regok',[]);

        // return $this->goHome();
    }

}