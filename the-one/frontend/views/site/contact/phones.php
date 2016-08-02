<?php
/**
 * @var $phones array
 */
?>
<div class="c-b tel"><span class="fa-phone"></span>
    <div class="divider"></div>
    <div class="content">

        <?php foreach($phones as $phone){
                if(isset($phone['nums'])){
                    foreach($phone['nums'] as $num){ ?>
                        <a href="tel:+<?=preg_replace('/(\(|\)|-|\+|\s)/','',$num) ?>" role="link"><?=$num ?></a>
                    <?php }
                }?>
        <span class="work-time"><?=$phone['time']?></span>
    <?php } ?>
        </div>
</div>