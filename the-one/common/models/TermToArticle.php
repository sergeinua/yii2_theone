<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "term_to_article".
 *
 * @property integer $term_id
 * @property integer $article_id
 *
 * @property Article $article
 * @property Term $term
 */
class TermToArticle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'term_to_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['term_id', 'article_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'term_id' => 'Term ID',
            'article_id' => 'Article ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticle()
    {
        return $this->hasOne(Article::className(), ['id' => 'article_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerm()
    {
        return $this->hasOne(Term::className(), ['id' => 'term_id']);
    }

    public function getTermGroup(){
        return $this->hasOne(TermGroup::className(),['id'=>'term_group_id'])->via('term');
    }


}
