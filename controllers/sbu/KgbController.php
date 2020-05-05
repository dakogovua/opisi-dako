<?php

namespace app\controllers\sbu;
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 29.04.2020
 * Time: 12:11
 */

use yii\helpers\ArrayHelper;
use yii\web\Controller;
use Yii;

use app\models\sbu\KgbFond;

class KgbController extends Controller
{
    public function actionIndex($folder = null){
        //$files=\yii\helpers\FileHelper::findFiles('C:\OSPanel\domains\public_html\web\scans'/*, ['recursive'=>FALSE]*/);
        $dir = Yii::getAlias('@webroot/scans');
        $files = scandir($dir);
//        echo '<pre>';
//       // print_r($files);
//
//        print_r($files);



        $array = [];


        foreach ($files as $file){
        //    if ($file === '.' or $file === '..') continue;
            $arr = [];

            $dirname = $dir. '/'. $file;

            if (is_dir($dirname)){
                $data = KgbFond::find()
                    ->where(['fond_folder' => $file])
                    ->asArray()
                    ->one();

              //  print_r($data);
            }




       //     echo is_dir($dirname) ? $file.' '.$data->fond_name.' '.$data->fond_text : $file;
            $array[] = ['name' => $dirname, 'folder' => is_dir($dirname), 'file' => !is_dir($dirname), 'data' => $data];


        }


      //  ArrayHelper::multisort($array, ['folder', 'name'], [SORT_ASC, SORT_DESC]);

        return $this->render('index',[
            'array' => $array,

        ]);

    }
}