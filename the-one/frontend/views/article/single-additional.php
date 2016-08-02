<?php
use yii\helpers\Url;

?>
<div class="container-content article-single" id="art-s">
    <h1><?=$article->title ?></h1>
    <div class="article-content">
        <div class="article-block">
            <div class="article-block">
                <?= \Yii::$app->shortcodes->parse(($article->content)); ?>
            </div>
        </div>
        <div class="social-block"><span class="social-text">Поделиться:</span>
            <a target=_blank
               href="http://www.facebook.com/sharer/sharer.php?u=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>"
               class="social-icon fa fa-facebook">
            </a>
            <a target=_blank href="http://vk.com/share.php?url=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>"
               class="social-icon fa fa-vk">
            </a>
            <a target=_blank
               href="http://twitter.com/share?text=<?= $article->title ?>&url=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>&hashtags="
               class="social-icon fa fa-twitter">
            </a>
            <a target=_blank href="https://plus.google.com/share?url=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>"
               class="social-icon fa fa-google-plus">
            </a>
            <a target=_blank
               href="http://pinterest.com/pin/create/button/?url=<?= Url::to($_SERVER["REQUEST_URI"], true); ?>&media=<?= $this->getImgUrl($article->thumbnail) ?>&description=<?= $article->title ?>"
               class="social-icon fa fa-pinterest">
            </a>
        </div>
    </div>
</div>
