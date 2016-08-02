<?php

namespace backend\controllers;

use backend\models\UserForm;
use common\models\Comment;
use common\models\ProfessionalGroup;
use common\models\UserProfessionalInfo;
use Yii;
use common\models\User;
use common\models\search\UserSearch;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\View;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ]
        ];
    }


    public function actionIndex()
    {

        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserForm();
        $model->user = new User();
        if (Yii::$app->request->post()) {
            $model->setAttributes(Yii::$app->request->post());
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);

    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        //TODO:Категорически необходим рефакторинг
        //Юзер форма
        $model = new UserForm();
        //Находим пользователя
        $model->user = User::find()->with(['comments'])->where(['=', 'id', $id])->one();
        //Массива с айдишниками юзер групп
        $model->professionalGroupsIDs = ArrayHelper::getColumn($model->user->professionalGroups, 'id');
        //Инфо профессионала
        $model->userProfessionalInfo = $model->user->userProfessionalInfo;
        if (!$model->userProfessionalInfo) {
            $model->userProfessionalInfo = new UserProfessionalInfo();
            $model->userProfessionalInfo->user_id = $model->user->id;
        }
        //Комментарии для отображения
        $commentsJSON = $this->getCommentsJson($id);
        Yii::$app->view->registerJs("var comments = " . $commentsJSON, View::POS_BEGIN);

        //Загрузим информацию о профессионале
        if ($model->user->place) {
            $view = Yii::$app->getView();
            $view->registerJs('var defCoordinates = ' . Json::encode([
                    'lat' => $model->user->place->lat,
                    'lng' => $model->user->place->lng]), View::POS_BEGIN);
        }
        //Загрузим все группы профессионалов.
        $professionalGroups = ProfessionalGroup::find()->all();

        if ($post = Yii::$app->request->post()) {
            $model->professionalGroupsIDs = $post['UserForm']['professionalGroupsIDs'];
            $model->userProfessionalInfo->setAttributes($post['UserProfessionalInfo']);
            $model->user->setAttributes($post['User']);
            $model->placeId = $post['UserForm']['placeId'];
            $model->setAttributes(Yii::$app->request->post());
            if ($model->save()) {
                return $this->redirect(['index']);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'professionalGroups' => $professionalGroups,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id = null)
    {
        $id = Yii::$app->request->post('id');
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function getCommentsJson($id)
    {
        return Json::encode(Comment::find()
            ->where(['=', 'user_professional_id', $id])
            ->with(['userAuthor' => function ($q) {
                return $q->select(['id', 'first_name', 'last_name', 'avatar']);
            }])->asArray()->all());
    }
}
