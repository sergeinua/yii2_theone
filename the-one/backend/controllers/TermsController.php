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
class TermsController extends BackendController
{
    public function behaviors()
    {
        return [

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

    public function actionGetTermGroups($parentId){
        $termGroups = TermGroup::find()->where(['=','parent_id',$parentId])->all();
        $terms = Term::find()->joinWith('termGroup')->where(['=','term_group.parent_id',$parentId])->all();
        Yii::$app->response->format = Response::FORMAT_JSON;
        return [
            'termGroups'=>$termGroups,
            'terms'=>$terms
        ];
    }

    public function actionAddTermGroup(){
        $post = Yii::$app->request->post();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->getCsrfTokenFromHeader()!=$post['_csrf']){
            return new BadRequestHttpException('Invalid CSRF token');
        }else{
            //return $post;
            $post['term_group'] = Json::decode($post['term_group']);
            $term = new TermGroup();
            $term->setAttributes($post['term_group']);
            if($term->validate()&&$term->save()){
                return $term;
            }else{
                Yii::$app->response->statusCode =400 ;
                return $term->getErrors();
            }
        }
    }
    public function actionDeleteTermGroup(){
        $post = Yii::$app->request->post();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->getCsrfTokenFromHeader()!=$post['_csrf']){
            return new BadRequestHttpException('Invalid CSRF token');
        }else{
            //return $post;
            $post['termGroup'] = Json::decode($post['termGroup']);
            Term::deleteAll(['term_group_id'=>$post['termGroup']['id']]);
            TermGroup::deleteAll(['=','id',$post['termGroup']['id']]);
            return true;
        }
    }
    public function actionAddTerm(){
        $post = Yii::$app->request->post();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->getCsrfTokenFromHeader()!=$post['_csrf']){
            return new BadRequestHttpException('Invalid CSRF token');
        }else{
            $post['term'] = Json::decode($post['term']);
            $term = new Term();
            $term->setAttributes($post['term']);
            if($term->validate()&&$term->save()){
                return $term;
            }else{
                Yii::$app->response->statusCode =400 ;
                return $term->getErrors();
            }
        }
    }

    public function actionDeleteTerm(){
        $post = Yii::$app->request->post();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->getCsrfTokenFromHeader()!=$post['_csrf']){
            return new BadRequestHttpException('Invalid CSRF token');
        }else{
            //return $post;
            $post['term'] = Json::decode($post['term']);
            Term::deleteAll(['=','id',$post['term']['id']]);
            return true;
        }
    }
    public function actionSaveChanged(){
        $post = Yii::$app->request->post();
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(Yii::$app->request->getCsrfTokenFromHeader()!=$post['_csrf']){
            return new BadRequestHttpException('Invalid CSRF token');
        }else{
            $state = $post['state'];
            $unsavedTerms = [];
            $state['unsaved'] = false;

            foreach ($state['terms'] as  &$term ) {
                if(array_key_exists('unsaved',$term)&&$term['unsaved']) {
                    $_term = Term::findOne(['=','id',$term['id']]);
                    /**
                    * @var $_term Term
                    */
                    $_term->setAttributes($term);
                    if($_term->validate()){
                        $_term->save();
                        unset($term['unsaved']);
                        if(array_key_exists('errors',$term))
                            unset($term['errors']);

                    }else{
                        $term['errors']=$_term->getErrors();
                        $unsavedTerms[] =  $term['term_group_id'];
                        $state['unsaved'] = true;

                    }
                }
            }
            foreach($state['termGroups'] as &$termGroup){
                if(array_key_exists('unsaved',$termGroup)&&$termGroup['unsaved']) {
                   $_termGroup = TermGroup::findOne(['=', 'id', $termGroup['id']]);

                    /**
                    * @var $_termGroup TermGroup
                     */
                    $_termGroup->setAttributes($termGroup);
                    if ($_termGroup->validate()) {
                        $_termGroup->save();
                        unset($termGroup['unsaved']);
                        if (array_key_exists('errors', $termGroup))
                            unset($termGroup['errors']);
                    } else {
                        $termGroup['errors'] = $_termGroup->getErrors();
                        $state['unsaved'] = true;
                    }
                    if (in_array($termGroup['id'], $unsavedTerms)) {
                        $termGroup['unsaved'] = true;
                    }
                }
            }

            if(!empty($unsavedTerms)){
                $state['unsaved']=true;
            }

            return $state;
        }
    }



}
