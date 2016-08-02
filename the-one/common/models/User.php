<?php
namespace common\models;

use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\base\View;
use yii\behaviors\AttributeBehavior;
use yii\behaviors\TimestampBehavior;
use yii\console\Response;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    //Забанен
    const STATUS_BANNED = 0;
    //зарегистрированный с неподтверждённым аккаунтом
    const STATUS_NEW     = 5;
    //зарегистрированый с подтверждённым аккаунтом
    const STATUS_ACTIVE = 10;
    //Зарегистрирован, с подтверждённым аккаунтом и доступен для просмотра.
    //Использовать только для профессионалов.
    const STATUS_AVAILABLE = 15;

    private $_wedding_date;
//    protected $_professionalGroupsIDs;
    protected $_userProfessionalInfo;

    public static $accountTypes= [
            10=>[
                'id'=>10,
                'name'=>'Профессионал'
            ],
            20=>[
                'id'=>20,
                'name'=>'Пользователь'
            ],
        ];
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            [
                'class'=>AttributeBehavior::className(),
                'attributes'=>[
                    self::EVENT_BEFORE_INSERT=>'role'
                ],
                'value'=>'user'
            ]
        ];
    }
    public function attributeLabels()
    {
        return [
            'fullName' => 'Полное имя',
            'organisation_name'=>'Название организации',
            'wedding_date'=>'Дата свадьбы'

        ];
    }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_NEW],
            ['contact_email','email'],
            [
                [
                    'email',
                    'first_name',
                    'last_name',
                    'auth_key',
                    'userProfessionalInfo',
                    'password_reset_token',
                    'role',
                    'type',
                    'avatar',
                    'slug',
                    'city_id',
                    'country_id',
                    'phone',
                    'contact_email',
                    'country',
                    'adress',
                    'latlng',
                    'socials',
                    'wedding_date'
                ],
                'safe'
            ],
            ['slug','unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
{
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by email
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_professional_id' => 'id']);
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments0()
    {
        return $this->hasMany(Comment::className(), ['user_author_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessionalGroups()
    {
        return $this->hasMany(ProfessionalGroup::className(),['id'=>'group_id'])->viaTable('group_to_professional',['user_id'=>'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserMedia()
    {
        return $this->hasMany(UserMedia::className(), ['user_id' => 'id'])->orderBy('order');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProfessionalInfo()
    {
        return $this->hasOne(UserProfessionalInfo::className(),['user_id'=>'id']);
    }

    /**
     * @return $this Get users,which liked current user
     */
    public function getLikers(){

        return $this->hasMany(User::className(),['id'=>'professional_id'])->viaTable('user_likes_to_pro',['user_id'=>'id'])->alias('lkrs');
    }

    /**
     * @return $this Get users,which liked BY(!!!) current user
     */
    public function getLiked($limit = false){
        $q = $this->hasMany(User::className(),['id'=>'professional_id'])->viaTable('user_likes_to_pro',['user_id'=>'id'])->alias('lkrs');
        if($limit){
            $q->limit(5);
        }
        return $q;
    }

    public function getFavoriteArticles(){
        return $this->hasMany(Article::className(),['id'=>'article_id'])->viaTable('user_to_fav_article',['user_id'=>'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserWedsEvents()
    {
        return $this->hasMany(UserWedsEvents::className(), ['user_id' => 'id']);
    }

    public function dropProfessionalGroups(){
        Yii::$app->getDb()->createCommand()->delete('{{%group_to_professional}}','user_id= :user_id',
            [':user_id'=>$this->id]
        )->execute();
    }

    /**
     * @return string string with all groups in which user consist
     */
    public function getCommaSeparatedGroupNames(){
       return implode(' ,',ArrayHelper::getColumn($this->professionalGroups,function($e){
            return $e->name;
        }));
    }

    public function getFullName()
    {
        if(!$this->first_name&&!$this->last_name)return false;
        return $this->first_name.' '.$this->last_name;
    }

    public function getAvatarImg(){
        if($this->avatar){
            return Yii::$app->params['imgWeb'].$this->avatar;
        }else{
            return Yii::$app->params['frontEndDomain'].'/images/no-image.gif';
        }
    }
    /**
     * @return bool Returns true if this user liked by authorised user
     */
    public function isLikedByCurrentUser(){
        if($identity = Yii::$app->user->identity) {
            $result = array_filter($this->likers, function ($element) use ($identity) {
                return $element->id == $identity->id;
            });
            return !empty($result);
        }
        return false;
    }

    /**
     * @param $userId id of user that supposed to be liked or not
     * returns true if user liked or false if user unliked
     */

    public function toggleLikeForUserWithId($professionalId){
        $currently = Yii::$app->db->createCommand(
            "SELECT * from `user_likes_to_pro`
              where `user_id`={$this->id}
              and `professional_id`= $professionalId"
        )->queryAll();
        $command = Yii::$app->db->createCommand();
        if(!empty($currently)){
            $command->delete('user_likes_to_pro',['and',['=','user_id',$this->id],['=','professional_id',$professionalId]])
                ->execute();
            return false;
        }else{
            $command->insert('user_likes_to_pro',['user_id'=>$this->id,'professional_id'=>$professionalId])
                ->execute();
            return true;
        }
    }

    public function activate(){
        $this->status = self::STATUS_ACTIVE;
        $this->save();
    }

    public function getSimilarProfessionals()
    {
        $professionalGroups = ArrayHelper::getColumn($this->professionalGroups,function($e){
        return $e->id;
     });
        return self::find()
            ->distinct()
            ->joinWith(['professionalGroups','userProfessionalInfo'])
            ->where(['in','professional_group.id',$professionalGroups])
            ->andWhere(['!=','user.id',$this->id])
            ->limit(5)
            ->all();
    }
    public function getViewsCount(){
        return $this->hasMany(ProfessionalViewCount::className(),['id'=>'professional_id']);
    }
    public function getContactMail(){
        return $this->contact_email?$this->contact_email:$this->email;
    }

    public function getPhonesArray(){
        return Json::decode($this->phone);
    }

    public function getCity(){
        return $this->hasOne(City::className(),['id'=>'city_id']);
    }

    public function getCountry(){
        return $this->hasOne(Country::className(),['id'=>'country_id']);
    }

    public function getPlace(){
        return $this->hasOne(Place::className(),['place_id'=>'place_id']);
    }
    public function beforeSave($insert){
        if (parent::beforeSave($insert)) {
            $this->wedding_date = strtotime($this->wedding_date);
            return true;
        } else {
            return false;
        }
    }
}
