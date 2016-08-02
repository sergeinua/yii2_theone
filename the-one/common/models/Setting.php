<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "setting". Settings has 5 groups.
 * 0 -Website - common settings that used on every page. Like social buttons,logo,contacts etc
 * 1 -Article - it has two specific settings - colors and filter.
 * 2 -Instagram - there was a time when we have an instagram filter. This group has instagram cache and its expire date
 * 3 - About Magazine - group only for one page "About Magazine"
 * 4 - Contacts - group only for one page "Contacts"
 * 5 - MainPage - group only for Front page
 * @property integer $id
 * @property string $key
 * @property string $value
 */
class Setting extends \yii\db\ActiveRecord
{
    public static $groups = [
            'website'=>0,
            'article'=>1,
            'instagram'=>2,
            'about_magazine'=>3,
            'contacts'=>4,
            'main_page'=>5
    ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['key'], 'string', 'max' => 255],

        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'key' => 'Key',
            'value' => 'Value',
            'group'=>'Group'
        ];
    }
    public static function findByGroup($group){
        return ArrayHelper::map(Setting::find()
            ->where(['=','group',Setting::$groups[$group]])
            ->asArray()
            ->all(),'key','value');
    }

}
