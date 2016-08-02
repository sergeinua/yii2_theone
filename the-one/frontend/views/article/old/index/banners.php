<span class="banner-block">
    <?php if ($this->context->banners) { ?>
        <?php foreach ($this->context->banners as $key => $value) {

            /**
             * Todo:некамильфо
             */
            if (strpos($key, 'content') !== false) {
                foreach ($value as $banner) {
                    ?>
                    <div class="image-block <?= $banner->position ?>">
                        <a href="<?= $banner->url ?>">
                            <img src="<?= $this->getImgUrl($banner->banner); ?>" alt="title">
                        </a>
                    </div>
                <?php } ?>
            <?php } ?>

        <?php } ?>
    <?php } ?>
</span>