<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\helpers\OneHelper;
use frontend\components\OneView;
use \yii\widgets\LinkPager;

/* @var $this yii\web\View */
/* @var $model common\models\Poster
 */
?>

<div class="container-content posters-block">
    <h1 class="magazine-heading">Афиши</h1>
    <ul role="menu" class="breadcrumb">
        <li role="menuitem"><a href="javascript:void(0)" role="link">События</a></li>
        <li><span>Афиши</span></li>
    </ul>
    <div class="posters-wrapper">
        <div class="posters-left-block">
            <div class="poster-itm-wrap">

                <?php foreach($models as $model) : ?>

                    <?php foreach($model as $item) : ?>

                        <div class="poster">
                            <a href="/poster/<?= $item->slug; ?>">
                                <div class="img-holder"><img src="<?= OneView::getImgUrl($item->thumbnail, 'krakenSized'); ?>" alt=""></div>
                                <div class="text-holder">
                                    <div class="title-block">
                                        <div class="date"><?= date('d.m', $item->date_start); ?> - <?= date('d.m', $item->date_end); ?></div>
                                        <div class="title"><?= $item->title; ?></div>
                                    </div>
                                    <div class="btn-controls-holder">
                                        <div class="btn-wrapp">

                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>

                <?php endforeach; ?>

            </div>
            <div class="pagination-block">
                <?= LinkPager::widget([
                    'pagination' => $pages,
                    'nextPageLabel' => '<i class="fa fa-arrow-right"></i>',
                    'prevPageLabel' => '<i class="fa fa-arrow-left"></i>']); ?>
            </div>
        </div>
        <div class="posters-right-block">

            <?php foreach($banners as $banner) : ?>

                <a href="<?= $banner->url; ?>" role="link" class="banner">
                    <img src="<?= $this->getImgUrl($banner->banner); ?>" alt="banner">
                </a>

            <?php endforeach; ?>

        </div>
    </div>
</div>