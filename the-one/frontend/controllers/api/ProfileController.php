<?php
/**
 * Created by PhpStorm.
 * User: jerichozis
 * Date: 19.01.16
 * Time: 9:53
 */

namespace frontend\controllers\api;


use common\helpers\OneHelper;
use common\models\User;
use common\models\UserMedia;
use frontend\components\OneAccess;
use yii\base\Controller;
use yii\console\Response;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;
use yii\web\UnsupportedMediaTypeHttpException;
use yii\web\UploadedFile;

class ProfileController extends \yii\web\Controller
{
    public function behaviors(){
        return [
            'access' => [
                'class' => OneAccess::className(),
                'rules' => [
                    [
                        'allow'=>true,
                        'roles'=>['@'],
                    ]

                ],
            ]
        ];
    }

    /**
     * TODO:REFACTOR!
     * @return array|bool
     * @throws BadRequestHttpException
     */
    public function actionImgUpload(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if($cover = UploadedFile::getInstanceByName('avatar')){

            if(!in_array($cover->extension,['jpg','png'])){
                throw new UnsupportedMediaTypeHttpException('Неверный формат файла');
            }

            $user = \Yii::$app->user->identity;


            $currentFile = \Yii::$app->params['imgPath'].$user->avatar;
            if(file_exists($currentFile)&&!is_dir($currentFile)){
                unlink($currentFile);
            }

            $path = \Yii::$app->params['imgPath'];
            $fileNameOfSaved = md5(microtime()).'.'.$cover->extension;
            $filePath = $path.$fileNameOfSaved;
            $user->avatar = $fileNameOfSaved;
            if($user->validate()&&$user->save()){
                $cover->saveAs($filePath);
                $response = [];
                //Некрасиво,но сроки =(((
                $response['imgUrl'] = \Yii::$app->params['frontEndDomain'].\Yii::$app->params['imgWeb'].'thumbnail/'.$user->avatar;
                return $response;
            }
            return false;
        }
        throw new BadRequestHttpException();
    }
    /**
     * TODO:REFACTOR!
     * @return array|bool
     * @throws BadRequestHttpException
     */
    public function actionImageGalleryUpload(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if($image = UploadedFile::getInstanceByName('image')){
            if(!in_array($image->extension,['jpg','png'])){
                throw new BadRequestHttpException('Неверный формат файла');
            }
            //Тут проверка на размер файла.

            //Сохраняем в файловую систему.
            $path = \Yii::$app->params['imgPath'];
            $fileNameOfSaved = md5(microtime()).'.'.$image->extension;
            $filePath = $path.$fileNameOfSaved;

            if($image->saveAs($filePath)){
                $userMedia = new UserMedia();
                $userMedia->type = 'image';
                $userMedia->url = $fileNameOfSaved;
                $userMedia->thumbnail_url = OneHelper::getImgUrl($fileNameOfSaved,'thumbnail');
                $userMedia->user_id = \Yii::$app->user->id;
                $userMedia->save();

                return $userMedia;
            }
        }
        throw new BadRequestHttpException('Произошла ошибка при добавлении видео');
    }

    public function actionVideoUpload(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($post = \Yii::$app->request->post()){
            $userMedia = new UserMedia();
            $userMedia->url = $post['videoUrl'];
            $userMedia->thumbnail_url = $post['videoThumb'];
            $userMedia->type = 'video';
            $userMedia->user_id = \Yii::$app->user->id;
            $userMedia->save();

            return $userMedia;
        }

        throw new BadRequestHttpException('Произошла ошибка при добавлении видео');
    }

    public function actionRemoveGalleryItem(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($post = \Yii::$app->request->post()){
            if($userMedia = UserMedia::findOne($post["item"]['id'])){
                if($userMedia->belongsToLoggedUser){
                    if($userMedia->type==='image'){
                        unlink(\Yii::$app->params['imgPath'].$post["item"]['url']);
                    }
                    $userMedia->delete();
                    return ['status'=>'ok'];
                }


            }
        }
        throw new BadRequestHttpException('Произошла ошибка при удалении!');
    }

    public function actionChangedOrder(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        if($post = \Yii::$app->request->post()){
            $sortedList = Json::decode($post['sortedList']);
            $order = 1;
            foreach($sortedList as $value){
                $media = UserMedia::findOne($value['id']);
                $media->order = $order;
                $media->save();
                $order++;
            }
            return ['status'=>'ok'];
        }
    }

}