<?php

namespace app\controllers\opisi;

use Yii;

use app\models\opisi\Dela;
use app\models\opisi\DelaSearch;

use yii\filters\VerbFilter;

class ListFilesController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex($folder,$subfolder,$delofolder = null, $fond = null, $opis = null)
    {

        if(!$delofolder){
            $searchModel = new DelaSearch();

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


            $dataProvider->query->andWhere([
                'papka_fond' => $folder,
                'papka_opis' => $subfolder
            ]);


        }


		// $dir = '/home/soft/public_html/web/scans/'.$folder.'/'.$subfolder;
		//uncomment!!
        //$dir = \Yii::$app->basePath.'/web/scans/'.$folder.'/'.$subfolder.'/'.$delofolder;
		$dir = 'C:\OSPanel\domains\localhost\web\scans\Fond_F-280\opys_2';
		//echo $dir;
		//$files=\yii\helpers\FileHelper::findFiles($dir);
		if (!is_dir($dir)) { // item does not exist
			throw new \yii\web\HttpException(404, 'Ошибка в БД или названии папки с файлами. Передайте эту информацию для решения проблемы --> '.$folder.'/'.$subfolder.'');
		}
		
			$files=scandir($dir);

			if (count($files) < 3) { // item does not exist
			throw new \yii\web\HttpException(404, 'Передайте эту ошибку администратору. В папке нет файлов '.$folder.'/'.$subfolder.'/'.$delofolder.'');
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
                        if (!is_dir($file)){
					        $webfiles[] = $file;
                        }
					}
			}

			
			return $this->render('index',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
			    'filelist' => $webfiles,

                'fond' => $fond,
                'opis' => $opis,
            ]);

    }

    public function actionCreate($folder, $subfolder, $nomer_fonda = null, $opisi_num = null)
    {
        $model = new Dela();


        $model->papka_fond = $folder;
        $model->papka_opis = $subfolder;

        $model->nomer_fonda = $nomer_fonda;
        $model->opisi_num = $opisi_num;


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionUpdate($id)
    {


        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {


        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (Yii::$app->user->isGuest){
            throw new \yii\web\HttpException(404, 'Вы гость');
        }

        if (($model = Dela::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
}
