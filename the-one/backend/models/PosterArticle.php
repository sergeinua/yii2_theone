<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "poster_article".
 *
 * @property integer $poster_id
 * @property integer $article_id
 */
class PosterArticle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poster_article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['poster_id', 'article_id'], 'required'],
            [['poster_id', 'article_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'poster_id' => 'Poster ID',
            'article_id' => 'Article ID',
        ];
    }
}
