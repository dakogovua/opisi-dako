<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 07.03.2020
 * Time: 20:10
 */

namespace app\assets;
use yii\web\AssetBundle;


class PayAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'pay/css/default.css',
        'pay/css/layout.css',
        'pay/css/media-queries.css',
    ];

    public $js = [



        //'pay/js/modernizr.js',
        //'js/bootstrap.min.js',
"http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js",
//"pay/js/jquery-migrate-1.2.1.min.js",
        "pay/js/init.js",
  //      "pay/js/gmaps.js",
        "pay/js/waypoints.js",
        "pay/js/jquery.countdown.js",
        "pay/js/jquery.placeholder.js",
        "pay/js/backstretch.js",


    ];

    public $depends = [
      //  'yii\web\YiiAsset',
      //  'yii\web\JqueryAsset'
    ];
}

