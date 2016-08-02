<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use common\models\Term;
use dosamigos\ckeditor\CKEditorInline;
use dosamigos\fileupload\FileUploadUI;
use reclamare\file\FileInput;


/* @var $this yii\web\View */
/* @var $model backend\models\ArticleForm */
/* @var $categoriesList */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="article-form">
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'add-article']]); ?>
                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
                </div>
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                                              data-toggle="tab">Основное</a></li>
                    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Категории
                            и атрибуты</a></li>
                    <li role="presentation"><a href="#recomended" aria-controls="recomended" role="tab"
                                               data-toggle="tab">Рекомендуемые статьи</a></li>
                </ul>
                <div class="tab-content">
                    <?=$this->render('_form/tab-main',[
                        'model'=>$model,
                        'form'=>$form
                    ]) ?>
                    <?=$this->render('_form/tab-categories',[
                        'model'=>$model,
                        'form'=>$form,
                        'category'=>$category
                    ]) ?>
                    <?=$this->render('_form/tab-related',[
                        'model'=>$model,
                        'form'=>$form,
                    ]) ?>

                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
<script>

    window.onload = function () {

        $('#article-title').change(function () {
            $.get('/article/get-slug/' + $(this).val(), function (a) {
                $('#article-slug').val(a);
            })
        })
    }

</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
//        $(document).ready(function(){
////            var frame = $('iframe.cke_wysiwyg_frame');
////            var res = frame.contents().find("#cke_1_contents");
////            console.log(res);
//
////    alert('cfedf');
//
//                var frame = $('iframe').contents();
//                var content = frame.find("#cke_1_contents");
//                console.log(frame.find('body').html());
//
//
//        });

</script>