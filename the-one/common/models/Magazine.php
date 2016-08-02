<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

/**
 * This is the model class for table "magazine".
 *
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $shortdesc
 * @property string $content
 * @property string $announcement
 * @property string $cover
 * @property string $issuu
 * @property string $journals_ua
 */
class Magazine extends \yii\db\ActiveRecord
{
    public $_coverFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'magazine';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created',
                'updatedAtAttribute' => 'updated',
                'value' => new Expression('UNIX_TIMESTAMP(NOW())'),
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'announcement', 'issuu'], 'string'],
            [['name', 'price', 'shortdesc', 'journals_ua'], 'string', 'max' => 255]
        ];
    }
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'price' => 'Цена',
            'shortdesc' => 'Краткое описание',
            'content' => 'содержание',
            'announcement' => 'Краткое содержание',
            'cover' => 'Обложка',
            'issuu' => 'Код сайта "ISSUU"',
            'journals_ua' => 'Ссылка на покупку журнала',
        ];
    }

    public function setCoverFile(UploadedFile $file)
    {
        $this->_coverFile = $file;
        $this->cover =  md5(microtime()).'.'.$file->extension;
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if($this->_coverFile) {
                $this->_coverFile->saveAs(\Yii::$app->params['imgPath']. $this->cover);
            }
            return true;
        } else {
            return false;
        }
    }
    public function afterDelete(){
        parent::afterDelete();
        if($this->cover)
            unlink(Yii::$app->params['imgPath'].$this->cover);
    }
}
