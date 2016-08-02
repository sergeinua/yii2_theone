<?php
    /*
     * "Потому что не предусмотрено дизайном"(с)
     */
    $site = $this->context->params['site'];
    $socials = \yii\helpers\Json::decode($this->context->params['site']['socials']);
?><div class="social-block">
    <h2 class="heading-b-i-c">Мы в социальных сетях</h2>
    <div class="divider"></div>
    <ul role="list" class="social-list">
        <?php foreach($socials as $social){ ?>
                    <li role="menuitem">
                        <a href="<?=$social['url'] ?>" role="link" class="<?=$social['social']['class'] ?>">

                        </a>
                    </li>
        <?php } ?>
    </ul>
</div>