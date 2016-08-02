<?php

namespace frontend\controllers;

use common\models\search\ProfessionalGroup;
use frontend\components\OneAccess;
use frontend\components\OneNotify;
use frontend\models\ProfileEditForm;
use frontend\models\UserForm;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\User;

class ProfileController extends \frontend\components\OneController
{
    public $layout = "new/main";
    public function behaviors(){
        return [
            'access' => [
                'class' => OneAccess::className(),
                'rules' => [
                    [
                        'allow'=>true,
                        'roles'=>['@'],
                    ]

                ],
            ]
        ];
    }

    public function actionEditInfo()
    {
        $model = new UserForm(['scenario'=>'from_frontend']);
        $model->user = \Yii::$app->user->identity;
        $model->userProfessionalInfo = $model->user->userProfessionalInfo;
        $model->professionalGroupsIDs =  ArrayHelper::getColumn($model->user->professionalGroups,'id');

        $professionalGroups = ProfessionalGroup::find()->all();


        if ($post=\Yii::$app->request->post()) {
            $model->professionalGroupsIDs = $post['UserForm']['professionalGroupsIDs'];
            $model->placeId = $post['UserForm']['placeId'];
            //$model->professionalGroupsIDs = $post['UserForm']['professionalGroupsIDs'];
            $model->userProfessionalInfo->setAttributes($post['UserProfessionalInfo']);
            $model->user->setAttributes($post['User']);
            if($model->save()){
                OneNotify::prepareNotify('information','Изменения успешно сохранены');
            }else{
                OneNotify::prepareNotify('error','Что-то пошло не так');

            }
        }
        return $this->render('edit-info',[
            'model'=>$model,
            'professionalGroups'=>$professionalGroups
        ]);
    }

    public function actionIndex()
    {
        //TODO:BETA
       $user = \Yii::$app->user->identity;
        $professionalsFeed = $user->getLiked(5)->all();
        $articlesFeed = $user->getFavoriteArticles(5)->all();
        return $this->render('index',[
            'user'=>$user,
            'professionalsFeed'=>$professionalsFeed,
            'articlesFeed'=>$articlesFeed
        ]);
    }

    public function actionFavoriteArticles()
    {
        $favoriteArticles = \Yii::$app->user->identity->getFavoriteArticles()->all();
        return $this->render('favorite-articles',
            [
                'favoriteArticles'=>$favoriteArticles
            ]);
    }

    public function actionFavoriteSpecialists()
    {
        $favoriteSpecialists =\Yii::$app->user->identity->liked;
        return $this->render('favorite-specialists',[
            'favoriteSpecialists'=>$favoriteSpecialists
        ]);
    }

    public function actionMyGallery()
    {
        return $this->render('my-gallery');
    }
}
