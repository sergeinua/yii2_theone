<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Team */
/* @var $form yii\widgets\ActiveForm */
?>
<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'banner']]); ?>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<div class="team-form">
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
        <?php if($model->photo){
            $widgetOptions['pluginOptions']['initialPreview'] = Html::img(
                \common\helpers\OneHelper::getImgUrl($model->photo)
                ,['class'=>'file-preview-image']);
        } ?>
        <?= $form->field($model, 'photo')->widget(\reclamare\file\FileInput::className(),$widgetOptions)->label('Фото') ?>

    </div>

    <div class="col-md-6">

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'profession')->textInput(['maxlength' => true]) ?>

    </div>

    <div class="col-md-12">

    <?= $form->field($model, 'top_quote')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'main_quote')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full-featured',
        'clientOptions' => [
            'filebrowserUploadUrl' => 'site/url'
        ]
    ]); ?>
    <?= $form->field($model, 'soc_tw')->textInput() ?>

    <?= $form->field($model, 'soc_fb')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soc_vk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'soc_in')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    </div>



    </div>

</div>
<?php ActiveForm::end(); ?>
