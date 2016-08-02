<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "term_group".
 *
 * @property integer $id
 * @property string $slug
 * @property string $name
 * @property integer $parent_id
 *
 * @property Term[] $terms
 */
class TermGroup extends \yii\db\ActiveRecord
{
    public $parent;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'term_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['slug', 'name'],'string', 'max' => 255],
            [['slug'],'unique'],
            ['type','safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerms()
    {
        return $this->hasMany(Term::className(), ['term_group_id' => 'id']);
    }

    public function getParentTermGroup(){
//        return $this->hasOne()
        return $this->hasOne(TermGroup::className(),['id'=>'parent_id']);
    }

    public function getChildren(){
        return $this->hasMany(TermGroup::className(),['id'=>'parent_id']);
    }

//    public function getChildren(){
//        return $this->hasMany(TermGroup::className(),['parent_id'=>'id']);
//    }

//    public static function find()
//    {
//        return parent::find()
//            ->addSelect([1
//                'parent' => parent::find()->from(self::tableName().' p')->where('parent_id = p.id'),
//            ]);
//    }
}
