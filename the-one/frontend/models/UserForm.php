<?php

namespace frontend\models;

use common\models\Place;
use common\models\User;
use frontend\components\OneNotify;
use Yii;
use yii\base\Exception;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class UserForm extends Model
{
    /**
     * @var \common\models\User
     */

    public $user;
    public $professionalGroupsIDs;
    /**
     * @var \common\models\UserProfessionalInfo
     */

    public $userProfessionalInfo;
    public $placeId;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['placeId','safe']
        ];
    }

    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }


    public function save()
    {

        //if(!in_array($this->user->role,['professional','user']))return false;
        if ($this->user->validate()) {


            $transact = Yii::$app->getDb()->beginTransaction();
            try {
//                dump($this->placeId);die;
                if($this->placeId) {
                    $place = $this->storePlace();
                    $this->user->place_id= $place->place_id;
                    $this->user->city_id = $place->city->id;
                    $this->user->country_id = $place->country->id;
                }
                $this->user->save();
                $this->user->dropProfessionalGroups();
                if ($this->professionalGroupsIDs) {
                    $rows = [];
                    foreach ($this->professionalGroupsIDs as $v) {
                        $rows[] = [
                            $this->user->id,
                            $v
                        ];
                    };
                    Yii::$app->db->createCommand()->batchInsert('{{%group_to_professional}}', ['user_id', 'group_id'], $rows)->execute();
                }

                if($this->userProfessionalInfo->validate()){
                    $this->userProfessionalInfo->save();
                }
                $transact->commit();
            } catch (Exception $e) {
                $transact->rollBack();
                throw $e;
            }
            return true;
        }

        OneNotify::prepareNotify('error','Проверьте форму на наличие ошибок');
        return false;
    }
    protected function storePlace(){
        $place = Place::findOne(['place_id'=>$this->placeId]);
        if(!$place){
            $place = new Place($this->placeId);
            $place->save();
        }
        return $place;
    }
}

