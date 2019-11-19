<?php

namespace app\controllers\opisi;

use Yii;

use app\models\opisi\Dela;
use app\models\opisi\DelaSearch;

use yii\filters\VerbFilter;

use app\models\opisi\UploadForm;
use app\models\opisi\ListFiles;

use yii\web\UploadedFile;

use yii\helpers\FileHelper;

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

    public function actionIndex($folder,$subfolder = null,$delofolder = null, $fond = null, $opis = null)
    {
		
		
        if(!$delofolder){
            $searchModel = new DelaSearch();

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


            $dataProvider->query->andWhere([
                'papka_fond' => $folder,
                'papka_opis' => $subfolder
            ]);


        }

        $wwebfiles = new ListFiles();
		
        $webfiles = $wwebfiles ->getFiles($folder,$subfolder,$delofolder, $fond, $opis);



            $model = new UploadForm();

            if (Yii::$app->request->isPost) {

                //print_r(Yii::$app->request->post());
                //$get = Yii::$app->request->get();
                $uploadFolder=Yii::$app->request->get('folder').'/'.Yii::$app->request->get('subfolder').'/'.Yii::$app->request->get(delofolder);

                if(Yii::$app->request->get(delofolder)){
                    $uploadFolder.= '/';
                }

                //print_r($uploadFolder);
                //exit;

                $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
                if ($model->upload($uploadFolder)) {
                // file is uploaded successfully
                $this->refresh();
                    // return;
                }
            }

			
			return $this->render('index',[
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
			    'filelist' => $webfiles,

                'fond' => $fond,
                'opis' => $opis,
                'model' => $model
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
