<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 12.11.2019
 * Time: 18:54
 */

namespace app\models\opisi;

use Yii;
use yii\helpers\FileHelper;


class ListFiles
{
    public function getFiles($folder,$subfolder,$delofolder = null, $fond = null, $opis = null){



        // $dir = '/home/soft/public_html/web/scans/'.$folder.'/'.$subfolder;
        //uncomment!!
        // $uploadDir = Yii::getAlias('@webroot/scans/');
        $dir = Yii::getAlias('@webroot/scans/').$folder.'/'.$subfolder.'/'.$delofolder;
        // $dir = 'C:\OSPanel\domains\localhost\web\scans\Fond_F-280\opys_2';
        //echo $dir;
        //$files=\yii\helpers\FileHelper::findFiles($dir);
        if (!is_dir($dir) && Yii::$app->user->isGuest ) { // item does not exist
            throw new \yii\web\HttpException(404, 'Ошибка в БД или названии папки с файлами. Передайте эту информацию для решения проблемы --> '.$folder.'/'.$subfolder.'/'.$delofolder.'');
        }

        else if (!is_dir($dir) && !Yii::$app->user->isGuest ){
            FileHelper::createDirectory($dir);

        }


        $files=scandir($dir);

        if (count($files) < 3 && Yii::$app->user->isGuest ) { // item does not exist
            throw new \yii\web\HttpException(404, 'Передайте эту ошибку администратору. В папке нет файлов '.$folder.'/'.$subfolder.'/'.$delofolder.'');
        }


        $dlina = strlen(count($files));
        // echo count($files);
        if (count($files) > 2){
            foreach ($files as $file){


                if ($file == '.' || $file == '..')
                    continue;
                else {

                    $path_parts = pathinfo($file);
                    $filename = $path_parts['filename'];


                    if (strlen($filename) < $dlina || $filename == 'titul' ||$filename == 'titul1' || $filename == 'titul2'){
                        if ($filename == 'titul' ||$filename == 'titul1' || $filename == 'titul2'){
                            $diff = $dlina;
                            //	echo '$diff == '.$diff."<br>";
                        }
                        else {
                            $diff = $dlina - strlen($filename);
                        }
                        $newfilename = '0'.$filename;

                        while ($diff >0){
                            $diff--;
                            $newfilename = '0'.$newfilename;
                            //	echo '$newfilename '.$newfilename;

                            //	echo '$diff while '.$diff."<br>";
                        }

                        $new_name = $newfilename.'.'.$path_parts['extension'];


                        if(!file_exists($new_name)){

                            if(rename( $dir.'/'.$file, $dir.'/'.$new_name))
                            {
                                $file = $dir.'/'.$new_name;
                            }
                            else
                            {
                                echo "A File With The Same Name Already Exists" ;
                            }
                        }
                    }

                    else {
                        $file = $dir.'/'.$file;
                    }
                    $file = str_replace("/home/soft/public_html/web/","",$file);
                    if (!is_dir($file)){
                        $webfiles[] = $file;
                    }
                }
            }
        }
        else {
            $webfiles=[] ;
        }
        return $webfiles;
    }

    public function getFond()
    {
        return $this->hasMany(Dela::className(), [
            'papka_fond' => 'papka'
        ]);
    }
}