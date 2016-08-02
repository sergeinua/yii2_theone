<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "professional_group".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $slug
 *
 * @property GroupToProfessional[] $groupToProfessionals
 */
class ProfessionalGroup extends \yii\db\ActiveRecord
{
    public $user_count;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'professional_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['slug'], 'string', 'max' => 64],
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
            'name' => 'Имя',
            'description' => 'Описание',
            'slug' => 'Slug',
        ];
    }

    public function getUserCount(){
        return $this->hasMany(User::className(),['id'=>'user_id'])->viaTable('group_to_professional',['group_id'=>'id'])->count();
    }

    public static function find()
    {
        return parent::find()
            ->select([
                'professional_group.*',
                'user_count' => '('.Yii::$app->getDb()->createCommand('SELECT DISTINCT count(`user`.`id`) from `user`
                left join `group_to_professional` on `user`.`id`=`group_to_professional`.`user_id`
                left join `professional_group` pg2 on pg2.`id`=`group_to_professional`.`group_id` WHERE professional_group.id = pg2.id and `user`.`role`="professional"')->getRawSql().')'
            ]);


    }
}
