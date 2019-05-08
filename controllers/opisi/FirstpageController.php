<?php

namespace app\controllers\opisi;

use Yii;
use app\models\opisi\Firstpage;
use app\models\opisi\FirstpageSearch;
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
								'actions' => ['index','create','update','view'],
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
    public function actionIndex($nametable = null)
    {
        if(!$nametable){
            $nametable = 'firstpage';
        }
        $searchModel = new FirstpageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $nametable);

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
         //   'secnametable' => $secnametable,
		//	'name_fondz' => $name_fondz,
		
        ]);
    }

    /**
     * Displays a single Firstpage model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Firstpage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Firstpage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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

    /**
     * Deletes an existing Firstpage model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Firstpage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Firstpage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Firstpage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	

		

	
}
