<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article_category".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $slug
 */
class ArticleCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'slug'], 'required'],
            [['description'], 'string'],
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
            'name' => 'Name',
            'description' => 'Description',
            'slug' => 'Slug',
        ];
    }

    /**
     * Check if this category has color.
     * @return bool
     */
    public function getHasColor()
    {
        $setting = Setting::find()->where(['key' => 'category_colors', 'value' => $this->slug])->one();
        return $setting ? true : false;
    }

    /**
     * Checking of visibility of filter on category page
     * @return bool
     */
    public function getHasFilter()
    {
        $setting = Setting::find()->where(['key' => 'category_filter', 'value' => $this->slug])->one();
        return $setting ? true : false;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $termGroup = new TermGroup([
                    'name' => $this->name,
                    'parent_id' => 0
                ]);
            } else {
                $termGroup = TermGroup::find()->where(['slug' => $this->oldAttributes['slug']])->one();
            }
            $termGroup->slug = $this->slug;
            $termGroup->save();
            return true;
        }
        return false;
    }

    public function getArticles()
    {

        return $this->hasMany(Article::className(), ['id' => 'category_id']);

    }
}
