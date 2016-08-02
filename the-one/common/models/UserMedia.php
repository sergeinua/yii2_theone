<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_media".User media is a video link or image that user can add in his personal cabinet
 *
 * @property integer $user_id
 * @property string $url
 * @property string $type
 * @property User $user
 */
class UserMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['url'], 'string', 'max' => 128],
            [['type'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'url' => 'Url',
            'type' => 'Type',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getBelongsToLoggedUser(){
        return $this->user_id === Yii::$app->user->id;
    }
}
