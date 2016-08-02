<?php
use yii\bootstrap\Html;
use \yii\jui\DatePicker;
?>
<div role="tabpanel" class="tab-pane active" id="home">
    <div class="col-md-12">
        <?php $widgetOptions = [
            'options' => ['accept' => 'image/*'],
            'id' => 'file-test',
            'name' => 'FileTest',
            'pluginOptions' => [
                'showCaption' => false,
                'showRemove' => false,
                'showUpload' => false,
                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i>',
                'browseLabel' => Yii::t('app', 'Select image'),
                'browseClass' => '',
                'allowedFileExtensions' => ['jpg', 'png', 'gif'],
                'singleDragNDrop' => true,
            ]
        ] ?>
        <?php if ($model->poster->thumbnail) {
            $widgetOptions['pluginOptions']['initialPreview'] = Html::img(
                \common\helpers\OneHelper::getImgUrl($model->poster->thumbnail)
                , ['class' => 'file-preview-image']);
        } ?>

        <?= $form->field($model->poster, 'thumbnail')->widget(\reclamare\file\FileInput::className(), $widgetOptions) ?>

        <?= $form->field($model->poster, 'price')->label('Стоимость'); ?>

        <?= $form->field($model->poster,'location')->label('Место проведения'); ?>

        <div class="col-md-6">
            <?= $form->field($model->poster, 'date_start')->widget(DatePicker::className(),['language' => 'ru', 'dateFormat' => 'yyyy-MM-dd']); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model->poster, 'date_end')->widget(DatePicker::className(),['language' => 'ru', 'dateFormat' => 'yyyy-MM-dd']); ?>
        </div>

    </div>
    <!--div class="col-md-7">
        <?=$form->field($model->poster,'video_frame')->textarea(['rows'=>8
        ])->label('Код vimeo или youtube. (Будет отображаться вместо обложки на странице списка статей а так же на главной)') ?>
    </div-->
    <div class="col-md-12">

        <?= $form->field($model->poster, 'title')->textInput([
            'maxlength' => true,
            'id' => 'article-title'
        ]) ?>

        <?= $form->field($model->poster, 'slug')->textInput(['maxlength' => true, 'id' => 'article-slug']) ?>

        <?= $form->field($model->poster, 'shortdesc')->textarea([
            'maxlength' => true,
        ])->label('Краткое описание') ?>

    </div>
    <div class="col-md-12">
        <p>Доступные шорткоды:[Gallery][Carousel]</p>
        <?= $form->field($model->poster, 'content')->widget(\dosamigos\ckeditor\CKEditor::className(), [
            'options' => ['rows' => 6],
            'preset' => 'full',

            'clientOptions' => [
//                'extraPlugins'=>'youtube',
//                'filebrowserUploadUrl' => '/img/upload'
                'filebrowserUploadUrl' => \yii\helpers\Url::toRoute(['img/upload']),
                'pasteFilter' => 'plain-text',
                'forcePasteAsPlainText' => true,
            ]
        ]); ?>
        <?= $form
            ->field($model->poster, 'meta_title')
            ->textInput(['maxlength' => true]) ?>

        <?= $form
            ->field($model->poster, 'meta_description')
            ->textInput(['maxlength' => true]) ?>

        <?= $form
            ->field($model->poster, 'meta_keyword')
            ->textarea(['rows' => 3]) ?>
    </div>
</div>

<script>
    var slug = document.getElementById('article-slug');
    slug.addEventListener('keyup',function(){
        slug.value = slug.value
            .toLowerCase()
            .replace(/ /g,'-')
            .replace(/[^\w-]+/g,'')
    })
</script>