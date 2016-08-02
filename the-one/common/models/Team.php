<?php

namespace common\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "team".
 *
 * @property integer $id
 * @property string $name
 * @property string $photo
 * @property string $profession
 * @property string $top_quote
 * @property string $main_quote
 * @property integer $soc_tw
 * @property string $soc_fb
 * @property string $soc_vk
 * @property string $soc_in
 * @property string $slug
 */
class Team extends \yii\db\ActiveRecord
{
    public $_photoFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'team';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['top_quote', 'main_quote'], 'string'],
            [['soc_tw'], 'integer'],
            [['name', 'profession', 'soc_fb', 'soc_vk', 'soc_in', 'slug'], 'string', 'max' => 255],
            [['photoFile'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'photo' => 'Фото',
            'profession' => 'Профессия',
            'top_quote' => 'Цитата сверху',
            'main_quote' => 'Главная цитата',
            'soc_tw' => 'Soc Tw',
            'soc_fb' => 'Soc Fb',
            'soc_vk' => 'Soc Vk',
            'soc_in' => 'Soc In',
            'slug' => 'Slug',
        ];
    }

    public function setPhotoFile( $file)
    {
        if($file){
            $this->_photoFile = $file;
            $this->photo =  md5(microtime()).'.'.$file->extension;
        }

    }

    public function getPhotoFile(){
        return $this->_photoFile;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->_photoFile) {
                //TODO:Slug
                $this->_photoFile->saveAs(\Yii::$app->params['imgPath']. $this->photo);
            }
            return true;
        } else {
            return false;
        }
    }
}
