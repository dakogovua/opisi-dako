<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 19.10.2019
 * Time: 19:14
 */

namespace app\controllers\opisi;


use yii\web\Controller;
use Yii;

class DelFilesController extends Controller
{
    public function actionIndex (){

        $this->layout = false;

       // print_r($_GET);

        if (!Yii::$app->user->isGuest) {
            $delfile = Yii::$app->request->get('delfile');

            unlink($delfile);


            $ii = Yii::$app->request->get('ii');
            return $ii;
        }
        else {
            return $this->goHome();
        }
    }
}