<?php

?>

<div class="article-search">
    <div class="article-search">

        <?php $form = \yii\widgets\ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
            'id'=>'articleFilter'
        ]); ?>

        <?= $form->field($searchModel, 'id') ?>

        <?= $form->field($searchModel, 'title') ?>

        <?= $form->field($searchModel, 'slug') ?>

        <?= $form->field($searchModel, 'thumbnail') ?>

        <?= $form->field($searchModel, 'content') ?>

        <?php // echo $form->field($model, 'created') ?>

        <?php // echo $form->field($model, 'type') ?>

        <?php // echo $form->field($model, 'meta_title') ?>

        <?php // echo $form->field($model, 'meta_description') ?>

        <?php // echo $form->field($model, 'meta_keyword') ?>

        <div class="form-group">
            <?= \yii\helpers\Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
            <?= \yii\bootstrap\Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
        </div>

        <?php \yii\widgets\ActiveForm::end(); ?>

    </div>

</div>
