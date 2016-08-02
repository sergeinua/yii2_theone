<?php
namespace backend\controllers;

use backend\components\BackendController;
use common\models\Article;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;
use yii\web\View;

/**
 * Site controller
 */
class SiteController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ]
            /*,
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],*/
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $users = User::find()->asArray()->all();
        $usersByGroups = ArrayHelper::map($users,'id',function($e){return $e;},'role');

        $articles = Article::find()->joinWith(['category'])->asArray()->all();
        $articlesByCategories = ArrayHelper::map($articles,'id',function($e){return $e;},function($e){
            return $e['category']['name'];
        });

        Yii::$app->view->registerJs("var articles = ".Json::encode($articlesByCategories),View::POS_HEAD);
        $statistics = [
            'userSummary'=>sizeof($users),
            'professional'=>isset($usersByGroups['professional'])?sizeof($usersByGroups['professional']):0,
            'user'=>isset($usersByGroups['user'])?sizeof($usersByGroups['user']):0,
            'admin'=>isset($usersByGroups['admin'])?sizeof($usersByGroups['admin']):0,
//            'author'=>isset($usersByGroups['author'])?sizeof($usersByGroups['author']):0,
        ];

        $statistics['articlesSummary'] = Article::find()->count();

        return $this->render('index',
            [
                'statistics'=>$statistics
            ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            dump(Yii::$app->session);
//            dump(Yii::$app->user->identity);
//            return $this->redirect(['index']);
//            return $this->goHome();
            return $this->redirect(['site/index']);
        } else {
//            dump(Yii::$app->session);
//            dump(Yii::$app->user->identity);
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }
}
