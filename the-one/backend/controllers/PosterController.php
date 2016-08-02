<?php

namespace backend\controllers;

use backend\components\BackendController;
use common\models\Article;
use Yii;
use common\models\Poster;
use common\models\PosterSearch;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\PosterForm;
use backend\models\PosterArticle;
use DateTime;
use yii\filters\AccessControl;

/**
 * PosterController implements the CRUD actions for Poster model.
 */
class PosterController extends BackendController
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
                        'allow' => true,
                        'roles' => ['admin','author'],
                    ],
                ],
            ],
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
        $dataProvider->sort = ['defaultOrder' => ['created' => 'DESC']];

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $model = new PosterForm();
        $model->poster = new Poster();

        if ($model->load(Yii::$app->request->post())) {
            $post = Yii::$app->request->post();
            $model = $post['Poster'];
            $related = $post['PosterForm']['relatedArticles'];
            $date_start = strtotime($model['date_start']);
            $date_end = strtotime($model['date_end']);

            if($_FILES['Poster']['name']['thumbnail'] != '') :
                $file = $_FILES['Poster'];
                $path = \Yii::$app->params['imgPath'];
                $upl_file = md5($file['name']['thumbnail'] . '.' . $file['type']['thumbnail']);
                if(!move_uploaded_file($file['tmp_name']['thumbnail'], $path . $upl_file))
                    die('Error uploading file');
                $file_path = $upl_file;
            else :
                $file_path = null;
            endif;

            $poster = new Poster([
                'title' => $model['title'],
                'slug' => $model['slug'],
                'thumbnail' => $file_path,
                'content' => $model['content'],
                'created' => date('U'),
                'meta_title' => $model['meta_title'],
                'meta_description' => $model['meta_description'],
                'meta_keyword' => $model['meta_keyword'],
                'shortdesc' => $model['shortdesc'],
                'status' => '10',
//                'video_frame' => $model['video_frame'],
                'date_start' => $date_start,
                'date_end' => $date_end,
                'location' => $model['location'],
                'price' => $model['price'],
            ]);
            $poster->save(false);
            foreach($related as $item) :
                if($item != 'Выберите') :
                    (new PosterArticle([
                        'poster_id' => $poster->id,
                        'article_id' => $item,
                    ]))->save();
                endif;
            endforeach;
            return $this->redirect(Url::toRoute(['poster/index']));
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
        $model->poster = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()))
        {
            //if there's a new file
            if($_FILES['Poster']['name']['thumbnail'] !== '') :
                $file = $_FILES['Poster'];
                $path = \Yii::$app->params['imgPath'];
                $upl_file = md5($file['name']['thumbnail'] . '.' . $file['type']['thumbnail']);
                if(!move_uploaded_file($file['tmp_name']['thumbnail'], $path . $upl_file))
                    die('Error uploading file');
                $file_path = $upl_file;
            else : //not updating existing file
                $file_path = Poster::find()->where(['id' => $id])->one()->thumbnail;
            endif;
            $model->thumbnail = $file_path;
            $model->date_start = strtotime($model->date_start);
            $model->date_end = strtotime($model->date_end);
            $model->save(false);

            return $this->redirect(Url::toRoute(['poster/index']));
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
}
