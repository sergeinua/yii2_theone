<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Sign In';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
<style>
    html{
        background-color: #f291c2;
        background-image:url('../images/the-one_pattern.png');
    }
    body{
        background:transparent!important;
    }
     #logo {
        fill: white;
    }
</style>
<div class="login-box">
    <div class="login-logo">
        <a href="#"><svg id="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 115.02 38.37">
                <title></title>
                <path d="M19.34,38.37A19.28,19.28,0,0,1,0,19.19a19.34,19.34,0,0,1,38.67,0A19.28,19.28,0,0,1,19.34,38.37Zm0-35a15.87,15.87,0,1,0,16,15.87A15.87,15.87,0,0,0,19.34,3.32Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M95.68,38.37A19.6,19.6,0,0,1,82,33a18.37,18.37,0,0,1-5.66-13.4A19.62,19.62,0,0,1,82,5.84a19.25,19.25,0,0,1,27.22-.4l0.13,0.13a19.62,19.62,0,0,1,5.66,14,1.47,1.47,0,0,1-1.34,1.59H79.51C80.33,29,87.28,35,95.68,35c8.67,0,12.46-3.83,15.48-9.59A1.66,1.66,0,0,1,114.1,27C111.15,32.63,106.65,38.37,95.68,38.37ZM79.5,18.19h32c-0.77-8.44-7.25-14.87-15.83-14.87C87.54,3.32,80.35,10.11,79.5,18.19Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M27.07,25.63a3.38,3.38,0,0,1-3.43-3.33s0,0,0-.07a3.49,3.49,0,0,1,3.43-3.54,3.45,3.45,0,0,1,3.43,3.47v0.07a0.43,0.43,0,0,1-.43.43H24.54a2.53,2.53,0,0,0,2.54,2.11,2.56,2.56,0,0,0,2.28-1.4,0.43,0.43,0,0,1,.76.39A3.42,3.42,0,0,1,27.07,25.63ZM24.53,21.8H29.6a2.54,2.54,0,0,0-2.54-2.25,2.65,2.65,0,0,0-2.52,2.26h0Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M71.6,38.27a1.63,1.63,0,0,1-1.28-.62L45.5,6.51v30.1a1.51,1.51,0,1,1-3,0V1.76A1.52,1.52,0,0,1,43.44.2,1.23,1.23,0,0,1,45,.73L70.5,33.87V1.76c0-.92.08-1.66,1-1.66a2,2,0,0,1,2,1.66V36.61a1.77,1.77,0,0,1-1.23,1.57A2.42,2.42,0,0,1,71.6,38.27Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M12.95,25.62a2.46,2.46,0,0,1-2.45-2.47V13.79a0.51,0.51,0,0,1,1,0v9.33a1.56,1.56,0,0,0,1.45,1.67H13a1.61,1.61,0,0,0,1.6-1.62v0A0.39,0.39,0,0,1,15,22.71h0a0.42,0.42,0,0,1,.42.41A2.49,2.49,0,0,1,12.95,25.62Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M14.36,20.19H8.55a0.51,0.51,0,0,1,0-1h5.81a0.59,0.59,0,0,1,.1.78A0.43,0.43,0,0,0,14.36,20.19Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M22,25.75a0.5,0.5,0,0,1-.5-0.41V21.19A1.59,1.59,0,0,0,20,19.53H19.93a5.75,5.75,0,0,0-3.61,1.54,0.39,0.39,0,0,1-.55,0l0,0a0.41,0.41,0,0,1,0-.58h0A6.71,6.71,0,0,1,20,18.7a2.5,2.5,0,0,1,2.49,2.49v4.15A0.5,0.5,0,0,1,22,25.75Z" transform="translate(0 0)"></path>
                <path d="M17,25.62a0.46,0.46,0,0,1-.5-0.41V8a0.51,0.51,0,0,1,1,0V25.2a0.46,0.46,0,0,1-.5.42h0Z" transform="translate(0 0)" class="cls-1"></path>
            </svg></a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg"></p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

        <?= $form
            ->field($model, 'email', $fieldOptions1)
            ->label('Введите email')
            ->textInput(['placeholder' => $model->getAttributeLabel('email')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label('Введите пароль')
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить') ?>
            </div>
            <!-- /.col -->
            <div class="col-xs-4">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
            <!-- /.col -->
        </div>


        <?php ActiveForm::end(); ?>

    </div>
    <!-- /.login-box-body -->
</div><!-- /.login-box -->