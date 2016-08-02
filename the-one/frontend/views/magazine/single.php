<?php
use yii\helpers\Url;
/**
 * @var $magazine \common\models\Magazine
 */
?>
<div id="journalIframe" class="modal fade">
    <div class="modal-body">
        <?=$magazine->issuu ?>
    </div>
    <div data-dismiss="modal" class="close">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16">
            <title></title>
            <polygon fill="#333" points="16 1 15 0 8 7 1 0 0 1.1 7 8 0 15 1 16 8 9 15 16 16 15 9 8 16 1"></polygon>
        </svg>
    </div>
</div>
<div id="magazine-buy" class="content container-content">
    <div class="content-wrapp">
        <h1 class="magazine-heading"><?=$magazine->name?></h1>
        <div class="magazine">
            <div class="img-holder"><img src="<?=$this->getImgUrl($magazine->cover) ?>"></div>
            <div class="text-holder">

                <div class="price"><?=$magazine->price?> &#8372;</div>
                <a href="<?=$magazine->journals_ua ?>" target=_blank role="button" class="buy btn fa-shopping-cart">Купить</a>
                <a href="javascript:void(0)" data-toggle="modal" data-target="#journalIframe" role="button" id="magazine-watch" class="buy btn-light fa-search">Просмотреть журнал</a>
                <div>
                    <?=$magazine->shortdesc ?>
                </div>

            </div>
        </div>
        <div id="description-spoiler" class="description">
            <div class="column-left">
                <div class="title">Содержание номера:</div>
                <?=$magazine->announcement ?>
            </div>
            <div class="column-right">
                <?=$magazine->content ?>
            </div>
        </div>
        <div class="btn-wrapp"><a href="javascript:void(0)" role="button" id="description-spoiler-btn" class="more btn"><span class="expand active">Развернуть<i class="fa-long-arrow-down"></i></span><span class="expand">Свернуть<i class="fa-long-arrow-up"></i></span></a>
            <div class="divider"></div>
        </div>
        <div class="call-to-action">
            <div class="divider-top"></div>
            <div class="title"><?=$magazine->name?></div>
            <div class="price"><?=$magazine->price ?> &#8372;</div><a href="javascript:void(0)" role="button" class="buy btn-invert">Купить</a>
            <div class="divider-bottom"></div>
        </div>

        <div class="other-issues-block">
            <h2 class="divider-title">Другие выпуски</h2>

            <?php foreach ($threeRandom as $random) : ?>

                <div class="item-magazine"><img src="<?= $this->getImgUrl($random->cover, 'articleThumb'); ?>" alt="">
                    <div class="btn-holder">
                        <div class="price h1"><?= $random->price; ?><span> &#8372;</span></div>
                        <a href="<?= Url::to("/magazine/{$random->id}"); ?>" role="button" class="fa-shopping-cart btn-dark">Подробнее</a>
                    </div>
                </div>

            <?php endforeach; ?>

        </div>
    </div>
</div>
