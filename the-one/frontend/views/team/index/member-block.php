<a href="<?=\yii\helpers\Url::to('/team/'.$teamMember->slug)?>" class="item">
    <div class="img-holder"><img src="<?=$this->getImgUrl($teamMember->photo) ?>"></div>
    <div class="text-holder">
        <div class="title">
            <?=$teamMember->name ?>
        </div>
        <div class="subtitle"><?=$teamMember->profession ?></div>
    </div>
</a>