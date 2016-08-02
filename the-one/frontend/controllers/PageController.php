<?php
namespace frontend\controllers;

class PageController extends \yii\web\Controller{

    public function actionView($slug){
        return $slug;
    }

}