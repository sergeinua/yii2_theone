<style>
<?php

foreach($this->context->categories as $v ){?>
    .label.label-<?=$v['slug'] ?>{
        background-color:<?=$v['label_color'] ?>
    }
    .label.label-<?=$v['slug'] ?>::before{
        height: 0;
        width: 0;
        border-top: 1rem solid <?=$v['label_color'] ?>;
        border-left: 0.5rem solid transparent;
    }
    .label.label-<?=$v['slug'] ?>::after{
        height: 0;
        width: 0;
        border-bottom: 1rem solid <?=$v['label_color'] ?>;
        border-left: 0.5rem solid transparent;

    }
<?php }?>
</style>