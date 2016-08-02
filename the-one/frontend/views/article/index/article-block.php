<?php
/**
 * @var $withColors boolean
 */
use yii\helpers\Url;

?>
<div class="article-ideas">
    <div class="img-holder">
        <?php
        if($model->video_frame){
            echo $model->video_frame;
        }else{ ?>
            <a href="<?=Url::to(['/article/'.$model->slug])?>">
                <img src="<?=$this->getImgUrl($model->thumbnail,'articleThumb')?>" alt="">
            </a>

        <?php } ?>
    </div>
    <div class="text-holder">
        <a href="<?=Url::to(['/article/'.$model->slug])?>">
        <div class="title"><?=$model->title ?></div>
        </a>
        <div class="sub-title">
            <div class="category"></div>
        </div>
        <div class="tools">
            <?php if($withColors){?>
                <?php foreach($model->colors as $color){ ?>
            <div role="button" style="background:<?=$color->hex?>" class="select-color"></div>
                    <?php } ?>
            <?php } ?>
            <div class="stats">
                <span class="views">
                    <?=$model->watch ?>
                </span>
                <span class="<?=$model->isLikedByCurrentUser?'active':''?> likes"><?=sizeof($model->likedUsers)?></span>
            </div>
        </div>
        <div class="btn-controls-holder">
            <button data-article-id="<?=$model->id ?>" class="<?=$model->isLikedByCurrentUser?'liked':''?> likes  btn-dark btn-controls">

            </button>
            <a href="<?=Url::to(['/article/'.$model->slug])?>" role="button" class="more btn-dark btn-controls">
                
            </a>
        </div>
    </div>
</div>