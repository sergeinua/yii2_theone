<?php
if (isset($this->context->banners['sidebar'])) {
    foreach ($this->context->banners['sidebar'] as $singleBanner) {
        ?>
        <div class="banner-block">
            <div class="small-banner-img">
                <a href="<?= $singleBanner->url ?>">
                    <img src="<?= $this->getImgUrl($singleBanner->banner) ?>" alt="">
                </a>
            </div>
        </div>
        <?php
    }
}else{ ?>
    <div class="banner-block">
        <div class="small-banner">
            <div class="divider-top"></div>
            <div class="title">Музыка и диджеи</div>
            <div class="sub-title">Место для баннера</div>
            <div class="divider-bottom"></div>
        </div>
        <div class="small-banner">
            <div class="divider-top"></div>
            <div class="title">Музыка и диджеи</div>
            <div class="sub-title">Место для баннера</div>
            <div class="divider-bottom"></div>
        </div>
    </div>

<?php } ?>
