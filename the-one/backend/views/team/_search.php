<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\TeamSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="team-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'photo') ?>

    <?= $form->field($model, 'profession') ?>

    <?= $form->field($model, 'top_quote') ?>

    <?php // echo $form->field($model, 'main_quote') ?>

    <?php // echo $form->field($model, 'soc_tw') ?>

    <?php // echo $form->field($model, 'soc_fb') ?>

    <?php // echo $form->field($model, 'soc_vk') ?>

    <?php // echo $form->field($model, 'soc_in') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
