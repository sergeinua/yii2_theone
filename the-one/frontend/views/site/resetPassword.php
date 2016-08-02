<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>

<?php $form = ActiveForm::begin(['id' => 'user-restore-password','class'=>'restore-password']); ?>
    <div class="subscribe">
        <h2>Форма для восстановления пароля</h2>
    </div>
    <div class="input-block password">
        <label for="password-email">Введите новый пароль</label>
        <?= $form->field($model, 'password')->passwordInput(['class'=>'form-input'])->label(false) ?>
    </div>
    <div class="input-block password">
        <label for="password-email">Подтвердите пароль</label>
        <?= $form->field($model, 'passwordRepeat')->passwordInput(['class'=>'form-input'])->label(false) ?>
    </div>
    <div class="btn-wrapper">
        <?= Html::submitButton('Подтвердить', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end(); ?>