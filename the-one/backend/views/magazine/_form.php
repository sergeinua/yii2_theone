<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Magazine */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'add-magazine']]); ?>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<div class="magazine-form">
    <div class="row">

    <div class="col-md-6">
        <?php $widgetOptions = [
            'options' => ['accept' => 'image/*'],
            'id' => 'file-test',
            'name' => 'FileTest',
            'pluginOptions' => [
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i>',
                'browseLabel' =>  Yii::t('app','Выберите или перетащите изображение'),
                'browseClass' => '',
                'allowedFileExtensions' => ['jpg', 'png','gif'],
                'singleDragNDrop' => true,
            ]
        ] ?>
        <?php if($model->cover){
            $widgetOptions['pluginOptions']['initialPreview'] = Html::img(
                \common\helpers\OneHelper::getImgUrl($model->cover)
                ,['class'=>'file-preview-image']);
        } ?>
        <?= $form->field($model, 'cover')->widget(\reclamare\file\FileInput::className(),$widgetOptions)->label('Обложка') ?>
    </div>
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'shortdesc')->textInput(['maxlength' => true]) ?>
        </div>

    <div class="col-md-12">
    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'announcement')->textarea(['rows' => 6]) ?>


        <label for="">Код сайта ISSU</label>
        <p>Код можно получить на сайте ISSU</p>
    <?= $form->field($model, 'issuu')->textarea(['rows' => 6])->label(false) ?>

    <?= $form->field($model, 'journals_ua')->textInput(['maxlength' => true]) ?>



    </div>
    </div>

</div>
<?php ActiveForm::end(); ?>
