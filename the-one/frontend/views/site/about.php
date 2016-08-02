<div id="magazine-about" class="container-content content">
    <div class="about-holder">
        <h1 class="magazine-heading">О журнале</h1>
        <div class="about">
            <div class="img-holder"><img src="<?=$this->getImgUrl($model['about_block1_image']->value) ?>"></div>
            <div class="text-holder">
                <?=$model['about_block1_text']->value ?></div>
        </div>
        <div class="about-description">
            <h2 class="post-title divider-title"><?=$model['about_block2_heading']->value ?></h2>
            <?=$model['about_block2_text']->value ?>
        </div>
    </div>
    <div class="post">
        <div class="img-holder"><img src="<?=$this->getImgUrl($model['about_block3_image']->value) ?>"></div>
        <div class="text-holder">
            <h2 class="post-title divider-title"><?=$model['about_block3_heading']->value ?></h2>
            <?=$model['about_block3_text']->value ?></div>
    </div>
    <div class="call-to-action-holder">
        <div class="call-to-action">
            <?php if(isset($lastOneMagazine)){?>
                <div class="divider-top"></div>
                <div class="title"><?=$lastOneMagazine->name ?></div>
                <div class="price"><?=$lastOneMagazine->price ?> &#8372;</div><a href="<?=$lastOneMagazine->journals_ua ?>" role="button" class="buy btn-invert">Купить</a>
                <div class="divider-bottom"></div>
            <?php } ?>

        </div>
    </div>
    <div class="post left-to-right">
        <div class="img-holder"><img src="<?=$this->getImgUrl($model['about_block4_image']->value) ?>"></div>
        <div class="text-holder">
            <h2 class="post-title divider-title"><?=$model['about_block4_heading']->value?></h2>
            <?=$model['about_block4_text']->value?>
        </div>
    </div>
</div>