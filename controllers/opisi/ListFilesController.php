<?php

namespace app\controllers\opisi;

use app\models\opisi\Firstpage;
use app\models\opisi\Secondpage;
use Yii;

use app\models\opisi\Dela;
use app\models\opisi\DelaSearch;

use yii\filters\VerbFilter;

use app\models\opisi\UploadForm;
use app\models\opisi\ListFiles;

use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

// use yii\helpers\FileHelper;

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

    public function actionIndex($folder, $subfolder = null,$delofolder = null, $fond = null, $opis = null, $nametable, $sectablename, $cfk = null)
    {


        if(!$delofolder){
            $searchModel = new DelaSearch();

            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


            $dataProvider->query->andWhere([
                'papka_fond' => $folder,
                'papka_opis' => $subfolder
            ]);

            $arrayTitle = Dela::find()
                ->select('title')
                ->where(
                    [
                        'papka_fond' => $folder,
                        'papka_opis' => $subfolder
                    ]
                )
                ->asArray()->all();

            $titles = ArrayHelper::getColumn($arrayTitle, 'title');
            //print_r($titles);
        }



        $wwebfiles = new ListFiles();

        $fondname = Firstpage::useTable($nametable);
        $fondname = $fondname->findOne([
            'papka' => $folder,
            'nomer_fonda' => $fond
        ]);
        $namefond = $fondname -> name_fond;


        $opisname = Secondpage::useTable($sectablename);
        $opisname = $opisname->findOne([
            'papka' => $folder,
            'podpapka' => $subfolder
        ]);
        $opisname = $opisname -> name_opisi;


        if($delofolder){
            $delaname = Dela::findOne([
                'papka_fond' => $folder,
                'papka_opis' => $subfolder
            ]);
            $delaname = $delaname -> title;

        }





        //Arrays of files
        if (!$cfk)
        {
            $webfiles = $wwebfiles ->getFiles($folder,$subfolder,$delofolder, $fond, $opis);
        }
        else{
            $webfiles = [];
        }




        $model = new UploadForm();

        if (Yii::$app->request->isPost) {

            //print_r(Yii::$app->request->post());
            //$get = Yii::$app->request->get();
            $uploadFolder=Yii::$app->request->get('folder').'/'.Yii::$app->request->get('subfolder').'/'.Yii::$app->request->get('delofolder');

            if(Yii::$app->request->get('delofolder')){
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
            'model' => $model,
            'namefond' => $namefond,
            'opisname' => $opisname,
            'delaname' => $delaname,

            'titles' => $titles,
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


        // $this->redirect(array('opisi/del-files', 'param1'=>'value1', 'param2'=>'value2'));


        $model = $this->findModel($id);
        $papka_delo = $model->papka_delo;

        $papka_fond = $model->papka_fond;
        $papka_opis = $model->papka_opis;
        $path = $papka_fond.'/'.$papka_opis.'/'.$papka_delo;

        DelFilesController::pathDel($path);
        //$this->findModel($id)->delete();

        $model->delete();

     //   return $this->redirect(['index']);
        return $this->goBack();
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
