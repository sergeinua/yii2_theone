<?php
use yii\helpers\Url;

?>
<div class="article-banner-block">
    <div style="background-image: url(<?=$this->getImgUrl($article->thumbnail)?>)" class="article-banner">
        <div class="article-banner-content">
            <div class="a-b-c-heading">
                <h2 role="heading"><?=$article->title ?></h2>
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
        <?php if($article->video_frame){
            echo $article->video_frame;
        } ?>
        <?=\Yii::$app->shortcodes->parse(($article->content)); ?>
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