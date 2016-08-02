<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    .file-preview-image {
        width: 100%;
        height: auto!important;
    }
</style>
<div class="banner-form clearfix">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'banner']]); ?>
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
        <?php if($model->banner){
            $widgetOptions['pluginOptions']['initialPreview'] = Html::img(
                \common\helpers\OneHelper::getImgUrl($model->banner)
                ,['class'=>'file-preview-image']);
        } ?>
        <?= $form->field($model, 'banner')->widget(\reclamare\file\FileInput::className(),$widgetOptions)->label('Баннер') ?>

    </div>
    <div class="col-md-6">
        <div class="form-group">
        <?=$form->field($model,'route')->dropDownList([],[
                'data-bind'=>"
                    value:activeRoute,
                    options:routes,
                    optionsText:'name',
                    optionsValue: 'route',
                    optionsCaption: 'Выберите страницу'
                    "
        ]) ?>
            </div>
        <!-- ko if:activeRoute -->

        <div class="form-group" data-bind="with:activeRouteObject" >
            <?=$form->field($model,'position')->dropDownList([],[
                'data-bind'=>"
                    value:\$root.activePosition,
                    options:pos,
                    optionsText:'name',
                    optionsValue:'value'
                    "
            ]) ?>
        </div>
        <!-- /ko -->
        <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <script>

    </script>
</div>
