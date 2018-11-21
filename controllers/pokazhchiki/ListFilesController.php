<?php

namespace app\controllers\pokazhchiki;

class ListFilesController extends \yii\web\Controller
{
    /**
     * @param null $folder
     * @param null $params
     * @return string
     * @throws \yii\web\HttpException
     */
    public function actionIndex($folder = null, $params = null)
    {
        //echo '$folder '.$folder;

        $basedir = getcwd();

        $this->layout = false;

        if ($folder == null){
            $dir = $basedir.'/scans/pokazhiki/Kiev/Tematychnyy_pokazhchyk_m_Kyiv_T_1';
        }
        else {
            $dir = $basedir.'/scans/'.$folder;
        }


        //echo '$dir '.$dir;

        //$files=\yii\helpers\FileHelper::findFiles($dir);
        if (!is_dir($dir)) { // item does not exist
            throw new \yii\web\HttpException(404, 'Ошибка в БД или названии папки с файлами. Передайте эту информацию для решения проблемы --> '.$folder.' '.$dir.'');
        }

        $files=scandir($dir);

        if (count($files) < 3) { // item does not exist
            throw new \yii\web\HttpException(404, 'Передайте эту ошибку администратору. В папке нет файлов '.$folder.'/'.$dir.'');
        }

        $dlina = strlen(count($files));

        $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

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
                $file = str_replace($basedir,"/web",$file);
                $webfiles[] = $actual_link.$file;
            }
        }


        //	print_r($webfiles);
        return $this->render('ajax',['filelist' => $webfiles, 'dir' => $dir]);

    }


}
