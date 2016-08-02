<?php
use yii\helpers\Url;
/*
 * @var $cat string
 * @var $id string
 */
?>
<div class="submenu" data-menublock="<?=$id?>" >
    <div class="submenu-header">
        <h3>Свадебный журнал<span>The ONE</span></h3>

        <div class="divider"></div>
    </div>
    <div class="submenu-navigation">
        <ul role="menu">
            <li role="menuitem" class="submenu-hide"><a href="javascript:void(0)" role="link"
                                                        class="fa-long-arrow-left">Назад</a></li>
            <?php foreach ($this->context->linksOfSubcats[$cat] as $k => $v) { ?>
                <li role="menuitem">
                    <a href="<?= Url::to(["$cat/{$v->slug}"]) ?>" role="link">
                        <?= $v->name ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="submenu-footer absolute">
        <div class="divider"></div>
    </div>
</div>