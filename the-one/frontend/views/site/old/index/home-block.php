<?php
/**
 * @var $item \common\models\Article
 */
if($item): ?>
<div class="home-block small">
    <a href="<?=\yii\helpers\Url::to(['/'.$item->category->slug])?>" class="label label-<?=$item->category->slug ?>"><?=$item->category->name?></a>

    <?php  if($item->video_frame){ ?>
    <div class="home-block-video">
        <?= $item->video_frame; ?>
    </div>
      <?php }else{ ?>
    <a href="<?=\yii\helpers\Url::to(['/article/'.$item->slug])?>" >
        <div class="home-block-img"><img src="<?=$this->getImgUrl($item->thumbnail,'articleThumb') ?>" alt="Home img"></div>
        <div class="home-block-description"><?=$item->title?></div>
        <div class="home-block-hover">
            <i class="corner top-left"></i>
            <i class="corner top-right"></i>
            <i class="corner bottom-left"></i>
            <i class="corner bottom-right"></i>
            <div class="hover-block-description bold"><?=$item->title?></div><br>
            <p>
                <?=$item->shortdesc;?>
            </p>
            <div class="stats"><span class="fa-eye"><?=$item->watch ?></span><span class="fa-clock-o"><?=$item->createdDate ?></span></div>
        </div>
    </a>
        <?php } ?>
</div>
<?php endif;?>