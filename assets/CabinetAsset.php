<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 16.03.2020
 * Time: 22:43
 */

namespace app\assets;


class CabinetAsset extends PayAsset
{
    public $depends = [
             'yii\bootstrap\BootstrapPluginAsset',
//       'yii\web\YiiAsset',
//        'yii\web\JqueryAsset'
    ];

}