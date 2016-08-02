<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="content container-content">
    <div id="registration-page" class="registration-block">
        <div class="registration-wrapper">
            <?php  $form = ActiveForm::begin([
                'id' => 'home-registration-form',
                'options' => [
                    'class' => 'border-form registration-form',
                ],
                'action'=>\yii\helpers\Url::to(['/api/auth/validate-sign-up']),
                'enableAjaxValidation'=>true,
                'validateOnSubmit'=>true,
                'validateOnChange'=>true,
                'validateOnBlur'=>false,
                'validationUrl'=>\yii\helpers\Url::to(['/api/auth/validate-sign-up']),
            ]);?>
                <div class="subscribe">
                    <h2 class="nc">Зарегистрируйся</h2>
                    <div class="subscribe-text nc">чтобы получить доступ ко всем возможностям сайта</div>
                </div>
                <div class="divider"></div>
                <?=$form->field($model,'email',[
                    'template'=>'{input}{error}',
                    'options'=>['class'=>'input-block border email'],

                ])->input('email',[
                    'class'=>'form-input',
                    'placeholder'=>'E-mail'
                ]) ?>
                <?=$form->field($model,'password',[
                    'template'=>'{input}{error}',
                    'enableAjaxValidation'=>false,
                    'options'=>[
                        'class'=>'input-block border password '
                    ]])->input('password',[
                    'class'=>'form-input',
                    'placeholder'=>'Пароль'
                ]) ?>




                <?=$form->field($model,'passwordRepeat',[
                    'template'=>'{input}{error}',
                    'enableAjaxValidation'=>false,
                    'options'=>[
                        'class'=>'input-block border password ',
                        'placeholder'=>'Повторите пароль'
                    ]])->input('password', ['class'=>'form-input',
                    'placeholder'=>'Повтор пароля'
                ]) ?>


                <div class="btn-wrapper">
                    <button  role="button" title="Button" id="form-registrate" class="btn">Зарегистрироваться</button>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
