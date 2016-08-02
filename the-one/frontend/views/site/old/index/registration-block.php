<?php
    use yii\widgets\ActiveForm;
    use \yii\helpers\Html;
?>
<div id="home-registration-block" class="registration-block">

<?php if(!Yii::$app->user->isGuest){  ?>
    <div class="user-login" style="display:block;">
        <h2>Здравствуйте, <br> <?= Yii::$app->user->identity->fullName ? Yii::$app->user->identity->fullName : ' пользователь' ?>!</h2>
        <div class="subscribe-text">рады Вас видеть на нашем сайте</div>
    </div>
<?php }else{ ?>
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
            <h2>Зарегистрируйся</h2>
            <div class="subscribe-text">чтобы получить доступ ко всем возможностям содержаниеа</div>
        </div>
        <div class="divider"></div>

    <?=$form->field($signUp,'email',[
        'template'=>'{input}{error}',
        'options'=>['class'=>'input-block border email'],

    ])->input('email',[
        'class'=>'form-input',
        'placeholder'=>'E-mail'
    ]) ?>
    <?=$form->field($signUp,'password',[
        'template'=>'{input}{error}',
        'enableAjaxValidation'=>false,
        'options'=>[
            'class'=>'input-block border password '
        ]])->input('password',[
            'class'=>'form-input',
            'placeholder'=>'Пароль'
    ]) ?>

    <?=$form->field($signUp,'passwordRepeat',[
        'template'=>'{input}{error}',
        'enableAjaxValidation'=>false,
        'options'=>[
            'class'=>'input-block border password ',
        ]])->input('password', ['class'=>'form-input',
            'placeholder'=>'Повтор пароля'
        ]) ?>
        <div class="btn-wrapper">
            <button href="javascript:(0)" role="button" title="Button" id="registasdasdrate" class="btn">Зарегистрироваться</button></div>
    <?php ActiveForm::end(); ?>

<?php } ?>
    </div>
