<?php
use yii\helpers\Url;
?>

<div class="article-banner-block">
    <div style="background-image: url(<?=$this->getImgUrl($article->thumbnail)?>)" class="article-banner">
        <div class="article-banner-content">
            <div class="a-b-c-heading">
                <h1 class="magazine-heading" role="heading"><?=$article->title ?></h1>
            </div>
            <div class="a-b-c-footer">
                <div class="stats"><span class="fa-eye"><?=$article->watch ?></span><span class="fa-heart" data-article-id="<?=$article->id ?>"><?=sizeof($article->likedUsers)?></span></div>
                <div class="color-labels">
                    <?php if($article->category->hasColor){?>
                        <?php   foreach($article->colors as $c){?>
                            <div style="background:<?= $c->hex ?>"></div>
                        <?php }?>
                    <?php } ?>
                </div>
                <ul role="menu" class="breadcrumb">
                    <li role="menuitem"><a href="/<?=$article->category->slug ?>" role="link"><?=$article->category->name ?></a></li>
                    <li role="menuitem"><span><?=$article->title ?></span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="article-content">
    <div class="article-block">
        <div class="article-block">
            <?php if($article->video_frame){
                echo $article->video_frame;
            } ?>
            <?=\Yii::$app->shortcodes->parse(($article->content)); ?>
        </div>
    </div>

    <?php if($tags) : ?>

        <div class="tags"><span class="tag">Тэги:</span>
            <span class="tags-list">

                <?php foreach($tags as $tag) : ?>

                    <a href="<?= Url::toRoute(['site/tag', 'tag' => $tag]); ?>"><?= $tag; ?></a>

                <?php endforeach; ?>

            </span>
        </div>

    <?php endif; ?>


    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>


    <div class="social-block"><span class="social-text">Поделиться:</span>

        <!--a target=_blank href="http://www.facebook.com/sharer/sharer.php?u=<!?= Url::to($_SERVER["REQUEST_URI"],true); ?>
        &title=<!?= $article->title; ?>
        &description=<!?= str_replace('[Gallery]', '', strip_tags(mb_substr($article->content, 0, 500, 'UTF-8'))); ?>" class="social-icon fa fa-facebook"></a-->
<!--        <a target=_blank href="http://www.facebook.com/sharer/sharer.php?u=--><?//=Url::to($_SERVER["REQUEST_URI"],true); ?><!--" class="social-icon fa fa-facebook"></a>-->
        <a target=_blank href="http://vk.com/share.php?url=<?=Url::to($_SERVER["REQUEST_URI"],true); ?>" class="social-icon fa fa-vk social_btn"></a>
        <a target=_blank href="http://twitter.com/share?text=<?=$article->title ?>&url=<?=Url::to($_SERVER["REQUEST_URI"],true); ?>&hashtags=" class="social-icon fa fa-twitter social_btn"></a>
        <a target=_blank href="https://plus.google.com/share?url=<?=Url::to($_SERVER["REQUEST_URI"],true); ?>" class="social-icon fa fa-google-plus social_btn"></a>
        <!--a target=_blank href="http://pinterest.com/pin/create/button/?url=<!?=Url::to($_SERVER["REQUEST_URI"],true); ?>&media=<!?=$this->getImgUrl($article->thumbnail) ?>&description=<!?=$article->title ?>" class="social-icon fa fa-pinterest"></a-->

        <a id="facebook_btn" class="social_btn social-icon fa fa-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= Url::to($_SERVER["REQUEST_URI"],true); ?>"></a>
    </div>
    <h2 class="heading-b-i-c">Советуем почитать</h2>
    <div class="divider"></div>
    <div class="articles-block common">
        <?php foreach($threeArticles as $randomArticle):
            echo $this->render('recommend-block',[
                "randomArticle"=>$randomArticle,
                'article'=>$article
            ]);
        endforeach;?>
    </div>
    <div class="article-content-footer">
        <div class="divider center"></div>
        <div class="pagination-block">
            <ul role="menu" class="pager pager-lg">
                <?php if($previousArticle){ ?>
                    <li role="menuitem" class="pre">
                        <a href="<?=Url::to(["article/{$previousArticle->slug}"]) ?>" aria-label="Previous" role="link" class="btn">
                            <i class="fa fa-arrow-left"></i><span>Предыдущее</span></a></li>
                <?php } ?>
                <li role="menuitem" class="current"><a href="/<?=$article->category->slug ?>" aria-label="Current" role="link" class="btn">
                        <div class="quad"></div>
                        <div class="quad"></div></a></li>
                <li role="menuitem" class="next">
                    <?php if($nextArticle){ ?>
                    <a href="<?=Url::to(["article/{$nextArticle->slug}"]) ?>" aria-label="Next" role="link" class="btn"><span>Следующее</span><i class="fa fa-arrow-right"></i></a></li>
            <?php } ?>
            </ul>
        </div>
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