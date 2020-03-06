<?php
/**
 * Created by PhpStorm.
 * User: ggg
 * Date: 01.11.2018
 * Time: 18:07
 */

namespace app\controllers;

use \yii\web\Controller;

//use \DateTime;
//use DatePeriod;
//use \DateInterval;
use app\models\pay\Clients;


use Yii;

class PayController extends Controller
{
    public function beforeAction($action)
    {
        if ($action->id == 'paidcallback' || $action->id == 'index') {
            $this->enableCsrfValidation = false;
        }

        return parent::beforeAction($action);
    }

    function convertToMysql($time){
        return date('Y-m-d H:i:s',$time);
    }

    public $layout = false;
    public $public_key = 'i61109306451';
    public $private_key = 'fXeKlQQQeYgH3ZR5s7CEez8XW2UnMkPHE4Y7XNqV';


    public function actionIndex(){
    //    print_r($_POST);

        $user = new Clients();
        $time = time();
        $service_order=$time."-".rand(1, 9);

        $user->date_time_prepay = $this->convertToMysql($time);
        $user->service_order = $service_order;
        $user->status = 'prepay';

        echo '<hr>';

        if ($user->load(Yii::$app->request->post(), '') && $user->save()) {

           $user->getErrors();

            $liqpay = new LiqPay($this->public_key, $this->private_key);
            $html = $liqpay->cnb_form(array(
                'action'         => 'pay',
                'amount'         => $user->sum,
                //    'amount'         => $vendorsmodel->sumapi,
                'currency'       => 'UAH',
                'description'    => 'Оплата за послуги '.$user->order_dako,
                'order_id'       => $user->service_order,
                'version'        => '3',
                'sandbox'        => '1',
            ));


        //    echo $html; //Отправляем всё в ликпей
        }
        else {

            echo "CRITICAL ERROR";
            echo "<hr>";
            print_r($user->getErrors());
            die;
        }
    }


    public function actionInsert(){

        $vendorsmodel = new ClientDatamodel();
        $othervendorsmodel = new OtherVendordatamodel();


        echo "<pre>";
        print_r(Yii::$app->request -> post());

        echo "</pre>";


        if ( !$vendorsmodel -> load( Yii::$app -> request -> post(), ''))
        {
            echo "CRITICAL ERROR";
            die;
        }

        if(isset($_POST['vendors'])) {
            foreach ($_POST['vendors'] as $key =>$vendors){
                foreach ($vendors as $vendor => $val){
                    $temp = 'vendor'.$key.$vendor;
                    echo $temp.' '.$val."<br>";
                    $vendorsmodel->$temp = $val;
                }
            }
        }

        echo "<hr>";

        if (isset ($_POST['tables'])){
            foreach ($_POST['tables'] as $key =>$tables){
                foreach ($tables as $table => $val){
                    //    echo 'table '.$key.$table.' '.$val."<br>";
                    foreach ($val as $v => $k){
                        $temp2 = $v.$table;
                        echo $temp2.' '.$k. "<br>";
                        // echo $temp2."<br>";
                        $othervendorsmodel->$temp2 = $k;
                    }
                }
            }
            $othervendorsmodel->doc_number_id =$_POST['doc_number'];
            $othervendorsmodel -> save();
        }

        if ($vendorsmodel -> save() ){
            echo "koss ".$this->private_key.' '.$this->public_key;

            $liqpay = new LiqPay($this->public_key, $this->private_key);


            $html = $liqpay->cnb_form(array(
                'action'         => 'pay',
                'amount'         => 125,
                //    'amount'         => $vendorsmodel->sumapi,
                'currency'       => 'UAH',
                'description'    => 'Оплата за поліс '.$vendorsmodel->doc_number,
                'order_id'       => $vendorsmodel->doc_number,
                'version'        => '3',
                'sandbox'        => '1',
            ));

            echo $html;  //выводим форму ликпея
            //        return $this->render('liqpay',['html'=>$html]);


        }

    }

    public function actionPaidcallback(){


        $signature = $_POST["signature"];
        $data = $_POST["data"];
        //Anton $public_key = 'i69930799562';
        //Anton $private_key = 'rRZfFUKEnYTzXG0pgadJRKCdiQr9OAeW0au5gtAH';
        $sign = base64_encode(sha1($this->private_key.$data.$this->private_key, 1));

        $data_result = base64_decode($data);
        $date = date("Y-m-d H:i:s");

        if(strcasecmp($sign, $signature) == 0){
            // file_put_contents("callback.txt", $date."-".$data_result."\r\n", FILE_APPEND);

            $messageLog = [
                'status' => 'Ликпей ок.',
                'post' => $data_result
            ];

//            echo "<hr>";
//            echo $data_result;
//            echo "<hr>";

            Yii::info($messageLog, 'payment_liqpay'); //запись в лог

        }else{
             throw new \yii\web\HttpException(404, 'Ошибка. Передайте эту информацию для решения проблемы');
        }




        $array = json_decode($data_result, true);
        $status = $array["status"];
        $transaction_id = $array["transaction_id"];
        $order_id = $array["order_id"];


        echo '$order_id '.$order_id.' '. $array["order_id"];

        $clientmodel = ClientDatamodel::findOne([
            'doc_number' => $order_id,
        ]);



        $clientmodel->status = $status;
        $clientmodel->transaction_id = $transaction_id;

        $clientnodel->save(false);

        echo "<hr><pre>";
        print_r($polismodel);
        echo "</pre><hr>";

        return $this->render('paid',compact('polismodel'));
    }

}