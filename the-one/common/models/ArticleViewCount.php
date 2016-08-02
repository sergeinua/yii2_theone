<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_view_count".
 *
 * @property integer $article_id
 * @property string $session_id
 * @property integer $time
 */
class ArticleViewCount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_view_count';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['article_id', 'time'], 'integer'],
            [['session_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'article_id' => 'Article ID',
            'session_id' => 'Session ID',
            'time' => 'Time',
        ];
    }
}
