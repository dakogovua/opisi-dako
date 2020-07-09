<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 08.07.2020
 * Time: 20:56
 */

namespace app\assets;


use yii\web\AssetBundle;

class TabsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/tabs-css/demo.css',
        'css/tabs-css/tabs.css',
        'css/tabs-css/tabstyles.css',

    ];
    public $js = [
//        'js/tabs-js/modernizr.custom.js',
        'js/tabs-js/cbpFWTabs.js',

    ];


    public $jsOptions = array(
        'position' => \yii\web\View::POS_END
    );

    public $cssOptions = [

    ];
}