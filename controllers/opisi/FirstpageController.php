<?php

namespace app\controllers\opisi;

use Yii;
use app\models\opisi\Firstpage;
use app\models\opisi\FirstpageSearch;

use app\models\opisi\ListFiles;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use yii\helpers\Json;

/**
 * FirstpageController implements the CRUD actions for Firstpage model.
 */
class FirstpageController extends Controller
{
    /**
     * @inheritdoc
     */



    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
			'access' => [
                        'class' => AccessControl::className(),
                        'only' => ['index','create','update','view','delete'],
                        'rules' => [
                            // allow authenticated users
							[
                                'allow' => true,
								'actions' => ['index','create','update','view','delete'],
                                'roles' => ['@'],
                            ],
							[
                                'allow' => true,
								'actions' => ['index', 'view'],
                                'roles' => ['?'],
                            ],
                            [
                                'allow' => false,
								'actions' => ['create','update','delete'],
                                'roles' => ['?'],
                            ],
                            // everything else is denied
							
                        ],
                    ],  
        ];
    }

    /**
     * Lists all Firstpage models.
     * @return mixed
     */


    public function actionIndex($nametable = null,$fondtext = null, $cfk = null)
    {



        if(!$nametable){
            $nametable = 'firstpage';
        }


        $searchModel = new FirstpageSearch();
       // $searchModel->nametable = $nametable;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $nametable, $cfk);

        //exit;

		////////////////
	/*	$name_fonds = Firstpage::find()
            ->select(['name_fond'])->distinct()
            ->asArray()
            ->all();
		//print_r($dates);
		
		foreach ($name_fonds as $key => $name_fond){
			$name_fondz[] = $name_fond[name_fond];
		}
	*/
		/////////////


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'fondtext'  => $fondtext,
        ]);
    }

    /**
     * Displays a single Firstpage model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $nametable = null)
    {

        if(!$nametable){
            $nametable = 'firstpage';
        }

        return $this->render('view', [
            'model' => $this->findModel($id, $nametable),
        ]);
    }

    /**
     * Creates a new Firstpage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($nametable = null)
    {
        //MyTableModel::useTable('tableName2');
        $model = Firstpage::useTable($nametable);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'nametable' => $nametable]);
        }

        return $this->render('create', [
            'model' => $model,

        ]);
    }

    /**
     * Updates an existing Firstpage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $nametable = null)
    {
      //  print_r($_GET);

        if(!$nametable){
            $nametable = 'firstpage';
        }

        $model = $this->findModel($id, $nametable);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'nametable' => $nametable  ]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Firstpage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $nametable = null)
    {
        if(!$nametable){
            $nametable = 'firstpage';
        }

        $model = $this->findModel($id, $nametable);
   //     $papka_delo = $model->papka_delo;

        $papka_fond = $model->papka;
    //    $papka_opis = $model->papka_opis;
        $path = $papka_fond;

        DelFilesController::pathDel($path);

    //   $this->findModel($id, $nametable)->delete();
        $model->delete();


        return $this->redirect(['index', 'nametable' => $nametable]);
    }

    /**
     * Finds the Firstpage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Firstpage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $nametable)
    {
        if (Yii::$app->user->isGuest){
            throw new \yii\web\HttpException(404, 'Вы гость');
        }

        $model = Firstpage::useTable($nametable);
        if (($model = $model -> findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	

		

	
}
