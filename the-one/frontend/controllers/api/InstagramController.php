<?php
namespace frontend\controllers\api;
use common\models\Setting;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Response;

class InstagramController extends \yii\web\Controller{
    protected $settings;
    public function actionPhotos(){
        $this->settings = Setting::find()->where(['=','group',Setting::$groups['instagram']])->orWhere(['=','key','soc_inst'])->all();
        $this->settings = ArrayHelper::map($this->settings,'key',function($e){
            return $e;
        });
        if(time()>$this->settings['instagram_cache_expires']->value){
            $this->updateCache();
        }
//        $this->updateCache();
        return $this->settings['instagram_cache']->value;
    }
    protected function updateCache(){
        $this->settings['instagram_cache_expires']->value = time()+(24*60*60);
        $this->settings['instagram_cache_expires']->save();
        $instagram_photos = file_get_contents($this->settings['soc_inst']->value . 'media');
        $this->settings['instagram_cache']->value =$instagram_photos;
        $this->settings['instagram_cache']->save();
    }
}