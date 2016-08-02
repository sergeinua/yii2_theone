<?php

namespace common\models\search;

use common\models\TermToArticle;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Article;
use yii\helpers\ArrayHelper;

/**
 * ArticleSearch represents the model behind the search form about `common\models\Article`.
 */
class ArticleSearch extends Article
{
    public $colors;
    public $orderBy;
    public $category_id;
    /*
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'slug','orderBy', 'thumbnail','category_slug','category_id','content', 'created', 'type', 'meta_title', 'meta_description', 'meta_keyword','terms','colors'], 'safe'],
        ];
    }

    public function attributes(){
        return array_merge(
            parent::attributes(),
            ['terms','category_slug']);

    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Article::find()->distinct();
        $query->joinWith('category');
        $query->joinWith('terms');
        $query->joinWith('colors');
        $query->joinWith('likedUsers');
        $query->joinWith('category');
//        $query->joinWith('likedUsersCount');
        $query->joinWith('terms.termGroup');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere([
            'id' => $this->id,
            'created' => $this->created,
        ]);
        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'article.slug', $this->slug])
            ->andFilterWhere(['like', 'thumbnail', $this->thumbnail])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'meta_title', $this->meta_title])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keyword', $this->meta_keyword]);
            $query->andFilterWhere(['=','article_category.slug',$this->category_slug]);
        //filtering categories
        if(isset($this->terms) && count($this->terms) > 0) :
            //as there's the very single value that we need
            $sub_cat = array_values($this->terms);
            $sub_cat = $sub_cat[0];
            $art_model = TermToArticle::find()->where(['term_id' => $sub_cat])->all();
            $articles = [];
            foreach($art_model as $item) :
                array_push($articles, $item->article_id);
            endforeach;
            $query->filterWhere(['article.id' => $articles]);
        endif;
        //filtering dates
        $query->orderBy('created desc');

//            if(isset($this->terms)){
//                foreach($this->terms as $k=>$v){
//                    if(!empty($v)){
//                        $query->andWhere('(EXISTS ('.TermToArticle::find()
//                                ->distinct()
//                                ->where(['in','term_to_article.term_id',$v])
//                                ->andWhere('term_to_article.article_id = article.id')
//                                ->createCommand()
//                                ->rawSql.'))');
//                    }
//                }
//            }

        if(!Yii::$app->user->can('admin')){
            $query->andFilterWhere(['>','article.status',Article::STATUS_UNPUBLISHED]);
            $query->orderBy('article.status');
        }

        if(isset($this->colors)){
           $query->andFilterWhere(['in','color.slug',$this->colors]);
        }

        if(isset($this->colors)) {
            $query->groupBy('article.id');
            $query->having(['=', 'count(DISTINCT color.slug)', sizeof($this->colors)]);
        }
        if(isset($this->category)) {
            $query->andFilterWhere(['=','article_category.id',$this->category_id]);
        }

        if(isset($this->orderBy)){
            switch($this->orderBy){
                case 'date_created':
                    $query->orderBy('created desc');
                    break;
                case 'title':
                    $query->orderBy('title desc');
                    break;
                case 'popularity':
                    $query->orderBy('watch desc');
                    break;
            }
        }

        return $dataProvider;

    }
}
