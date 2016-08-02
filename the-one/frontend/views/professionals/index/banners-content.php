<span class="banner-block">
    <?php foreach ($this->context->banners as $key => $value) {

        /**
         * Todo:некамильфо
         */
        if (strpos($key, 'content') !== false) {
            foreach ($value as $banner) {
                ?>
                <div class="image-block <?= $banner->position ?>">
                    <img src="<?= $this->getImgUrl($banner->banner); ?>" alt="title">
                </div>
            <?php } ?>
        <?php } ?>
    <?php } ?>
</span>