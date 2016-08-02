<?php
namespace frontend\controllers\api;
use common\models\LoginForm;
use common\models\Setting;
use frontend\components\OneNotify;
use frontend\models\SignupForm;
use yii\bootstrap\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Url;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\web\UrlManager;
use Yii;

class AuthController extends \yii\web\Controller{

    public function actionValidateSignUp(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model= new SignupForm();
        \Yii::$app->session->open();
        $model->load(\Yii::$app->request->post());
        if(\Yii::$app->request->isAjax){
            return ActiveForm::validate($model);
        }
        if($model->validate()&&$model->signup()){
            OneNotify::prepareNotify('success','Вы успешно зарегистрированы.Проверьте вашу почту для подтверждения аккаунта.');
            return $this->redirect(['site/index']);
        }else{
            OneNotify::prepareNotify('error','Произошла ошибка при попытке регистрации');
            return $this->redirect(['site/signup']);
        }
    }

    public function actionValidateLogin(){
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $model= new LoginForm();
        $model->load(\Yii::$app->request->post());

        if(\Yii::$app->request->isAjax){
            return ActiveForm::validate($model);
        }
        if($model->validate()&&$model->login()) {
//            dump(Yii::$app->user);die;
            OneNotify::prepareNotify('information', 'Вход выполнен успешно!');
            return $this->goBack();
        }else{
            OneNotify::prepareNotify('error','Неверное имя пользователя или пароль');
            return Yii::$app->getResponse()->redirect($_SERVER['HTTP_REFERER']);

        }

//        TODO:ЭЭ сющщи,пачиму не работаешь,а?!

    }

    public function actionSubmit($authKey,$userId){

        $user = \common\models\User::findOne(['=','auth_key',$userId]);
        /**
         * @var $user   \common\models\User
         */
        if($user->validateAuthKey($authKey)){
            $user->activate();
            $user->save();
            \Yii::$app->user->login($user);
            OneNotify::prepareNotify('information','Ваш аккаунт активирован! Добро пожаловать на сайт!');
            return $this->redirect('/profile/index');
        }else{
            throw new BadRequestHttpException();
        }
    }
}