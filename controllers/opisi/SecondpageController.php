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
    public function actionIndex($message = null)
    {
        $searchModel = new SecondpageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		
		if (isset ($message))
			{
				$dataProvider->query->andWhere(['secondpage.papka' => $message]);
			}

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
			'message' => $message
        ]);
    }

    /**
     * Displays a single Secondpage model.
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
     * Creates a new Secondpage model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Secondpage();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
     * Deletes an existing Secondpage model.
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
     * Finds the Secondpage model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Secondpage the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Secondpage::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
