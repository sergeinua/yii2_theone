<?php
if (isset($this->context->banners['sidebar'])) {
    foreach ($this->context->banners['sidebar'] as $singleBanner) {
        ?>
        <div class="banner-block ">
            <div class="small-banner-img">
                <a href="<?= $singleBanner->url ?>">
                    <img src="<?= $this->getImgUrl($singleBanner->banner) ?>" alt="">
                </a>
            </div>
        </div>
        <?php
    }
} ?>