<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Team */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Teams', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>

</style>
<div class="team-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>


    <div id="multipleSocials">
        <ul data-bind="foreach:socialModels">
            <li class="socialElement">
                <div class="socialDropdown col-md-3 ">
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
            //ko.applyBindings(new SocialsModel(<?=\yii\helpers\Json::encode(Yii::$app->params['socials']) ?>)),document.getElementById('socials');
            ko.applyBindings(new multipleSocials(<?=\yii\helpers\Json::encode(Yii::$app->params['socials']) ?>)),document.getElementById('multipleSocials');
        })
    </script>

<!--    <div id="socials">-->
<!--        <div class="socialDropdown">-->
<!--            <div data-bind="event:{click:releaseDropdown},html:buttonText" class="btn btn-primary">Выберите социальную сеть</div>-->
<!--            <ul class="dropdown" data-bind="foreach:allSocials,visible:$root.opened">-->
<!--                <li data-bind="event:{click:$parent.clickOption}">-->
<!--                    <span data-bind="attr:{class:'fa '+$data.class}"></span>-->
<!--                    <span data-bind="text:$data.name"></span>-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--        <input type="text" data-bind="value:url" class="form-control">-->
<!---->
<!--    </div>-->

</div>
