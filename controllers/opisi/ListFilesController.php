<?php

namespace app\controllers\opisi;

class ListFilesController extends \yii\web\Controller
{
    public function actionIndex($folder,$subfolder,$params = null)
    {
		// $dir = '/home/soft/public_html/web/scans/'.$folder.'/'.$subfolder;
		$dir = \Yii::$app->basePath.'/web/scans/'.$folder.'/'.$subfolder;
		//$dir = 'C:\OSPanel\domains\localhost\web\scans\Fond_F-1\opys_1';
		echo $dir;
		//$files=\yii\helpers\FileHelper::findFiles($dir);
		if (!is_dir($dir)) { // item does not exist
			throw new \yii\web\HttpException(404, 'Ошибка в БД или названии папки с файлами. Передайте эту информацию для решения проблемы --> '.$folder.'/'.$subfolder.'');
		}
		
			$files=scandir($dir);

			if (count($files) < 3) { // item does not exist
			throw new \yii\web\HttpException(404, 'Передайте эту ошибку администратору. В папке нет файлов '.$folder.'/'.$subfolder.'');
		}
			
			$dlina = strlen(count($files));
			
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
					$webfiles[] = $file;
					}
			}
			
			
			
			return $this->render('index',['filelist' => $webfiles]);

    }
	
	
}
