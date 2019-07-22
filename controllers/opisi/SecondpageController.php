<?php

namespace app\controllers\opisi;

use Yii;
use app\models\opisi\Secondpage;
use app\models\opisi\SecondpageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * SecondpageController implements the CRUD actions for Secondpage model.
 */
class SecondpageController extends Controller
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
								'actions' => ['index','create','update','view', 'delete'],
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
     * Lists all Secondpage models.
     * @return mixed
     */
    public function actionIndex($message = null, $sectablename = null, $fond = null)
    {

     //   echo $sectablename;


       switch ($sectablename) {
           case "null":
               $sectablename = 'secondpage';
               break;
           case "firstpage":
               $sectablename = 'secondpage';
               break;
           case "radfirstpage":
               $sectablename = 'radsecondpage';
               break;
           default:
               $sectablename = 'secondpage';
       }

       // echo $sectablename;

        $searchModel = new SecondpageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $sectablename);
		
		if (isset ($message))
			{
				$dataProvider->query->andWhere(['papka' => $message]);
			}

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'message' => $message,
            'fond' => $fond,
        ]);
    }

    /**
     * Displays a single Secondpage model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $sectablename = null)
    {

        return $this->render('view', [
            'model' => $this->findModel($id, $sectablename),
        ]);
    }

    /**
     * Creates a new Secondpage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($sectablename = null)
    {
        switch ($sectablename) {
            case "null":
                $sectablename = 'secondpage';
                break;
            case "firstpage":
                $sectablename = 'secondpage';
                break;
            case "radfirstpage":
                $sectablename = 'radsecondpage';
                break;
            default:
                $sectablename = 'secondpage';
        }
        //$model = new Secondpage();
        $model = Secondpage::useTable($sectablename);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'sectablename' => $sectablename] );
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Secondpage model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,  $sectablename = null)
    {
        if(!$sectablename){
            $sectablename = 'secondpage';
        }

        switch ($sectablename) {
            case "null":
                $sectablename = secondpage;
                break;
            case "firstpage":
                $sectablename = 'secondpage';
                break;
            case "radfirstpage":
                $sectablename = 'radsecondpage';
                break;
            case "radsecondpage":
                //$sectablename = 'radsecondpage';
                break;
            default:
                $sectablename = 'secondpage';
        }

        // echo $sectablename;

        $model = $this->findModel($id, $sectablename);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'sectablename' => $sectablename]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Secondpage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $sectablename = null)
    {
        if(!$sectablename){
            $sectablename = 'secondpage';
        }

        switch ($sectablename) {
            case "null":
                $sectablename = secondpage;
                break;
            case "firstpage":
                $sectablename = 'secondpage';
                break;
            case "radfirstpage":
                $sectablename = 'radsecondpage';
                break;
            case "radsecondpage":
                //$sectablename = 'radsecondpage';
                break;
            default:
                $sectablename = 'secondpage';
        }

        $this->findModel($id, $sectablename)->delete();

        return $this->redirect(['index', 'sectablename' => $sectablename ]);
    }

    /**
     * Finds the Secondpage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Secondpage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $sectablename)
    {

        if (Yii::$app->user->isGuest){
            throw new \yii\web\HttpException(404, 'Вы гость');
        }

        $model = Secondpage::useTable($sectablename);
        if (($model = $model -> findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
