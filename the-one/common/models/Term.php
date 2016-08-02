<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "term".
 *
 * @property integer $id
 * @property integer $term_group_id
 * @property string $name
 * @property string $description
 * @property string $slug
 *
 * @property TermGroup $termGroup
 * @property TermToArticle[] $termToArticles
 */
class Term extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'term';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['term_group_id'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 128],
            ['slug','unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'term_group_id' => 'Term Group ID',
            'name' => 'Name',
            'description' => 'Description',
            'slug' => 'Slug',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTermGroup()
    {
        return $this->hasOne(TermGroup::className(), ['id' => 'term_group_id']);
    }

    public function getTermGroupParent(){
        return $this->hasOne(TermGroup::className() . ' pg',['id'=>'parent_id'])->via('termGroup');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTermToArticles()
    {
        return $this->hasMany(TermToArticle::className(), ['term_id' => 'id']);
    }

}
