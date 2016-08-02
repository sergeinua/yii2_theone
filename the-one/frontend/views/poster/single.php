<?php
use frontend\components\OneView;
use yii\helpers\Url;
?>

<div class="container-content poster-single-block">
    <div class="blocks-wrapper">
        <div class="left-block"><img src="<?= OneView::getImgUrl($model->thumbnail, 'articleThumb'); ?>" alt=""></div>
        <div class="right-block">
            <h1 class="h2"><?= $model->title; ?></h1>
            <div class="event-details">
                <div class="ev-det-itm">
                    <div class="ed-title">Дата:</div>
                    <div class="ed-content"><?= date('d.m', $model->date_start); ?> - <?= date('d.m', $model->date_end); ?></div>
                </div>
                <div class="ev-det-itm">
                    <?php if($model->location) : ?>
                        <div class="ed-title">Место:</div>
                        <div class="ed-content"><?= $model->location; ?></div>
                    <?php endif; ?>
                </div>
                <div class="ev-det-itm">
                    <?php if($model->price) : ?>
                        <div class="ed-title">Цена:</div>
                        <div class="ed-content"><?= $model->price; ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php if($model->content) : ?>
            <?= $model->content; ?>
        <?php endif; ?>

    </div>
    <div class="social-block">
        <span class="social-text">Поделиться:</span>
        <a target=_blank
           href="http://www.facebook.com/sharer/sharer.php?u=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>"
           class="social-icon fa fa-facebook social_btn">
        </a>
        <a target=_blank href="http://vk.com/share.php?url=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>"
           class="social-icon fa fa-vk social_btn">
        </a>
        <a target=_blank
           href="http://twitter.com/share?text=<?= $model->title ?>&url=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>&hashtags="
           class="social-icon fa fa-twitter social_btn">
        </a>
        <a target=_blank href="https://plus.google.com/share?url=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>"
           class="social-icon fa fa-google-plus social_btn">
        </a>
        <!--a target=_blank
           href="http://pinterest.com/pin/create/button/?url=<!?= Url::to($_SERVER["REQUEST_URI"], true); ?>&media=<!?= $this->getImgUrl($model->thumbnail) ?>&description=<!?= $model->title ?>"
           class="social-icon fa fa-pinterest">
        </a-->
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.social_btn').click(function(e) {
            e.preventDefault();
            window.open($(this).attr('href'), 'fbShareWindow', 'height=450, width=550, top=' + ($(window).height() / 2 - 275) + ', left=' + ($(window).width() / 2 - 225) + ', toolbar=0, location=0, menubar=0, directories=0, scrollbars=0');
            return false;
        });
    });
</script>