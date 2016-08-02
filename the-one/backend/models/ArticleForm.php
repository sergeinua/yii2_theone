<?php
namespace backend\models;

use common\models\Article;
use common\models\Color;
use common\models\Term;
use common\models\TermToArticle;
use yii\base\Exception;
use yii\behaviors\SluggableBehavior;
use yii\db\Connection;
use yii\db\Transaction;
use yii\web\UploadedFile;

class ArticleForm extends \yii\base\Model{


    /**
     * @var Article;
     */
    public $article;
    public $terms;
    public $category;
    public $termGroups;
    public $colors;
    public $relatedArticles;
    public $tag;


   public function rules(){
        return [
            [['category','article'],'required'],
            ['terms','each','rule'=>['required']],
            [['terms', 'colors','relatedArticles','category_id'], 'safe']
        ];
    }

 /*
  public function behaviors(){

    }*/

    public function save(){
        if($articleThumbnail = UploadedFile::getInstance($this->article,'thumbnail')){
            $this->storeThumbnail($articleThumbnail);
        }else{
            unset($this->article->thumbnail);
        }
        if(\Yii::$app->controller->action->id != 'update')
            $this->article->category = $this->category->slug;

        if($this->article->validate()&&$this->article->save()){

            //begin transaction
            $transaction = \Yii::$app->getDb()->beginTransaction();
            try{
                //Setting terms for article
                $this->article->dropTerms();
                foreach($this->terms as $k=>$v){
                    if($v) {
                        $term = Term::find()
                            ->joinWith('termGroup')
                            ->where(['=', 'term.id', $v])
                            ->andWhere(['=', 'term_group.id', $k])
                            ->one();
                        $this->article->term = $term->id;
                    }
                }
                //Setting colors for article
                $this->article->dropColors();
                if($this->colors){
                    foreach($this->colors as $k=>$v){
                        $this->article->color = $v;
                    }
                }
                //Setting related articles
                $this->article->dropRelatedArticles();
                if($this->relatedArticles){
                    foreach ($this->relatedArticles as $r ) {
                        $this->article->relatedArticle = $r;
                    }
                }
                $transaction->commit();
                return true;
            }catch(Exception $e){
                $transaction->rollBack();
                throw $e;
            }
        };
        return false;



    }

    protected function storeThumbnail(UploadedFile $articleThumbnail){
        $path = \Yii::$app->params['imgPath'];
        $fileNameOfSaved = md5($articleThumbnail->name).'.'.$articleThumbnail->extension;
        $filePath = $path.$fileNameOfSaved;
        $this->article->thumbnail = $fileNameOfSaved;
        $articleThumbnail->saveAs($filePath);
    }


}