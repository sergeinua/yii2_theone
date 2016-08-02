<?php
/**
 * @var $randomArticle \common\models\Article
 */
?>
<div class="home-block"><a href="<?=\yii\helpers\Url::to(['/'.$randomArticle->category->slug])?>" role="button" class="label label-<?=$randomArticle->category->slug ?>"><?=$randomArticle->category->name?></a>
    <?php  if($randomArticle->video_frame){ ?>
        <div class="home-block-video">
            <?= $randomArticle->video_frame; ?>
        </div>
    <?php }else{ ?>

    <a href="<?=\yii\helpers\Url::to(['/article/'.$randomArticle->slug])?>" role="link">
        <div class="home-block-img"><img src="<?=$this->getImgUrl($randomArticle->thumbnail, 'articleThumb'); ?>" alt=""></div>
        <div class="home-block-description"><?=$randomArticle->title?></div>
        <div class="home-block-hover"><i class="corner top-left"></i><i class="corner top-right"></i><i class="corner bottom-left"></i><i class="corner bottom-right"></i>
            <div class="hover-block-description"><?=$randomArticle->title?></div><br>
            <p>
                <?=$randomArticle->shortdesc;?>
            </p>
            <div class="stats"><span class="fa-eye"><?=$randomArticle->watch ?></span><span class="fa-clock-o"><?=$randomArticle->createdDate ?></span></div>
        </div>
    </a>
    <?php } ?>
</div>
