<?php

namespace backend\controllers;

use backend\components\BackendController;
use backend\models\ArticleForm;
use common\helpers\OneHelper;
use common\models\ArticleCategory;
use common\models\Poster;
use common\models\Term;
use common\models\TermGroup;
use common\models\TermToArticle;
use Yii;
use common\models\Article;
use common\models\search\ArticleSearch;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\web\UploadedFile;
use yii\web\User;
use common\models\Tag;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends BackendController
{

    public function behaviors(){
        return parent::behaviors();
    }
    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex($slug=null)
    {
        $queryParams = Yii::$app->request->getQueryParams();

        if(!isset($queryParams['ArticleSearch'])){
            $queryParams['ArticleSearch'] = [];
            $queryParams['ArticleSearch']['category_slug']=$slug;
        }

        $termGroups = $this->getCategoryTermGroups($slug);
        $searchModel = new ArticleSearch();

        $dataProvider = $searchModel->search($queryParams);
        $dataProvider->sort = ['defaultOrder' => ['created' => 'DESC']];

        return $this->render('index', [
            'searchModel'  => $searchModel,
            'dataProvider' => $dataProvider,
            'categorySlug' => $slug,
            'termGroups'   => $termGroups
        ]);
    }


    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate($slug)
    {

        $model = new ArticleForm();
        $model->article = new Article();
        $model->tag = new Tag();

        $model->termGroups =$this->getCategoryTermGroups($slug);
        $model->terms = [];

        $category = ArticleCategory::find()
            ->where(['=','slug',$slug])->one();

        /**
         * Put colors in js to handle it with React
         */
        $view = Yii::$app->getView();
        $view->registerJs('var colors = '.Json::encode($this->getColors($model->article)),$view::POS_BEGIN);

        if ($post = Yii::$app->request->post()) {
            $model->category = $category;
            $model->article ->setAttributes($post['Article'],true);
            if(isset($post['ArticleForm'])){
                $model->setAttributes($post['ArticleForm'],true);
            }
            $model->article->status = $post['Article']['status'];
            $model->save();
//            dump($model->article->toArray());die;

            Tag::deleteAll(['article_id' => $model->article->id]);
            (new Tag([
                'article_id' => $model->article->id,
                'text' => $post["Tag"]['text'],
            ]))->save();

            return $this->redirect(['article/index/'.$model->category->slug]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'category'=>$category
            ]);
        }
    }
    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($slug,$id)
    {
        $model = new ArticleForm();
        $model->article = Article::findOne($id);
        $model->termGroups = $this->getCategoryTermGroups($slug);
        $model->terms = [];
        $model->relatedArticles = [];
        $model->tag = (Tag::findOne(['article_id' => $id])) ? Tag::findOne(['article_id' => $id]) : new Tag();
        $category = ArticleCategory::find()
            ->where(['=','slug',$slug])->one();

        foreach($model->article->terms as $key=>$value){
            $model->terms[$value->termGroup->id] = $value->id;
        }
        foreach($model->article->relatedArticles as $key=>$value){
            $model->relatedArticles[] = $value->id;
        }
        /**
         * Put colors in js to handle it with React
         */
        $view = Yii::$app->getView();
        $view->registerJs('var colors = '.Json::encode($this->getColors($model->article)),$view::POS_BEGIN);

        if ($post = Yii::$app->request->post()) {
//            dump($model);
//            dump($post);die;
            $tag_model = (Tag::findOne(['article_id' => $id])) ? Tag::findOne(['article_id' => $id]) : new Tag();
            $tag_model->text = $post['Tag']['text'];
            $tag_model->article_id = $id;
            $tag_model->save();
            $model->category = $category;
            $model->article->status = $post['Article']['status'];
            $model->article->category_id = $post['Article']['category'];
            $model->article ->setAttributes($post['Article'],true);
            if(isset($post['ArticleForm'])){
                $model->setAttributes($post['ArticleForm'],true);
            }
            $model->article->category_id = $post['Article']['category'];

            if($model->save()){
                return $this->redirect(['article/index/'.$slug, 'id' => $model->article->id]);
            }
        }
        return $this->render('update', [
            'model' => $model,
            'category'=>$category

        ]);

    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->dropTerms();
        $model->dropThumbnail();
        $model->delete();
        return $this->redirect(['article/index/'.$model->category->slug]);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $i
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Getting term groups according to category slug.It should be a root term group
     * which has the same slug as category.
     * @param $slug
     * @return array|\yii\db\ActiveRecord[]
     */
    protected function getCategoryTermGroups($slug){
       return TermGroup::find()
            ->joinWith(['children'=>function(Query $q){
                $q->from('term_group tgc');
            },'terms'])
            ->where(['=','tgc.slug',$slug])
            ->all();
    }

    /**
     *
     * @param $article
     * @return array
     */
    protected function getColors($article){
        $colors = \common\models\Color::find()->all();
        $applied = $article->colors;
        if(!empty($applied)){
            $colors = array_diff_ukey($colors,$applied,function($key1,$key2) use ($colors,$applied){
                if(array_key_exists($key1,$colors)
                    &&array_key_exists($key2,$applied)
                    &&$colors[$key1]->id!=$applied[$key2]->id){
                    return 1;
                }
            });
        }
        return [
            'colors'=>array_values($colors),
            'applied'=>array_values($applied)
        ];
    }

    /**
     * @param $title
     * @return mixed
     */
    public function actionGetSlug($title){
        return OneHelper::getSlug($title);
    }

}

