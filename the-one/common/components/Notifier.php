<?php
namespace common\components;

use yii\helpers\Json;
use yii\web\View;

class Notifier{

    public static function notify($params){
        \Yii::$app->view->registerJs('notify('.Json::encode($params).')',View::POS_READY);
    }
}