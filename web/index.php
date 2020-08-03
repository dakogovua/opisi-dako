<?php


// comment out the following two lines when deployed to production
 defined('YII_DEBUG') or define('YII_DEBUG', true);
 defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/yiisoft/yii2/Yii.php';


$config = require __DIR__ . '/../config/web.php';


$hostname = $_SERVER['SERVER_NAME'];
switch (strtolower($hostname))
{
    case 'my.dako.gov.ua';
    case 'www.my.dako.gov.ua';
//    echo '<pre>';
//        print_r($config);
//    echo '</pre>';
    $config['defaultRoute'] = 'cabinet';

        // database 1
        break;
//    case 'example2.com';
//    case 'www.example2.com';
//        $config=dirname(__FILE__).'/protected/config/main2.php';
//        // database 2
//        break;
    default:
       // $config = require __DIR__ . '/../config/web.php';
}


(new yii\web\Application($config))->run();
