<span class="banner-block">

    <?php foreach((array)$banners as $banner) :  ?>

        <?php if($banner->position != 'sidebar') : ?>

            <div class="image-block <?= $banner->position; ?>">
                <a href="<?= $banner->url; ?>">
                    <img src="<?= $this->getImgUrl($banner->banner); ?>" alt="title">
                </a>
            </div>

        <?php endif; ?>

    <?php endforeach; ?>

</span>