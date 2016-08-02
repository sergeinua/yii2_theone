<?php  if($feed->video_frame){ ?>
    <div class="home-block">
        <div class="home-block-video">
            <?= $feed->video_frame; ?>
        </div>
    </div>
<?php }else{ ?>

<a class="home-block" href="<?=\yii\helpers\Url::to(['/article/'.$feed->slug])?>">
    <div class="home-block-img"><img src="<?=$this->getImgUrl($feed->thumbnail,'articleThumb') ?>" alt="Home img"></div>
    <div class="home-block-description"><?=$feed->title ?></div>
    <div class="home-block-hover"><i class="corner top-left"></i><i class="corner top-right"></i><i class="corner bottom-left"></i><i class="corner bottom-right"></i>
        <div class="home-block-hover-title"><?=$feed->title ?></div>
        <p><?= $feed->shortdesc ?></p>
        <div class="stats"><span class="fa-eye"><?=$feed->watch ?></span><span class="fa-clock-o"><?=$feed->createdDate ?></span></div>
    </div>
</a>
<?php } ?>