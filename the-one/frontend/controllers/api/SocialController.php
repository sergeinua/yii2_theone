<?php
/**
 * Created by PhpStorm.
 * User: jerichozis
 * Date: 19.01.16
 * Time: 9:53
 */

namespace frontend\controllers\api;


use yii\base\Controller;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;

class SocialController extends \yii\web\Controller
{
    public function actionLike(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $post=\Yii::$app->request->post();
        if(
            $post&&
            \Yii::$app->request->validateCsrfToken($post['_csrf'])&&
            !\Yii::$app->user->isGuest
        ) {
            return ['liked' => \Yii::$app->user->identity->toggleLikeForUserWithId($post['professionalId'])];
        }
        throw new BadRequestHttpException();
    }
}