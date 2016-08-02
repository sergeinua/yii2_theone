<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "professional_view_count".
 *
 * @property integer $professional_id
 * @property string $session_id
 * @property integer $time
 */
class ProfessionalViewCount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'professional_view_count';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['professional_id', 'time'], 'integer'],
            [['session_id'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'professional_id' => 'Professional ID',
            'session_id' => 'Session ID',
            'time' => 'Time',
        ];
    }
}
