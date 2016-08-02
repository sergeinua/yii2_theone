<?php
namespace backend\controllers;
use common\helpers\OneHelper;
use common\models\Setting;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Response;
use yii\web\UploadedFile;

class ImgController extends \yii\web\Controller{
    public function beforeAction($action){
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionUpload(){
        if(!\Yii::$app->user->isGuest){
            $img = UploadedFile::getInstanceByName('upload');
            $imgName =  $this->saveImage($img);
            if($imgName){
                return $this->imgUrlScript($imgName);
            }


        }
    }
    protected function imgUrlScript($img){
        $img = OneHelper::getImgUrl($img);
        return <<<SCRPT
        <script type="text/javascript">
            window.parent.CKEDITOR.tools.callFunction({$_GET['CKEditorFuncNum']}, "{$img}");
        </script>
SCRPT;

    }
    protected function saveImage($img){
            $path = \Yii::$app->params['imgPath'];
            $fileNameOfSaved = $img->name;
            $filePath = $path.$fileNameOfSaved;
            $img->saveAs($filePath);
            return $fileNameOfSaved;
    }
}