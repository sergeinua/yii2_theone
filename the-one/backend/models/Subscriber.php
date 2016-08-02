<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "subscriber".
 *
 * @property integer $id
 * @property integer $created_at
 * @property string $name
 * @property string $email
 * @property string $telephone
 * @property integer $status
 */
class Subscriber extends \yii\db\ActiveRecord
{
    /*
     * status
     * 0 - inactive & doesn't receive notifications
     * 1 - active & receives notifications
     *
     */


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'subscriber';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'name', 'email', 'telephone', 'status'], 'required'],
            [['created_at', 'status'], 'integer'],
            [['name', 'email',  'telephone'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Created At',
            'name' => 'Name',
            'email' => 'Email',
            'telephone' => 'Telephone',
            'status' => 'Status',
        ];
    }
}
