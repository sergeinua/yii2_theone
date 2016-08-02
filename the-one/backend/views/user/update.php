<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Профиль пользователя ' . '" ' . $model->user->fullName .'":';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->user->id, 'url' => ['view', 'id' => $model->user->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'professionalGroups'=>$professionalGroups
    ]) ?>

</div>
