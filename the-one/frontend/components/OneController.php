<?php
namespace frontend\components;

use common\models\Article;
use common\models\ArticleCategory;
use common\models\Banner;
use common\models\LoginForm;
use common\models\Magazine;
use common\models\search\ProfessionalGroup;
use common\models\Term;
use frontend\models\SignupForm;
use yii\db\Query;
use yii\helpers\ArrayHelper;

class OneController extends \yii\web\Controller{
    public $loginForm;
    public $signUpForm;
    public $articleGroups;
    public $params = [];
    public $banners;
    public $footerArticles;

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    /**
     * @var array An array of terms that works as links.For submenus of categories
     */
    public $linksOfSubcats = [];
    public $categories = [];
    /**
     * Rewrited init action was needed in order to
     * 1 - Create login form for every website
     * 2 - Get a common website settings from database
     * 3 - Get all professional groups from database
     */
    public function init()
    {
        parent::init();
        $this->loginForm = new LoginForm();
        $this->signUpForm = new SignupForm();
        $this->categories = ArticleCategory::find()->asArray()->all();
        //Dont worry,every of it is quite logical.Just close your eyes and imagine how u slowly
        //getting a funk about what happening

        $this->linksOfSubcats = Term::find()
            ->joinWith([
                'termGroup'=>function(Query $q){
                    $q->from('term_group tg');
                },
                'termGroup.parentTermGroup'=>function(Query $q){
                    $q->from('term_group tgp');
                }
            ])
            ->where(['=','`tg`.type','link'])
            ->all();

        $this->linksOfSubcats = ArrayHelper::map($this->linksOfSubcats,'id',function($e){
            return $e;
        },function($e){
            return $e->termGroup->parentTermGroup->slug;
        });

        $this->params['site']= \common\models\Setting::findByGroup('website');
        $this->params['professional-groups'] = ArrayHelper::index(ProfessionalGroup::find()->all(),function($e){return $e->slug;});
        $this->footerArticles = Article::find()->joinWith('category')->select(['article.slug','article.title'])->where(['=','article_category.slug','additional'])->all();
    }

    /*
     * Getting banners over here
     */
    public function beforeAction($action){

        //Если мы на роуте материалов,то баннеры не подгружаем
        if($this->route !=='article/category'){
            $this->applyBanners($this->route);
        }
        if($action->id=='error'){
            $this->layout = 'main-error';
        }
        return parent::beforeAction($action);
    }

    public function applyBanners($route){
        if(isset(Banner::$positions[$route])){
            $this->banners = ArrayHelper::map(
                Banner::find()->where(['=','route',$route])->all(),
                function($e){return $e->id;},
                function($e){return $e;},
                function($e){return $e->position;}
            );
        };
    }

}
