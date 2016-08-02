<?php

namespace backend\controllers;

use backend\components\BackendController;
use backend\models\ArticleForm;
use common\helpers\OneHelper;
use common\models\ArticleCategory;
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

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class AttributesController extends BackendController
{
    public function beforeAction($action)
    {
        return parent::beforeAction($action);

    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $category_term_group = TermGroup::find()->where(['=','parent_id',0])->all();
        return $this->render('index',[
            'category_term_group'=>$category_term_group
        ]);
    }

    public function actionGetAttributes($parentId){
        $termGroups = TermGroup::find()->where(['=','parent_id',$parentId])->all();
        $terms = Term::find()->joinWith('termGroup')->where(['=','term_group.parent_id',$parentId])->all();
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'termGroups'=>$termGroups,
            'terms'=>$terms
        ];
    }

    public function actionAddAttribute(){
        $post = Yii::$app->request->post();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->getCsrfTokenFromHeader()!=$post['_csrf']){
            return new BadRequestHttpException('Invalid CSRF token');
        }else{
            //return $post;
            $post['attribute'] = Json::decode($post['attribute']);
            $term = new TermGroup();
            $term->setAttributes($post['attribute']);
            if($term->validate()&&$term->save()){
                return $term;
            }else{
                Yii::$app->response->statusCode =400 ;
                return $term->getErrors();
            }

        }
    }





}
