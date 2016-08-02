<h1>Настройки</h1>
<?php $form = \yii\bootstrap\ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'add-article']]); ?>
<?php $widgetOptions = [
    'options' => ['accept' => 'image/*'],
    'id' => 'file-test',
    'name' => '22',
    'pluginOptions' => [
        'showCaption' => false,
        'showRemove' => false,
        'showUpload' => false,
        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i>',
        'browseLabel' =>  Yii::t('app','Select image'),
        'browseClass' => '',
        'allowedFileExtensions' => ['jpg', 'png','gif'],
        'singleDragNDrop' => true,
    ]
] ?>
<div>
    <button class="btn btn-error">Сохранить</button>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active" ><a href="#contacts" aria-controls="contacts" role="tab" data-toggle="tab" id="initmap">Страница "Контакты"</a></li>
        <li role="presentation" ><a href="#site" aria-controls="profile" role="tab" data-toggle="tab">Сайт</a></li>
        <li role="presentation" ><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Главная страница</a></li>
        <li role="presentation" ><a href="#about" aria-controls="home" role="tab" data-toggle="tab">Страница "О журнале"</a></li>
        <li role="presentation" ><a href="#subscriber" aria-controls="home" role="tab" data-toggle="tab">Рассылка</a></li>
    </ul>


    <!-- Tab panes -->
    <div class="tab-content"><br>

        <?=$this->render('index/tab-site',[
            'form'=>$form,
            'model'=>$model,
            'widgetOptions'=>$widgetOptions
        ]) ?>

        <?=$this->render('index/tab-home',[
            'form'=>$form,
            'model'=>$model,
            'widgetOptions'=>$widgetOptions
        ]) ?>
        <?=$this->render('index/tab-about',[
            'form'=>$form,
            'model'=>$model,
            'widgetOptions'=>$widgetOptions
        ]) ?>
        <?=$this->render('index/tab-contacts',[
            'form'=>$form,
            'model'=>$model,
            'widgetOptions'=>$widgetOptions
        ]) ?>
        <?= $this->render('index/tab-subscriber',[
            'form'=>$form,
            'model'=>$model,
            'widgetOptions'=>$widgetOptions,
            'subscriber_model' => $subscriber_model,
            'user_model' => $user_model
        ]) ?>

        <div role="tabpanel" class="tab-pane" id="messages">
        </div>
        <div role="tabpanel" class="tab-pane" id="settings">
        </div>
    </div>
</div>
<?php $form->end(); ?>
<script src="https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $('.remove_social').click(function() {
            var form = $('#social_form');
            var social = $(this).parent('.socialElement').find('.socialTrigger').html();
            var item = $(this).parent('.socialElement');
            var data = {};
            data.social = social;
            $.ajax({
                url: form.attr('action'),
                type: 'get',
                dataType: 'text',
                data: $.param(data),
                success: function (response) {
                    item.remove();
                    location.reload();
                }
            });

        });

    })
</script>
