<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    /*TODO:To external*/
    body {
        background: #eee;
    }

    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #FFFFFF;
    }

    .blog-comment::before,
    .blog-comment::after,
    .blog-comment-form::before,
    .blog-comment-form::after {
        content: "";
        display: table;
        clear: both;
    }

    .blog-comment {

    }

    .blog-comment ul {
        list-style-type: none;
        padding: 0;
    }

    .blog-comment img {
        opacity: 1;
        filter: Alpha(opacity=100);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
    }

    .blog-comment img.avatar {
        position: relative;
        float: left;
        margin-left: 0;
        margin-top: 0;
        width: 65px;
        height: 65px;
    }

    .blog-comment .post-comments {
        border: 1px solid #eee;
        margin-bottom: 20px;
        margin-left: 85px;
        margin-right: 0px;
        padding: 10px 20px;
        position: relative;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        background: #fff;
        color: #6b6e80;
        position: relative;
    }

    .blog-comment .meta {
        font-size: 13px;
        color: #aaaaaa;
        padding-bottom: 8px;
        margin-bottom: 10px !important;
        border-bottom: 1px solid #eee;
    }

    .blog-comment ul.comments ul {
        list-style-type: none;
        padding: 0;
        margin-left: 85px;
    }

    .blog-comment-form {
        padding-left: 15%;
        padding-right: 15%;
        padding-top: 40px;
    }

    .blog-comment h3,
    .blog-comment-form h3 {
        margin-bottom: 40px;
        font-size: 26px;
        line-height: 30px;
        font-weight: 800;
    }


    /** TODO:Move to .css*/
    #kn-telephones li {
        height: 48px;
        margin-top: 5px;
        clear: both;
        line-height: 48px;
    }

    .minus-button {
        cursor: pointer;
        font-size: 20px;
        padding: 2px;
        line-height: 16px;
    }

    .span-desc {
        color: #aaa;
        font-size: 13px;
    }

    #prof-map{
        height:500px;
    }
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data', 'id' => 'add-user']]); ?>
<div class="form-group">
    <?= Html::submitButton($model->user->isNewRecord ? 'Create' : 'Update', ['class' => $model->user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<div class="user-form">
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"
                                                  aria-expanded="true">Основная информация</a></li>
        <li role="presentation" class=""><a href="#prefs" id="initmap" aria-controls="profile" role="tab"
                                            data-toggle="tab" aria-expanded="false">Дополнительная информация</a></li>
        <li role="presentation" class=""><a href="#rating" id="initmap" aria-controls="profile" role="tab"
                                            data-toggle="tab" aria-expanded="false">Накрутка</a></li>
        <li role="presentation" class=""><a href="#statistics" id="initmap" aria-controls="profile" role="tab"
                                            data-toggle="tab" aria-expanded="false">Статистика</a></li>

    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">

            <div class="row">
                <div class="col-md-12">

                </div>
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
                    <?php if ($model->user->avatar) {
                        $widgetOptions['pluginOptions']['initialPreview'] = Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->user->avatar)

                            , ['class' => 'file-preview-image']);
                    } ?>

                    <?= $form->field($model->user, 'avatar')->widget(\reclamare\file\FileInput::className(), $widgetOptions)->label('Аватар') ?>
                </div>
                <div class="col-md-7">

                    <?= $form->field($model->user, 'first_name')->textInput()->label('Имя') ?>

                    <?= $form->field($model->user, 'last_name')->textInput()->label('Фамилия') ?>
                </div>
                <div class="col-md-12">

                    <?= $form->field($model->user, 'email')->textInput()->label('E-mail') ?>

                    <?= $form->field($model->user, 'slug')->textInput()->label('Суффикс') ?>

                </div>
            </div>
        </div>

        <div role="tabpanel" class="tab-pane" id="prefs">
            <?php
            $roles = Yii::$app->authManager->getRoles(); ?>
            <?= $form->field($model->user, 'role')->dropDownList(\yii\helpers\ArrayHelper::map($roles, 'name', 'description'))->label('Роль'); ?>

            <?= $form->field($model->user, 'status')->dropDownList([
                User::STATUS_BANNED=>'Удалён',
                User::STATUS_NEW=>'Новый',
                User::STATUS_ACTIVE=>'Активен',
                User::STATUS_AVAILABLE=>'Доступен',

            ])->label('Статус'); ?>
            <div id="user">
                <div id="professional-info">
                    <h2>Настройки для профессионалов</h2>


                    <h3>Группа </h3>

                    <?= $form->field($model, 'professionalGroupsIDs')->checkboxList(\yii\helpers\ArrayHelper::map($professionalGroups, 'id', 'name'))->label('Профессия') ?>

                    <?= $form->field($model->userProfessionalInfo, 'organisation_name')->label('Название организации'); ?>

                    <div class="input-added-block clearfix" id="kn-telephones">
                        <?= $form->field($model->user, 'phone')->hiddenInput([
                            'data' => [
                                'bind' => 'value:$root.jsonPhones'
                            ]
                        ])->label('Телефон<br/><span style="color:#aaa;font-size:13px">(Вы можете разместить до 3-х телефонов)</span>
') ?>
                        <ul data-bind="foreach:$root.allPhones" style="clear:both;">
                            <li style="clear:both">
                                <b>
                                    <span data-bind="text:$data"></span>
                                </b>

                                <div class="minus-button btn btn-danger" data-bind="click:$root.removePhone">x</div>
                            </li>
                        </ul>
                        <div class="input-block input-buttons col-md-4" data-bind="visible:$root.lessThanThree">
                            <input type="phone" id="phone" class="form-control" data-bind="value:$root.phone,event:{keyup:$root.checkForNumbers}" class="form-input">
                        </div>
                        <div class="input-add-buttons col-md-1" data-bind="visible:$root.lessThanThree">
                            <div class="plus-button btn btn-default" style="display:block;" data-bind="click:$root.addPhone">+</div>
                            <!--                        <div class="minus-button"></div>-->
                        </div>

                    </div>

                    <?= $form->field($model->userProfessionalInfo, 'organisation_info')->textarea(); ?>

                    <?= $form->field($model->userProfessionalInfo, 'lat')->hiddenInput()->label(''); ?>

                    <?= $form->field($model->userProfessionalInfo, 'lng')->hiddenInput()->label(''); ?>
                    <p>Кликните куда-нибудь чтобы поместить маркер</p>
                    <label for="">Местоположение</label>

                    <div class="map-block">
                        <div class="enter-adress-block">
                            <label for="address-input">Введите адрес (или нажмите на место на карту)</label>
                            <input type="text" id="address-input" placeholder="Введите Ваш адрес" name="name-adress"
                                   value ='<?=$model->user->place?$model->user->place->address:'' ?>'
                                   class="form-control">
                            <?=$form->field($model,'placeId')->hiddenInput(['id'=>'coordinates'])->label(false) ?>
                        </div>
                        <div id="prof-map"></div>
                    </div>
                    <script>
                        window.addEventListener('DOMContentLoaded',function(){
                            document.getElementById('initmap').addEventListener('click', function () {
                                initialize();
                            })
                        })



                    </script>


                </div>
            </div>
            <div id="user-info">

            </div>

        </div>

        <div role="tabpanel" class="tab-pane" id="media">

        </div>

        <div role="tabpanel" class="tab-pane" id="rating">
            <?php if (isset($model->userProfessionalInfo)): ?>
                <p>Количество просмотров пользователя
                    :<b><?= $model->userProfessionalInfo->views ? $model->user->userProfessionalInfo->views :0 ?></b>
                </p>
                <?= $form->field($model->userProfessionalInfo, 'views_delta')->label('Дополнительные просмотры'); ?>
                <p>Количество лайков пользователя
                    :<b><?= $model->userProfessionalInfo->likes ? $model->userProfessionalInfo->likes : 0 ?></b>
                </p>
                <?= $form->field($model->userProfessionalInfo, 'likes_delta')->label('Дополнительные лайки'); ?>

                <?= $form->field($model->userProfessionalInfo, 'hidden_order_parameter')->label('Скрытое поле порядка(чем больше это значение,тем выше в списке будет выводиться профессионал)'); ?>

            <?php else: ?>
            <?php endif ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="statistics">
            <div class="row">

                <div class="col-md-9" id="react-admin-comments">

                </div>
                <div class="col-md-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">Добавили в избранные:</div>
                        <div class="panel-body">
                            <?php foreach ($model->user->likers as $liker): ?>
                                <?= Html::a('<span class="label label-primary">' . $liker->fullName . '</span>', \yii\helpers\Url::to('/user/update/?id=' . $liker->id)) ?>
                            <?php endforeach; ?>

                        </div>F
                    </div>


                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
//            ko.applyBindings(new multipleSocials(<?//=\yii\helpers\Json::encode(Yii::$app->params['socials']) ?>//,<?//=$model->user->socials?$model->user->socials:'[]' ?>//),document.getElementById('multipleSocials'));

//            ko.applyBindings(new AvatarModel('<?//=$model->user->avatar?$this->getImgUrl($model->user->avatar):''; ?>//'), document.getElementById("kn-avatar"));

            ko.applyBindings(new TelephonesViewModel(<?=$model->user->phone?$model->user->phone:'[]'?>), document.getElementById("kn-telephones"));
            $('.select2').select2();
        });
    </script>


</div>
<?php ActiveForm::end(); ?>
