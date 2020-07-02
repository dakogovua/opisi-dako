<?php
/**
 * Created by PhpStorm.
 * User: ggg
 * Date: 01.11.2018
 * Time: 18:07
 */

namespace app\controllers;

use app\models\Client;
use \yii\web\Controller;

//use \DateTime;
//use DatePeriod;
//use \DateInterval;
use app\models\pay\Clients;
use app\models\SignupForm;



use Yii;

class PayController extends Controller
{
    public static function allowedDomains()
    {
        return [
            '*',                        // star allows all domains
            'https://dako.gov.ua',
//            'http://test1.example.com',
//            'http://test2.example.com',
//            'http://localhost:8080'
        ];
    }

    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => \yii\filters\Cors::className(),
                'cors'  => [
                    // restrict access to domains:
                    'Origin'                           => static::allowedDomains(),
                    'Access-Control-Allow-Origin'      => static::allowedDomains(),
                    'Access-Control-Request-Method'    => ['POST'],
                    'Access-Control-Allow-Credentials' => false,
                    'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
                ],
            ],

        ]);
    }
    public $enableCsrfValidation = false;

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

//    public $layout = false;
//    private $public_key = 'i10334901580';
//    private $private_key = '7wmI2KtkXR20MkWkYXDH2QHsHHYQSZMQ6NCIxx2Z';


    public function actionIndex(){
        //    print_r($_POST);


        $user = new Clients();
        $time = time();
        $service_order=$time."-".rand(1, 9);



        $user->date_time_prepay = $this->convertToMysql($time);
        $user->service_order = $service_order;
        $user->status = 'prepay';

        //     echo '<hr>';

        if ($user->load(Yii::$app->request->post(), '') && $user->save()) {

            $user->getErrors();

//            $liqpay = new LiqPay($this->public_key, $this->private_key);
//            $html = $liqpay->cnb_form(array(
//                'action'         => 'pay',
//                'amount'         => $user->sum,
//                //    'amount'         => $vendorsmodel->sumapi,
//                'currency'       => 'UAH',
//                'description'    => 'Оплата за послуги '.$user->order_dako,
//                'order_id'       => $user->service_order,
//                'version'        => '3',
//                'sandbox'        => '1',
//            ));


            //   echo $html; //Отправляем всё в ликпей

            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return  $service_order;

        }
        else {

            echo "CRITICAL ERROR";
            echo "<hr>";
            print_r($user->getErrors());

            throw new \yii\web\HttpException(404, 'Ошибка. Передайте эту информацию для решения проблемы');
//            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
//            return false;
        }
    }

    public function actionPaidcallback(){
        //    print_r($_POST);
        $post = $_POST;
//        $array = array(
//            'rrn' => ''
//        ,'masked_card' => '444455XXXXXX6666'
//        ,'sender_cell_phone' => ''
//        ,'response_status' => 'success'
//        ,'sender_account' => ''
//        ,'fee' => ''
//        ,'rectoken_lifetime' => ''
//        ,'reversal_amount' => 0
//        ,'settlement_amount' => 0
//        ,'actual_amount' => 22919
//        ,'order_status' => 'approved'
//        ,'response_description' => ''
//        ,'verification_status' => ''
//        ,'order_time' => '02.07.2020 19:51:20'
//        ,'actual_currency' => 'UAH'
//        ,'order_id' => 'Order_1449555_n0Ueb4cIep_1593708680'
//        ,'parent_order_id' => ''
//        ,'merchant_data' => '{"name":"1593708674-7","label":"Призначення платежу","value":"sdfsdfsdfsdf 12312313 kk@kk.cce 113 223","hidden":false}'
//        ,'tran_type' => 'purchase'
//        ,'eci' => '7'
//        ,'settlement_date' => ''
//        ,'payment_system' => 'card'
//        ,'rectoken' => ''
//        ,'approval_code' => 478450
//        ,'merchant_id' => 1449555
//        ,'settlement_currency' => ''
//        ,'payment_id' => 240892647
//        ,'product_id' => ''
//        ,'currency' => 'UAH'
//        ,'card_bin' => 444455
//        ,'response_code' => ''
//        ,'card_type' => 'VISA'
//        ,'amount' => 22300
//        ,'sender_email' => ''
//        ,'signature' => 'ac4991334e3151ab9029107a977326297d5941e9'
//        );

        //  echo "<pre>";
        //     print_r($post);
        //   echo "</pre>";

        $status = $post['order_status'];
        $merchant_data = $post['merchant_data'];

        // echo $status;
        // echo "<br>";
        // print_r(json_decode($merchant_data));
        // echo "<hr>";
        // echo json_decode($merchant_data)[0]->name;

        // $signature = $_POST["signature"];
        // $data = $_POST["data"];
        // //Anton $public_key = 'i69930799562';
        // //Anton $private_key = 'rRZfFUKEnYTzXG0pgadJRKCdiQr9OAeW0au5gtAH';
        // $sign = base64_encode(sha1($this->private_key.$data.$this->private_key, 1));

        // $data_result = base64_decode($data);

        //TEST $data_result = '{"payment_id":1263584946,"action":"pay","status":"sandbox","version":3,"type":"buy","paytype":"card","public_key":"i61109306451","acq_id":414963,"order_id":"1583961186-9","liqpay_order_id":"U7HS1QWH1583537559446563","description":"Оплата за послуги sdfsdf234","sender_phone":"380503843096","sender_first_name":"Irina","sender_last_name":"Konstantinova","sender_card_mask2":"516875*62","sender_card_bank":"pb","sender_card_type":"mc","sender_card_country":804,"ip":"212.90.172.202","amount":234234.0,"currency":"UAH","sender_commission":0.0,"receiver_commission":6441.44,"agent_commission":0.0,"amount_debit":234234.0,"amount_credit":234234.0,"commission_debit":0.0,"commission_credit":6441.44,"currency_debit":"UAH","currency_credit":"UAH","sender_bonus":0.0,"amount_bonus":0.0,"mpi_eci":"7","is_3ds":false,"language":"ru","create_date":1583537559447,"end_date":1583537559988,"transaction_id":1263584946}';
        // $date = date("Y-m-d H:i:s");

        if($status == 'approved'){
            // file_put_contents("callback.txt", $date."-".$data_result."\r\n", FILE_APPEND);

            $messageLog = [
                'status' => 'Fondy ок.',
                'post' => $post
            ];

//            echo "<hr>";
//            echo $data_result;
//            echo "<hr>";

            Yii::info($messageLog, 'payment_Fondy'); //запись в лог

        }else{
            throw new \yii\web\HttpException(404, 'Ошибка. Передайте эту информацию для решения проблемы');
        }




        // $array = json_decode($data_result, true);
        // $status = $array["status"];
        $transaction_id = $post["payment_id"];
        $order_id = json_decode($merchant_data)[0]->name;


        // echo '$order_id '.$order_id.' '. $array["order_id"];

        $clientmodel = Clients::findOne([
            'service_order' => $order_id,
        ]);

        if (!$clientmodel){
            echo "Data error";
            return false;
        }

        $clientmodel->status = $status;
        $clientmodel->transaction_id = $transaction_id;

        print_r($clientmodel);

        $clientmodel->save(false);

        print_r($clientmodel);

        $clientmodel->save(false);



        $model = new SignupForm();

        return $this->render('paid',[
            'clientmodel' => $clientmodel,
            'model' => $model
        ]);
    }



}