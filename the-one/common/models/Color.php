<?php

namespace common\models;

use common\models\search\ArticleSearch;
use Yii;

/**
 * The Color model we use to relate it to any article.
 * @property integer $id
 * @property string $hex
 * @property string $name
 * @property string $slug
 */
class Color extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'color';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['hex','name'], 'required'],
            [['hex'], 'string', 'max' => 7],
            [['name', 'slug'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hex' => 'Hex',
            'name' => 'Name',
            'slug' => 'Slug',
        ];
    }

    /**
     * Get articles related to color
     * @return $this
     */
    public function getArticles(){
        return $this->hasMany(Article::className(),['id'=>'article_id'])->viaTable('color_to_article',['color_id'=>'id']);

    }

}
