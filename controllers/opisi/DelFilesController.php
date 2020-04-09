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

    public static function pathDel($pathcall){
        $webroot = Yii::getAlias('@webroot');
        $pathdel = $webroot.'/scans/'.$pathcall;
        self::rrmdir($pathdel);
    }


    private static function rrmdir($dir) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    if (is_dir($dir. DIRECTORY_SEPARATOR .$object) && !is_link($dir."/".$object))
                        self::rrmdir($dir. DIRECTORY_SEPARATOR .$object);
                    else
                        unlink($dir. DIRECTORY_SEPARATOR .$object);
                }
            }
            rmdir($dir);
        }
    }


}