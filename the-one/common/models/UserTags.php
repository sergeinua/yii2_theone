<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_tags".
 *
 * @property integer $id
 * @property string $value
 *
 * @property UserToTag[] $userToTags
 */
class UserTags extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_tags';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['value'], 'string', 'max' => 32],
            [['value'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserToTags()
    {
        return $this->hasMany(UserToTag::className(), ['tag_id' => 'id']);
    }
}
