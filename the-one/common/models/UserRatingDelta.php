<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_rating_delta".
 *
 * @property integer $user_professional_id
 * @property double $dalta
 */
class UserRatingDelta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_rating_delta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_professional_id'], 'integer'],
            [['dalta'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_professional_id' => 'User Professional ID',
            'dalta' => 'Dalta',
        ];
    }
}
