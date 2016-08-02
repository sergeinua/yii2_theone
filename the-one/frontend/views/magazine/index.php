<?php
use yii\helpers\Url;
use common\helpers\OneHelper;
?>
<?php //sorting models
$models = array_reverse($models); ?>

<div class="content container-content">
    <h1 class="magazine-heading"> Купить журнал</h1>
    <div class="magazine-articles-wrapper">

    <?php foreach ($models as $model) : ?>

        <div class="magazine-articles-block">
            <div class="magazine-img-wrapper">
                <div class="item-magazine">
                    <a href="#">
                        <img src="<?= OneHelper::getImgUrl($model->cover, 'articleThumb'); ?>">
                        <div class="btn-holder">
                            <div class="price h1"><?= $model->price; ?></div>
                            <span> &#8372;</span><a href="<?= $model->journals_ua; ?>" role="button" class="fa-shopping-cart btn-dark">Купить</a>
                        </div>
                    </a>
                </div>
            </div>
            <div class="magazine-articles-text">
                <a href="<?= Url::to(['magazine/' . $model->id]); ?>">
                    <h2 class="magazine-heading"><?= $model->name; ?></h2>
                </a>
                <div class="short-description"><span class="short-description-title">Содержание номера</span>
                    <p><?= $model->content; ?></p>
                </div>
            </div>
            <div class="btn-wrapper">
                <a href="<?= Url::to(['magazine/' . $model->id]); ?>" role="button" title="Button"
                   class="btn fa-long-arrow-right" target="_blank">Подробнее</a>
            </div>
        </div>
        <div class="pagination-block">
            <?= \yii\widgets\LinkPager::widget([
                'pagination' => $pages,
                'nextPageLabel' => '<i class="fa fa-arrow-right"></i>',
                'prevPageLabel' => '<i class="fa fa-arrow-left"></i>']); ?>
        </div>

    <?php endforeach; ?>

    </div>
</div>