<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "poster".
 *
 * @property integer $id
 * @property string $title
 * @property string $slug
 * @property string $thumbnail
 * @property string $content
 * @property integer $created
 * @property string $type
 * @property string $meta_title
 * @property string $meta_description
 * @property string $meta_keyword
 * @property integer $updated
 * @property integer $category_id
 * @property integer $watch
 * @property string $shortdesc
 * @property integer $status
 * @property string $video_frame
 * @property string $date_start
 * @property string $date_end
 * @property string $location
 * @property string $price
 */
class Poster extends \yii\db\ActiveRecord
{
    public $relatedArticles;
    public $poster;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'poster';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'title', 'created', 'date_start', 'date_end'], 'required'],
            [['id', 'created', 'updated', 'category_id', 'watch', 'status'], 'integer'],
            [['content', 'video_frame', 'date_start', 'date_end', 'location', 'price'], 'string'],
            [['title', 'thumbnail', 'meta_title', 'meta_description', 'meta_keyword'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 128],
            [['type'], 'string', 'max' => 64],
            [['shortdesc'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'slug' => 'Slug',
            'thumbnail' => 'Thumbnail',
            'content' => 'Content',
            'created' => 'Created',
            'type' => 'Type',
            'meta_title' => 'Meta Title',
            'meta_description' => 'Meta Description',
            'meta_keyword' => 'Meta Keyword',
            'updated' => 'Updated',
            'category_id' => 'Category ID',
            'watch' => 'Watch',
            'shortdesc' => 'Shortdesc',
            'status' => 'Status',
            'video_frame' => 'Video Frame',
            'date_start' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'location' => 'Место проведения',
            'price' => 'Стоимость',
        ];
    }
}
