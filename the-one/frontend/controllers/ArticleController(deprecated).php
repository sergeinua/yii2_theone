<?php

namespace frontend\controllers;
use common\models\search\ArticleSearch;
use common\models\Term;
use common\models\TermGroup;
use Faker\Provider\vi_VN\Color;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\View;

/**
 * Class ArticleController
 * TODO:Выгружать все статьи категории если при парсинге не обнаружены термы
 * TODO:   Дескрипшен грузить только в том случае,если передан только 1 аттрибут или цвет.Для остальных использовать каноникал
 * @package frontend\controllers
 */
class ArticleController extends \frontend\components\OneController
{
    public function actionAdvicesAndIdeas($param=false)
    {
            $data =  $this->findArticles($param,'advices-and-ideas');
            $data['canonicalUrl']  = Url::to('advices-and-ideas');
            $data['param'] = $param?$param:'t';
            \Yii::$app->view->registerJs('var paramUrl = "'.$data['param'].'"',View::POS_BEGIN);
            \Yii::$app->view->registerJs('var canonicalUrl = "'.$data['canonicalUrl'].'"',View::POS_BEGIN);
            return $this->render('index', $data);
    }
    /**
     *
     * @param $param
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function findArticles($param,$slug){
        $searchParams['ArticleSearch'] =[];
        $searchParams['ArticleSearch']['category_slug']=$slug;
        //Ищем терм группы
        $termGroups = $this->getTermGroups($slug);
        if($param){
            $paramArr = explode('.',$param);
            $terms = false;
            //Ищем термы согласно параметру в урле
            $terms = $this->getTerms($param);
            //А тут мы просто получаем массив из слагов цветов.
            //В отличии от термов,нам этого достаточно
            $colors = $this->getColors($param);
            if(empty($terms)&&empty($colors)){
                return $this->redirect(Url::to('/'.$slug));
            }
            //Если в параметре урла указаны какие-то аттрибуты - засунуть их во временный массив,чтобы отправить в сёрч модель
            if($terms){
                $termGroupsArr = ArrayHelper::map($termGroups,'id','slug');
                $searchTerms = ArrayHelper::map($terms,
                    function($e) use ($termGroupsArr){
                        return $termGroupsArr[$e['term_group_id']];
                    },'id');
            }
            if($colors){
                $searchParams['ArticleSearch']['colors'] = $colors;
            }
            if(isset($searchTerms)){
                $searchParams['ArticleSearch']['terms'] = $searchTerms;
            }
        }
        $searchModel = new ArticleSearch();
        $provider = $searchModel->search($searchParams);
        return [
            'searchModel'=>$searchModel,
            'models' => $provider->getModels(),
            'termGroups'=>$termGroups
        ];
    }

    public function getTermGroups($slug){
       return  TermGroup::find()
            ->joinWith(['parent'=>function($q){
                $q->from('term_group tgp');
            }])
            ->where(['=','tgp.slug',$slug])
            ->all();
    }

    public function getTerms($urlParam){
        $array_of_terms = [];
        preg_match_all('/(^|\:)t_([A-Z-a-z_]*)(:|$)/mU',$urlParam,$matches);
        foreach($matches[2] as $match){
            $array_of_terms = array_merge_recursive($array_of_terms,explode('_',$match));
        }
        return Term::find()->where(['slug'=>$array_of_terms])->asArray()->all();
    }
    public function getColors($urlParam){
        $array_of_colors = [];
        preg_match_all('/(^|\:)c_([A-Z-a-z].*)(:|$)/mU',$urlParam,$matches);
        foreach($matches[2] as $match){
            $array_of_colors = array_merge_recursive($array_of_colors,explode('_',$match));
        }
        return $array_of_colors;
    }
}
