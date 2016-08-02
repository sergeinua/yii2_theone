<?php
namespace frontend\components;
use yii\helpers\Url;

class OneView extends \yii\web\View{
    public function getImgUrl($url,$size=false){
        if(!$size){
            return Url::to(["/img/$url"],true);
        }
        return Url::to(["/img/$size/$url"],true);
    }
}