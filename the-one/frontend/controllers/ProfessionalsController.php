<?php

namespace frontend\controllers;

use common\models\City;
use common\models\Comment;
use common\models\Country;
use common\models\ProfessionalGroup;
use common\models\ProfessionalViewCount;
use common\models\search\UserSearch;
use yii\base\View;
use yii\data\Pagination;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\User;

class ProfessionalsController extends \frontend\components\OneController
{
    public $layout = "new/main";


    /**
     * Getting a list of professionals.If `$groupSlug` is set, it will return a professional related to the group
     * Also it loads a lot of data,groups,group slugs etc..
     * @param bool|false $groupSlug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionIndex($groupSlug = false)
    {
        /**
         * TODO:Сортировка по городам и заполнение городов.
         */
        $searchModel = new UserSearch(['userBased'=>true]);
        $searchModel->status = 15;
        $searchModel->role = 'professional';

        $title = "Профессионалы";
        $description = "Профессионалы";

        if ($groupSlug) {
            $searchModel->group = $groupSlug;
            /**
             * @var $group = \common\models\ProfessionalGroup
             */
            if (isset($this->params['professional-groups'][$groupSlug])) {
                $group = $this->params['professional-groups'][$groupSlug];
                $title = $group->name;
                $description = $group->description;
            } else {
                throw new NotFoundHttpException();
            }
        }
        $params = \Yii::$app->request->queryParams;
        $dataProvider = $searchModel->search($params);
        $pages = $dataProvider->getPagination();
        $pages->route = $groupSlug ? '/professionals/' . $groupSlug : '/professionals/';
        \Yii::$app->view->title = $title;
        \Yii::$app->view->registerMetaTag(
            [
                'name' => 'description',
                'content' => $description
            ]);
        $countryList = Country::find()->all();
        $cityList = City::find()->all();
            return $this->render('index', [
                'searchModel' => $searchModel,
                'pages' => $pages,
                'models' => array_chunk($dataProvider->getModels(), 6),
                'route' => $pages->route,
                'countryList'=>$countryList,
                'cityList'=>$cityList
            ]);

    }

    /**
     * An action for getting single professional by slug
     * @param bool|false $slug a main search param for searching of users,
     * @return string Html
     */
    public function actionSingle($slug = false)
    {

        $model = $this->findProfessional($slug);
        $commentsJSON = $this->getCommentsJSON($model->id);
        if (!\Yii::$app->user->isGuest) {
            $loggedUser = $this->getLoggedUserJSON();
            \Yii::$app->view->registerJs("var user = {$loggedUser};", \yii\web\View::POS_HEAD);
        }

        \Yii::$app->view->registerJs("var professionalId = {$model->id}", \yii\web\View::POS_HEAD);
        \Yii::$app->view->registerJs("var professionalComments = {$commentsJSON}", \yii\web\View::POS_HEAD);
        $populars = \common\models\User::find()->where(['>=','status',\common\models\User::STATUS_AVAILABLE])->joinWith('userProfessionalInfo')->orderBy('user_professional_info.views')->limit(5)->all();
        $this->storeUserView($model);
        return $this->render('single', [
            'model' => $model,
            'populars'=>$populars
        ]);
    }

    /**
     * Finds a single professional by slug
     * @param $slug
     * @return array|null|\yii\db\ActiveRecord
     */
    protected function findProfessional($slug)
    {
        return \common\models\User::find()
            ->joinWith(['userProfessionalInfo'])
            ->andWhere(['=', 'slug', $slug])
            ->one();
    }

    /**
     * Returns a JSON comments. It should exist for client-side component which written on ReactJS
     * @param $id
     * @return string
     */
    protected function getCommentsJSON($id)
    {
        return Json::encode(Comment::find()
            ->where(['=', 'user_professional_id', $id])
            ->with(['userAuthor' => function ($q) {
                return $q->select(['id', 'first_name', 'last_name', 'avatar']);
            }])->asArray()->all());
    }

    protected function getLoggedUserJSON()
    {
        $userArray = ArrayHelper::toArray(\Yii::$app->user->identity);
        $userArray = array_intersect_key($userArray, array_flip(['id', 'first_name', 'last_name', 'avatar']));
        return Json::encode($userArray);
    }

    /**
     * A function that checks if professional was watched during a php session.
     * If so,then it creates a record into database with a time,sessionId and professional_id that have been watched
     * by user.
     * @param $model
     */
    protected function storeUserView($model)
    {
        if (empty($professionalWatches = \Yii::$app->session->get('professionalWatches'))) {
            $professionalWatches = [];
        }

        if (!in_array($model->id, $professionalWatches)
            && empty(ProfessionalViewCount::findOne(['professional_id' => $model->id, 'session_id' => \Yii::$app->session->id]))
        ) {

            $view = new ProfessionalViewCount();
            $view->professional_id = $model->id;
            $view->session_id = \Yii::$app->session->id;
            $view->time = time();
            $view->save();

            $model->userProfessionalInfo->views++;
            $model->userProfessionalInfo->save();
            array_push($professionalWatches, $model->id);
            \Yii::$app->session->set('professionalWatches', $professionalWatches);
            }
        }
    }
