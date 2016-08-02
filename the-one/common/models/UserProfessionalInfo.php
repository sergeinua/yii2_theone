<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user_professional_info".
 *
 * @property integer $user_id
 * @property integer $views
 * @property integer $rate_average
 * @property string $organization_name
 * @property string $phone
 * @property string $organization_info
 * @property integer $likes
 * @property string $website
 * @property double $lat
 * @property double $lng
 * @property string $soc_vk
 * @property string $soc_tw
 * @property string $soc_fb
 * @property string $adress
 *
 * @property User $user
 */
class UserProfessionalInfo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_professional_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['views', 'rate_average', 'likes'], 'integer'],
//            [['organisation_name'], 'required'],
            [['organisation_info'], 'string'],
            [['lat', 'lng'], 'number'],
            [['organisation_name', 'soc_vk', 'soc_tw', 'soc_fb', 'adress'], 'string', 'max' => 255],
            [['website'], 'string', 'max' => 64],
            [['views_delta','likes_delta','organisation_name','hidden_order_parameter'],'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => 'User ID',
            'views' => 'Views',
            'rate_average' => 'Rate Average',
            'organisation_name' => 'Название организации',
            'organisation_info' => 'Информация об организации',
            'likes' => 'Likes',
            'website' => 'Website',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'soc_vk' => 'Soc Vk',
            'soc_tw' => 'Soc Tw',
            'soc_fb' => 'Soc Fb',
            'adress' => 'Adress',
            'status'  =>'Статус',
            'role'  =>'Роль'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    public function getPhoneClean(){
        return preg_replace('(-|\)|\))','',$this->phone);

    }
    public function getFrontViews(){
        return $this->views+$this->views_delta;
    }
    public function getFrontLikes(){
        return $this->likes+$this->likes_delta;
    }
}
