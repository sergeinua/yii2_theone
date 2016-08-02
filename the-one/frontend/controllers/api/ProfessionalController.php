<?php
namespace frontend\controllers\api;

use common\models\Comment;
use common\models\Setting;
use common\models\User;
use common\models\UserProfessionalInfo;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Response;

class ProfessionalController extends \yii\web\Controller
{
    protected $settings;

    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'verbs' => ['POST']
                    ],
                ],
            ],
        ];
    }

    public function actionAddComment()
    {
//        \Yii::$app->response->format= Response::FORMAT_JSON;
        $post = \Yii::$app->request->post();
        if(\Yii::$app->request->getCsrfTokenFromHeader()!=$post['_csrf']) {
            return new BadRequestHttpException('Invalid CSRF token');
        }
        /**
         * Добавляем комментарий
         */
        $comment = new Comment();
        $comment->setAttributes(Json::decode($post['comment']));
        $comment->user_author_id = \Yii::$app->user->id;
        $comment->save();


        /**
         * Пересчитываем рейтинг;
         */
        if($comment->parent_id===0){
            $averageRating = round((float)\Yii::$app->getDb()->createCommand("select avg(rate) from `comment` where `user_professional_id`='{$comment->user_professional_id}'")->queryScalar());
            UserProfessionalInfo::updateAll(['rate_average'=>$averageRating],['user_id'=>$comment->user_professional_id]);
        }
      $ret = Comment::find()
           ->where(['=', 'id', $comment->id])
           ->with(['userAuthor' => function ($q) {
               return $q->select(['id', 'first_name', 'last_name', 'avatar']);
           }])->asArray()->one();
        return json_encode($ret,JSON_NUMERIC_CHECK);
    }
}