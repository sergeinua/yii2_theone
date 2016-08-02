<?php
namespace backend\models;


use common\helpers\OneHelper;
use common\models\Place;
use yii\base\Exception;
use yii\web\UploadedFile;
use common\models\UserProfessionalInfo;
use Yii;

class UserForm extends \yii\base\Model{
    /**
     * @var \common\models\User
     */
    public $user;
    public $role;
    public $professionalGroupsIDs;
    /**
    * @var $userProfessionalInfo UserProfessionalInfo
    */
    public $userProfessionalInfo;
    public $placeId;

    /**
     * @inheritdoc
     */
//    public $tags;
//    public $mediaFiles;
//    public $weds_events;
//    public $userRatingDelta;
//    public $group;
//    public $userMedia;

    public function rules(){
        return [
            [['user','role','professionalGroupsIDs','userProfessionalInfo','placeId'], 'safe']
        ];
    }

    public function save(){
     if($this->user->validate()){

            if($avatar = UploadedFile::getInstance($this->user,'avatar')){
                $this->storeAvatar($avatar);
            }else{
                $this->user->avatar = $this->user->getOldAttribute('avatar');
            }
              $transact = Yii::$app->getDb()->beginTransaction();
            if($this->user->save()){

                try{
                    $place = $this->storePlace();
                    $this->user->place_id = $place->place_id;
                    $this->user->city_id = $place->city->id;
                    $this->user->country_id = $place->country->id;
                    $this->user->save();
                    $this->user->dropProfessionalGroups();
                    if($this->professionalGroupsIDs) {
                        $rows = [];
                        foreach ($this->professionalGroupsIDs as $v) {
                            $rows[] = [
                                $this->user->id,
                                $v
                            ];
                        };
                        Yii::$app->db->createCommand()->batchInsert('{{%group_to_professional}}', ['user_id', 'group_id'], $rows)->execute();
                    }
                    if($this->userProfessionalInfo){
                        $this->userProfessionalInfo->user_id = $this->user->id;
                        $this->userProfessionalInfo->save();
                    }
                    $transact->commit();
                }catch(Exception $e){
                    $transact->rollBack();
                    throw $e;
                }

                return true;
            };
        }
        return false;
    }

    public function setAttributes($attributes){
        parent::setAttributes($attributes);
        $this->user->setAttributes($attributes['User']);
    }

    /**
     * TODO:Refactor?
     * @param UploadedFile $articleThumbnail
     */

    protected function storeAvatar(UploadedFile $userAvatar){
        $path = \Yii::$app->params['imgPath'];

        $fileNameOfSaved = OneHelper::getSlug(md5(microtime()).'.'.$userAvatar->extension);
        $filePath = $path.$fileNameOfSaved;
        if($userAvatar->saveAs($filePath)){
            $this->user->avatar = $fileNameOfSaved;
            return true;
        }
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