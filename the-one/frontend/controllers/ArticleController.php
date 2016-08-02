<?php

namespace frontend\controllers;

use common\helpers\OneHelper;
use common\models\Article;
use common\models\ArticleCategory;
use common\models\ArticleViewCount;
use common\models\search\ArticleSearch;
use common\models\Setting;
use common\models\Tag;
use common\models\Term;
use common\models\Color;
use common\models\TermGroup;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\View;
use common\models\Banner;

//example
/**
 * Class ArticleController
 * @package frontend\controllers
 */
class ArticleController extends \frontend\components\OneController
{
    public $slug;
    public $title;
    public $description;
    public $layout = "new/main";
    /**
     * @param bool|false $param load articles from "Advices And Ideas" category
     */

//    public function actionAdvicesAndIdeas($param=false)
//    {
//        $this->slug = 'advices-and-ideas';
//        $this->title = 'Советы и идеи';
//        $this->description = 'фвфыв';
//        echo  $this->findArticles($param);
//    }
//    /**
//     * @param bool|false $param load articles from "Thematical Weddings" category
//     */
//    public function actionCreativeWeddings($param=false)
//    {
//        $this->slug = 'creative-weddings';
//        $this->title = 'Свадьбы';
//        $this->description = 'Свадьбы';
//        echo  $this->findArticles($param);
//    }
//
//    /**
//     * @param bool|false $param load articles from "Honeymoon" category
//     */
//    public function actionHoneymoon($param=false)
//    {
//        $this->slug = 'honeymoon';
//        $this->title = 'Lifestyle';
//        $this->description = 'Lifestyle';
//        echo  $this->findArticles($param);
//    }
//
//
//    /**
//     * @param bool|false $param load articles from "Honeymoon" category
//     */
//    public function actionTheOneNews($param=false)
//    {
//        $this->slug = 'the-one-news';
//        $this->title = 'The-One News';
//        $this->description = 'Последние новости';
//        echo  $this->findArticles($param);
//    }
//
//    /**
//     * @param bool|false $param load articles from "Workshop" category
//     */
//    public function actionWorkshops($param=false)
//    {
//        $this->slug = 'workshops';
//        $this->title = 'Мастер-классы';
//        $this->description = 'Мастер-классы';
//        echo  $this->findArticles($param);
//    }

    /**
     * @param bool|false $param load articles from "Workshop" category
     */
//    public function actionArticles($param=false)
//    {
//        $this->slug = 'articles';
//        $this->title = 'Репортажи';
//        $this->description = 'Репортажи';
//        echo  $this->findArticles($param);
//    }

    public function actionCategory($categorySlug, $param = false)
    {
        if ($categorySlug === 'additional') {
            throw new NotFoundHttpException;
        }
        $category = ArticleCategory::findOne(['slug' => $categorySlug]);
        if(!$category)
            throw new NotFoundHttpException();
        $this->slug = $category->slug;
        $this->title = $category->name;
        $this->description = $category->description;
        $this->applyBanners('article/' . $this->slug);
        echo $this->findArticles($param);
    }

    public function findArticles($param = false)
    {
        //По параметру определяем терм который является подкатегорией.
        //Он задаёт сео параметры.
        //Это может быть что угодно,что будет выведено как "ссылка" в админке
        //Желательно использовать только одну ссылку.
        $searchParams['ArticleSearch'] = [];
        $searchParams['ArticleSearch']['category_slug'] = $this->slug;
        $searchParams['ArticleSearch']['terms'] = [];
        /*
         * Проверяем,используется ли фильтр по цветам в данной категории.TODO:Чёта с этим придумать.
         */
        $withColorSetting = Setting::find()->where(['and', ['=', 'key', 'category_colors'], ['=', 'value', $this->slug]])->one();
        if ($param) {
            $term = Term::find()->where(['=', 'slug', $param])->one();
            $this->title = $term->name;
            $this->description = $term->description;
            $searchParams['ArticleSearch']['terms'][$term->termGroup->slug] = $term->id;
        }
        $_searchParams = \Yii::$app->request->get();
        $searchParams = ArrayHelper::merge($_searchParams, $searchParams);
        $searchModel = new ArticleSearch();
        $provider = $searchModel->search($searchParams);
        //displaying only published articles
        $provider->query->andFilterWhere(['article.status' => Article::STATUS_PUBLISHED]);
        $provider->sort = ['defaultOrder' => ['created' => 'DESC']];
        $termGroups = $this->getCategoryTermGroups($this->slug);
        //Для того чтобы отобразить на странице статей следующие и предыдущие елементы,сохраняю провайдер в сессионную переменную
        \Yii::$app->session->set('articleProvider', $provider);

        $colors = !empty($withColorSetting) ? Color::find()->all() : [];
        \Yii::$app->view->title = $this->title;
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' => $this->description
        ]);
        $termGroups = ArrayHelper::map($termGroups, 'id', function ($e) {
            return $e;
        }, 'type');
        //finding out current category for the filter displaying value
        $url = \Yii::$app->request->absoluteUrl;
        $url = explode('/', $url);
        //the page has pagination
        if($pag_last_pos = strpos($url[3], '?'))
            $url[3] = substr($url[3], 0, $pag_last_pos);
        $cat_model = ArticleCategory::find()->all();
        $categories = [];
        $current_category = null;
        foreach($cat_model as $item) :
            array_push($categories, $item->slug);
        endforeach;
        foreach($url as $item) :
            foreach($categories as $category) :
                if($item == $category)
                    $current_category = $category;
            endforeach;
        endforeach;
        $show_filter = Setting::find()->where(['key' => 'category_filter', 'value' => $current_category])->exists();
        //banners
        //dump($current_category);
        $banners = Banner::find()->where(['=', 'route', 'article/' . $current_category ])->all();

        return $this->render('index', [
            'title' => $this->title,
            'description' => $this->description,
            'searchModel' => $searchModel,
            'models' => $provider->getModels(),
            'categorySlug' => $this->slug,
            'termGroups' => $termGroups,
            'param' => $param,
            'pagination' => $provider->getPagination(),
            'colors' => $colors,
            'show_filter' => $show_filter,
            'banners' => $banners,
        ]);
    }

    protected function getCategoryTermGroups($slug)
    {
        return TermGroup::find()
            ->joinWith(['children' => function (Query $q) {
                $q->from('term_group tgc');
            }, 'terms'])
            ->where(['=', 'tgc.slug', $slug])
            ->all();
    }

    protected function getColors($slug)
    {
        return TermGroup::find()
            ->joinWith(['children' => function (Query $q) {
                $q->from('term_group tgc');
            }, 'terms'])
            ->where(['=', 'tgc.slug', $slug])
            ->all();
    }

    public function actionArticle($slug)
    {
        $this->layout = "new/main";

        $article = $this->findArticle($slug);
        if(is_file(\Yii::getAlias('@frontend') . '/views/article/single-' . $article->category->slug.'.php')){
            $template = 'single-'.$article->category->slug;
        }else{
            $template = 'single';
        };

        $previousArticle = Article::find()
            ->joinWith(['category'])
            ->where(['=', 'article_category.id', $article->category->id]);
        $nextArticle = clone $previousArticle;
        $previousArticle = $previousArticle->andWhere(['<', 'article.id', $article->id])->orderBy('article.id desc')->one();
        $nextArticle = $nextArticle->andWhere(['>', 'article.id', $article->id])->orderBy('article.id asc')->one();
        $threeArticles = $this->getRecommendedArticles($article, 3);
        $this->storeArticleView($article);
        $tag = Tag::findOne(['article_id' => $article->id]);
        $tags = [];
        if($tag) :
            $tag->text = str_replace(' ', '', $tag->text);
            $tags = explode(',', $tag->text);
        endif;

        //adding class to each img for the pinterest icon
        $haystack = $article->content;
        $needle = '<img';
        $fnd = [];
        $pos = 0;

        while ($pos <= strlen($haystack)) :
            $pos = strpos($haystack, $needle, $pos);
            if ($pos > -1) :
                $fnd[] = $pos++;
                continue;
            endif;
            break;
        endwhile;
        $offset = 0;
        foreach($fnd as $item) :
            $item = $item + $offset;
            $before = substr($article->content, 0, $item + 5);
            $after = substr($article->content, $item + 5, strlen($article->content));
            $article->content = $before . "class='foo' " . $after;
            $offset = $offset + 12;
        endforeach;
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => $article->title,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:image',
            'content' => OneHelper::getImgUrl($article->thumbnail, 'articleThumb'),
        ]);
        \Yii::$app->view->registerMetaTag([
                'property' => 'og:description',
                'content' => str_replace('[/', '', str_replace('[Gallery]', '', strip_tags(mb_substr($article->content, 0, 500, 'UTF-8')))),
        ]);
        \Yii::$app->view->registerMetaTag([
                'property' => 'fb:app_id',
                'content' => '1083258958415470',
        ]);
//        \Yii::$app->view->registerMetaTag([
//                'property' => 'og:url',
//                'content' => 'http://theone.reclamare.ua/article/antuaneta-i-aroslav-svadba-v-stile-sebbi-sik',
//        ]);
//        \Yii::$app->view->registerMetaTag([
//                'property' => 'og:type',
//                'content' => 'article',
//        ]);


        return $this->render($template, [
            'article' => $article,
            'threeArticles' => $threeArticles,
            'nextArticle' => $nextArticle,
            'previousArticle' => $previousArticle,
            'tags' => $tags,
        ]);
    }

    protected function findArticle($slug)
    {
        return Article::find()
            ->joinWith(['category', 'likedUsers'])
            ->joinWith(['relatedArticles' => function ($q) {
                $q->from('article ra');
            }])
            ->where(['=', '`article`.`slug`', $slug])->one();
    }

    protected function getRecommendedArticles($article = false, $limit = 3)
    {
        $limit = $limit - sizeOf($article->relatedArticles);
        $ids = ArrayHelper::merge([$article->id], ArrayHelper::getColumn($article->relatedArticles, 'id'));
        $q = Article::find()->where(['status' => Article::STATUS_PUBLISHED])
            ->andFilterWhere(['!=', 'slug', 'vakansii'])
            ->andFilterWhere(['!=', 'slug', 'kontakty'])
            ->andFilterWhere(['!=', 'slug', 'pravila'])
            ->andFilterWhere(['!=', 'slug', 'reklama'])
            ->andFilterWhere(['!=', 'category_id', '0']);
        if ($article->relatedArticles) {
            $q->where(['!=', 'id', $ids]);
        }
        $q->orderBy('RAND()')->limit($limit);
        return ArrayHelper::merge($q->all(), $article->relatedArticles);
    }


    /**
     * A function that checks if professional was watched during a php session.
     * If so,then it creates a record into database with a time,sessionId and professional_id that have been watched
     * by user.
     * @param $model
     */
    protected function storeArticleView($model)
    {
        if (empty($articleWatches = \Yii::$app->session->get('articleWatches'))) {
            $articleWatches = [];
        }


        if (!in_array($model->id, $articleWatches)
            && empty(ArticleViewCount::findOne(['article_id' => $model->id, 'session_id' => \Yii::$app->session->id]))
        ) {
            $view = new ArticleViewCount();
            $view->article_id = $model->id;
            $view->session_id = \Yii::$app->session->id;
            $view->time = time();
            $view->save();
            $model->watch++;
            $model->save();
            array_push($articleWatches, $model->id);
            \Yii::$app->session->set('professionalWatches', $articleWatches);
        }
    }
}
