<?php

namespace frontend\controllers;

use Yii;
use common\models\Poster;
use common\models\PosterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use common\models\Banner;
use common\helpers\OneHelper;

/**
 * PosterController implements the CRUD actions for Poster model.
 */
class PosterController extends \frontend\components\OneController
{
    public $layout = "new/main";

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Poster models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PosterSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->pagination->pageSize = 6;
        $dataProvider->query->where(['>=', 'date_end', mktime(0, 0, 0, date('n'), date('j'))]);
        $dataProvider->setSort(['defaultOrder' => ['date_start'=>SORT_ASC]]);
        $pages = $dataProvider->getPagination();
        $banners = Banner::find()->where(['=','route','poster/poster'])->all();
        return $this->render('index', [
            'models' => array_chunk($dataProvider->getModels(), 6),
            'pages' => $pages,
            'searchModel' => $searchModel,
            'banners' => $banners,
        ]);
    }

    /**
     * Displays a single Poster model.
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
     * Creates a new Poster model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Poster();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Poster model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Poster model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Poster model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Poster the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Poster::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPoster($slug)
    {
        $this->layout = "new/main";
        $model = Poster::find()->where(['slug' => $slug])->one();


        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => $model->title,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => OneHelper::getImgUrl($model->thumbnail, 'articleThumb'),
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:description',
            'content' => strip_tags(mb_substr($model->content, 0, 500, 'UTF-8')),
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'fb:app_id',
            'content' => '1083258958415470',
        ]);

        return $this->render('single', [
            'model' => $model,
        ]);
    }
}
