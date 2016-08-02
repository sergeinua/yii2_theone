<?php
    Yii::$app->view->registerJs("var isLogged = ".(Yii::$app->user->isGuest?'false':'true'),\yii\web\View::POS_HEAD);
     ?>
<!--TODO:Разобраться с алертом-->
<div id="alerts-component">
    <div id="alerts-container" data-bind="foreach: $root.messagesArray">
        <div class="ko-alert alert" role="alert" data-bind="attr: {'data-alertid':id }, class: alertClass, visible: visible, event: { mouseover: stopTicker, mouseout: startTicker }">
            <span data-bind="html: message"></span>
            <button type="button" class="close" data-bind="click: dismiss" aria-label="Close"></button>
        </div>
    </div>
</div>