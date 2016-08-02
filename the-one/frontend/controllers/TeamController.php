<?php

namespace frontend\controllers;

use common\models\Team;
use yii\web\NotFoundHttpException;

class TeamController extends \frontend\components\OneController
{
    public $layout = "new/main";

    public function actionIndex()
    {
        $team = Team::find()->all();
        return $this->render('index',[
            'team'=>$team
        ]);
    }

    public function actionMember($slug){
        if($teamMember = Team::find()->where(['=','slug',$slug])->one()){
            $prev = Team::find()->select('slug')->where(['<','id',$teamMember->id])->orderBy('id DESC')->limit(1)->one();
            $next = Team::find()->select('slug')->where(['>','id',$teamMember->id])->orderBy('id ASC')->limit(1)->one();
            return $this->render('member',[
                'teamMember'=>$teamMember,
                'prev'=>$prev,
                'next'=>$next
            ]);
        };
        throw new NotFoundHttpException();

    }
}
