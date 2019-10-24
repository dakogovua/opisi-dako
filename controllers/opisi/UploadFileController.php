<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21.10.2019
 * Time: 20:04
 */

namespace app\controllers\opisi;


use Yii;
use yii\web\Controller;
use app\models\opisi\UploadForm;
use yii\web\UploadedFile;

class UploadFileController extends Controller
{
    public function actionIndex()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

}