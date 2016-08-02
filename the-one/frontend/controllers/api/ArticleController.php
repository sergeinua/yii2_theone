<?php
/**
 * Created by PhpStorm.
 * User: jerichozis
 * Date: 19.01.16
 * Time: 9:53
 */

namespace frontend\controllers\api;


use common\models\Article;
use frontend\components\OneAccess;
use yii\base\Controller;
use yii\helpers\ArrayHelper;
use yii\web\BadRequestHttpException;

class ArticleController extends \yii\web\Controller
{
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

    public function actionLike(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $post=\Yii::$app->request->post();
        if(
            $post&&
            \Yii::$app->request->validateCsrfToken($post['_csrf'])&&
            !\Yii::$app->user->isGuest
        ) {
                return ['liked' => Article::toggleLike($post['articleId'])];
        }
        throw new BadRequestHttpException();
    }
}