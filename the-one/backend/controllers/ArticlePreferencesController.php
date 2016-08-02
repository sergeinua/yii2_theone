<?php

namespace backend\controllers;

use backend\models\ArticlePreferencesForm;
use common\models\ArticleCategory;
use common\models\Setting;
use Yii;
use common\models\Color;
use common\models\ColorSearch;
use yii\base\Model;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ArticlePreferencesController extends Controller
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

        $categories = ArticleCategory::find()->all();
        $settings = Setting::find(['group'=>Setting::$groups['article']])->all();
        return $this->render('index', [
            'categories' =>$categories
        ]);
    }

    public function actionUpdate(){
        $post = Yii::$app->request->post();
        Setting::deleteAll(['key'=>'category_colors']);
        if(array_key_exists('category_colors',$post)){
            foreach ($post['category_colors'] as $v){
                $setting = new Setting();
                $setting->group = Setting::$groups['article'];
                $setting->key = 'category_colors';
                $setting->value = $v;
                $setting->save();
            }
        }

        //Hotfix
        Setting::deleteAll(['key'=>'category_filter']);
        if(array_key_exists('category_filter',$post)){
            foreach ($post['category_filter'] as $v){
                $setting = new Setting();
                $setting->group = Setting::$groups['article'];
                $setting->key = 'category_filter';
                $setting->value = $v;
                $setting->save();
            }
        }
//        return $this->redirect('/article-preferences/index');
        return $this->redirect(['article-preferences/index']);

    }

}
