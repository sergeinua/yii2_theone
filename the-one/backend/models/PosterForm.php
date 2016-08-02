<?php
namespace backend\models;

use common\models\Article;
use common\models\Color;
use common\models\Poster;
use common\models\Term;
use common\models\TermToArticle;
use yii\base\Exception;
use yii\behaviors\SluggableBehavior;
use yii\db\Connection;
use yii\db\Transaction;
use yii\web\UploadedFile;

class PosterForm extends \yii\base\Model{


    /**
     * @var Poster;
     */
    public $article;
    public $terms;
    public $category;
    public $termGroups;
    public $colors;
    public $relatedArticles;
    public $poster;
    public $id;
    public $title;
    public $thumbnail;

    public function rules(){
        return [
            [['category','article'],'required'],
            ['terms','each','rule'=>['required']],
            [['terms', 'colors','relatedArticles','category_id'], 'safe']
        ];
    }



    public function save(){
        dump($this->poster);die;
        if($articleThumbnail = UploadedFile::getInstance($this->poster,'thumbnail')){
            $this->storeThumbnail($articleThumbnail);
        }else{
            unset($this->poster->thumbnail);
        }
        dump($this);die;
//        $this->article->category = $this->category->slug;
        if($this->poster->validate()&&$this->poster->save()){
//        if(true){
            die('form');
            //begin transaction
            $transaction = \Yii::$app->getDb()->beginTransaction();
            try{

                if($this->relatedArticles){
                    foreach ($this->relatedArticles as $r ) {
                        $this->poster->relatedArticles = $r;
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