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
        $this->layout = 'pay';

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


            echo $html; //Отправляем всё в ликпей
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
        $data_result = '{"payment_id":1263584946,"action":"pay","status":"sandbox","version":3,"type":"buy","paytype":"card","public_key":"i61109306451","acq_id":414963,"order_id":"1583537545-5","liqpay_order_id":"U7HS1QWH1583537559446563","description":"Оплата за послуги sdfsdf234","sender_phone":"380503843096","sender_first_name":"Irina","sender_last_name":"Konstantinova","sender_card_mask2":"516875*62","sender_card_bank":"pb","sender_card_type":"mc","sender_card_country":804,"ip":"212.90.172.202","amount":234234.0,"currency":"UAH","sender_commission":0.0,"receiver_commission":6441.44,"agent_commission":0.0,"amount_debit":234234.0,"amount_credit":234234.0,"commission_debit":0.0,"commission_credit":6441.44,"currency_debit":"UAH","currency_credit":"UAH","sender_bonus":0.0,"amount_bonus":0.0,"mpi_eci":"7","is_3ds":false,"language":"ru","create_date":1583537559447,"end_date":1583537559988,"transaction_id":1263584946}';
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
      //       throw new \yii\web\HttpException(404, 'Ошибка. Передайте эту информацию для решения проблемы');
        }




        $array = json_decode($data_result, true);
        $status = $array["status"];
        $transaction_id = $array["transaction_id"];
        $order_id = $array["order_id"];


       // echo '$order_id '.$order_id.' '. $array["order_id"];

        $clientmodel = Clients::findOne([
            'service_order' => $order_id,
        ]);



        $clientmodel->status = $status;
        $clientmodel->transaction_id = $transaction_id;

        $clientmodel->save(false);

       // print_r($clientmodel);

        return $this->render('paid',['clientmodel' => $clientmodel]);
    }

}