<?php
use yii\helpers\Html;
?>
<div role="tabpanel" class="tab-pane  clearfix" id="subscriber">
    <div class="panel panel-default">
        <div class="panel-heading">Ссылки на социальные сети</div>
        <div class="panel-body">

            <?= Html::a('Экспорт подписчиков в excell', ['subscriber/export', 'group_id' => Yii::$app->request->get('id')], ['class'=>'btn btn-primary']) ?>

            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active" ><a href="#subscriber-subscriber" aria-controls="contacts" role="tab" data-toggle="tab">Подписчики</a></li>
                <li role="presentation" ><a href="#subscriber-existing" aria-controls="profile" role="tab" data-toggle="tab">Зарегистрированные пользователи</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content"><br>

                <?=$this->render('tab-subscriber-subscriber',[
                    'form'=>$form,
                    'model'=>$model,
                    'widgetOptions'=>$widgetOptions,
                    'subscriber_model' => $subscriber_model
                ]); ?>

                <?=$this->render('tab-subscriber-existing',[
                    'form'=>$form,
                    'model'=>$model,
                    'widgetOptions'=>$widgetOptions,
                    'user_model' => $user_model
                ]); ?>

            </div>
        </div>
</div>