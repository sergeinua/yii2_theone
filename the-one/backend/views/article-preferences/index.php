<?php
/**
 * @var $category \common\models\ArticleCategory
 * @var $categories array
 */
use yii\helpers\Url;
?>

<?= \yii\helpers\Html::beginForm('/admin/article-preferences/update','post'); ?>


<div class="col-md-6">
    <label for="">Показывать цвет в категориях:</label>
         <?php foreach ($categories as $category):?>
             <div class="form-control">
            <?=\yii\bootstrap\Html::checkbox('category_colors[]',$checked = $category->hasColor,['value'=>$category->slug]) ?>
            <?=$category->name ?>
             </div>
        <?php endforeach; ?>
</div>


<div class="col-md-6">
    <label for="">Показывать фильтр в категориях:</label>
    <?php foreach ($categories as $category):?>
        <div class="form-control">
            <?=\yii\bootstrap\Html::checkbox('category_filter[]',$checked = $category->hasFilter,['value'=>$category->slug]) ?>
            <?=$category->name ?>
        </div>
    <?php endforeach; ?>
</div>


<?=\yii\helpers\Html::submitButton('Сохранить') ?>
<?= \yii\helpers\Html::endForm() ?>

