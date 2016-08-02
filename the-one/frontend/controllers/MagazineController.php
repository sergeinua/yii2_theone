<?php

namespace frontend\controllers;

use common\models\Magazine;
use yii\data\Pagination;

class MagazineController extends \frontend\components\OneController
{
    public $layout = "new/main";

    public $magazine;
    public function actionIndex()
    {
        $query = Magazine::find();
        $countQuery = clone $query;
        $pages = new Pagination(['totalCount'=>$countQuery->count()]);
        $pages->pageSize = 10;
        $models= $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        return $this->render('index',[
            'models'=>$models,
            'pages'=>$pages
        ]);
    }

    public function actionSingle($id)
    {
        $this->magazine = Magazine::find()->where(['=','id',$id])->one();
        $threeRandom = $this->getThreeRandomMagazines();
        return $this->render('single',[
            'threeRandom'=>$threeRandom,
            'magazine'=>Magazine::find()->where(['=','id',$id])->one()
        ]);
    }

    protected function getThreeRandomMagazines(){
        return Magazine::find()->where(['!=','id',$this->magazine->id])->orderBy('rand()')->limit(3)->all();
    }
}
