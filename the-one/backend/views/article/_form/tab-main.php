<?php
use yii\bootstrap\Html;
use common\models\Article;
?>
<div role="tabpanel" class="tab-pane active" id="home">
    <div class="col-md-5">
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
        <?php if ($model->article->thumbnail) {
            $widgetOptions['pluginOptions']['initialPreview'] = Html::img(
                \common\helpers\OneHelper::getImgUrl($model->article->thumbnail)
                , ['class' => 'file-preview-image']);
        } ?>

        <?= $form->field($model->article, 'thumbnail')->widget(\reclamare\file\FileInput::className(), $widgetOptions) ?>

        <?= $form->field($model->article, 'status')->dropDownList([
            Article::STATUS_PUBLISHED => 'Опубликовано',
            Article::STATUS_UNPUBLISHED => 'Черновик',
        ]); ?>

    </div>
    <div class="col-md-7">
        <?=$form->field($model->article,'video_frame')->textarea(['rows'=>8
        ])->label('Код vimeo или youtube. (Будет отображаться вместо обложки на странице списка статей а так же на главной)') ?>
    </div>
    <div class="col-md-12">

        <?=$form->field($model->article,'category')
            ->dropDownList(\yii\helpers\ArrayHelper::map(common\models\ArticleCategory::find()->all(),'id','name'),
                ['prompt'=>'Выберите..'])->label('Категория')
        ?>

        <?= $form->field($model->article, 'title')->textInput([
            'maxlength' => true,
            'id' => 'article-title'
        ]) ?>

        <?= $form->field($model->article, 'slug')->textInput(['maxlength' => true, 'id' => 'article-slug']) ?>

        <?= $form->field($model->article, 'shortdesc')->textarea([
            'maxlength' => true,
        ])->label('Краткое описание') ?>

    </div>
    <div class="col-md-12">
        <p>Доступные шорткоды:[Gallery][Carousel]</p>
        <?= $form->field($model->article, 'content')->widget(\dosamigos\ckeditor\CKEditor::className(), [
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
            ->field($model->article, 'meta_title')
            ->textInput(['maxlength' => true]) ?>

        <?= $form
            ->field($model->article, 'meta_description')
            ->textInput(['maxlength' => true]) ?>

        <?= $form
            ->field($model->article, 'meta_keyword')
            ->textarea(['rows' => 3]) ?>
        <?= $form->field($model->tag, 'text')->textInput(['maxlength' => true])->label('Теги'); ?>
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