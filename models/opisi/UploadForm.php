<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 21.10.2019
 * Time: 20:01
 */

namespace app\models\opisi;



use yii\base\Model;
use yii\web\UploadedFile;
use Yii;

class UploadForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg', 'maxFiles' => 100],
        ];
    }

    public function upload($folder)
    {
        if ($this->validate()) {
            $uploadDir = Yii::getAlias('@webroot/scans/');
            $uploadDir .= $folder;
            //echo $uploadDir;
            //exit;
            foreach ($this->imageFiles as $file) {
                $file->saveAs($uploadDir . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}