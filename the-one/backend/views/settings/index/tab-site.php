<?php
use yii\helpers\Url;
?>
<div role="tabpanel" class="tab-pane  clearfix" id="site">
    <div class="panel panel-default">
        <div class="panel-heading">Ссылки на социальные сети</div>
        <div class="panel-body">
            <div id="multipleSocials">
                <?= $form->field($model,'socials')->hiddenInput([
                    'data'=>[
                        'bind'=>'value:socialsJson'
                    ]
                ]); ?>
                <ul data-bind="foreach:socialModels">

                    <li class="socialElement">
                        <div class="col-md-1 remove_social"><form id="social_form" action="<?= Url::toRoute(['settings/social']); ?>" method="get"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></form></div>
                        <div class="socialDropdown col-md-2 ">
                            <div data-bind="event:{click:$data.releaseDropdown},html:buttonText" class="btn btn-primary socialTrigger">Выберите социальную сеть</div>
                            <ul class="dropdown" data-bind="foreach:allSocials,visible:opened">
                                <li data-bind="event:{click:$parent.clickOption}">
                                    <span data-bind="attr:{class:'fa '+$data.class}"></span>
                                    <span data-bind="text:$data.name"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9">
                            <input type="text" data-bind="value:url" class="form-control ">
                        </div>
                    </li>
                </ul>
                <button data-bind="event:{click:addSocialModel}" class="btn btn-default">Добавить ссылку на социальную сеть</button>
            </div>
            <script>
                window.addEventListener('DOMContentLoaded',function(){
                    ko.applyBindings(new multipleSocials(<?=\yii\helpers\Json::encode(Yii::$app->params['socials']) ?>,<?=$model->socials?>),document.getElementById('multipleSocials'));
                })
            </script>
        </div>
    </div>
    <div class="panel panel-default col-md-6 clearfix">
        <div class="panel-body">
            <?= $form->field($model,'soc_inst')->label('Ссылка на профайл instagram ( используется для виджета)'); ?>
        </div>
    </div>
    <div class="panel panel-default col-md-6 clearfix">
        <div class="panel-body">
            <?php if($model->menu_banner_image){
                $widgetOptions['name'] = '111';
                $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                    \common\helpers\OneHelper::getImgUrl($model->menu_banner_image)
                    ,['class'=>'file-preview-image']);
            } ?>
            <?= $form->field($model, 'menu_banner_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions)->label('Баннер в выпадающем меню "Свадебный журнал THE-ONE" ') ?>
            <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
            <?=$form->field($model,'menu_banner_url')->label('Ссылка на баннере') ?>
        </div>
    </div>
</div>