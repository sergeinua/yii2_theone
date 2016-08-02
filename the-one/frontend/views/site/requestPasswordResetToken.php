<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Восстановление пароля';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-content">
    <div class="restore-password" id="user-restore-password">
        <div class="subscribe">
            <h2>Не можете войти в личный кабинет?</h2>
        </div>
        <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>


        <div class="input-block email">
            <label for="password-email">Введите свой email,чтобы получить ссылку на восстановление пароля</label>
            <?= $form->field($model, 'email')->textInput(['class' => 'form-input'])->label(false) ?>
        </div>
        <div class="btn-wrapper">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
