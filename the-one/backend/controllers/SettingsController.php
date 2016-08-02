<?php
namespace backend\controllers;

use backend\components\BackendController;
use backend\models\SettingsForm;
use backend\models\Subscriber;
use common\components\Notifier;
use common\models\Article;
use common\models\Setting;
use common\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use common\models\LoginForm;
use yii\filters\VerbFilter;

/**
 * Site controller
 */
class SettingsController extends BackendController
{
    /**
     * @inheritdoc
     */
//    public function behaviors()
//    {
//        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'rules' => [
//                    [
//                        'allow' => true,
//                        'roles' => ['admin'],
//                    ],
//                ],
//            ]
//        ];
//    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        //not finished
        if($request = Yii::$app->getRequest()->get()) :
            $request = implode($request);
            $request = strip_tags($request);
            $request = str_replace(' ', '', $request);
            $social_model = Setting::find()->where(['key' => 'socials'])->one();
            $socials = $social_model->value;
            $socials = \yii\helpers\Json::decode($socials, 'assoc');
            $updated = [];
            foreach($socials as $item) :
                if(trim($item['social']['name']) !== $request) :
                    dump($item);
                    array_push($updated, $item);
                endif;
            endforeach;
            $social_model->value = Json::encode($updated);
            $social_model->save();
            return $request;
        endif;



        $model = new SettingsForm();
        $subscriber_model = Subscriber::find()->all();
        $user_model = User::find()->all();

        if(Yii::$app->request->post()){
            $model->settings=Yii::$app->request->post()['SettingsForm'];


            if($model->validate()){
                $model->save();
                Notifier::notify([
                    'title'=>'Успешно',
                    'message'=>'Все настройки успешно сохранены',
                    'level'=>'success'
                ]);
                return $this->render('index',[
                    'model'=>$model,
                    'subscriber_model' => $subscriber_model,
                    'user_model' => $user_model,
                ]);
            };
        }else{
            foreach($model->safeAttributes() as $value){

                $setting = Setting::find()->where(['=','key',$value])->all();
                if(sizeof($setting)>1){
                    $model->$value = ArrayHelper::getColumn($setting,'value');
                    continue;
                }
                $model->$value = $setting[0]->value;

            }
        }

        return $this->render('index',[
            'model'=>$model,
            'subscriber_model' => $subscriber_model,
            'user_model' => $user_model,
        ]);
    }

    public function actionSocial()
    {
        $request = Yii::$app->getRequest()->post();
        return $request;
    }
}
