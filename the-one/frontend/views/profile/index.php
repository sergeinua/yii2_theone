<main id="the-one_profile" class="content container-content">
    <h2 class="h1 page-title">Личный кабинет</h2>

    <?= $this->render('_sidebar'); ?>
    <article class="main-content">
        <!--h3 class="h2 divider-title">Избранные специалисты</h3-->
        <?php if ($professionalsFeed) { ?>
            <!--div class="list-of-professionals">
                <!?php foreach ($professionalsFeed as $professional):
                    $info = $professional->userProfessionalInfo;
                    ?>

                    <div class="list professionals">
                        <div class="img-holder"><img src="<!?= $this->getImgUrl($professional->avatar) ?>" alt=""></div>
                        <div class="text-holder">
                            <div class="title-block">
                                <div class="title"><!?= $info->organisation_name ?></div>
                                <div class="sub-title">
                                    <div class="town"><!?= $professional->city['name'] ?></div>
                                    <div class="category"><!?= $professional->commaSeparatedGroupNames ?></div>
                                </div>
                            </div>
                            <div class="tools">
                                <div class="stats"><span
                                        class="views"><!?= $professional->userProfessionalInfo->views ?></span><span
                                        class="likes"><!?= $professional->userProfessionalInfo->likes ?></span></div>
                            </div>
                            <div class="btn-controls-holder">
                                <div class="btn-wrapp">
                                    <a href="javascript:void(0)" role="button" class="mail btn-dark btn-controls"></a>

                                    <button data-professional-id="<!?= $professional->id; ?>" role="button"
                                            class="likes liked professional btn-dark btn-controls"></button>

                                    <a href="<!?= \yii\helpers\Url::to(['/professional/' . $professional->slug]) ?>"
                                       role="button" class="more btn-dark btn-controls"></a></div>
                            </div>
                        </div>
                    </div>
                <!?php endforeach; ?>
            </div>
            <div class="btn-container">
                <a role="button" type="button" class="btn btn-sm"><span>Все<i class="fa fa-arrow-right"></i></span></a>
            </div-->
        <?php } else { ?>
            <p>Тут будут отображаться материалы,которые вы добавите в избранные</p>
        <?php } ?>

        <h3 class="h2 divider-title">Избранные статьи</h3>
        <?php if ($articlesFeed) { ?>

        <div class="favorite-artiles-itm-wrap">
            <div class="poster-itm-wrap">
                <?php foreach ($articlesFeed as $article): ?>

                    <!--div class="home-block">
                        <a href="<1?= \yii\helpers\Url::to(['/' . $article->category->slug]) ?>" role="button" class="label label-advices-ideas">
                            <1?= $article->category->name ?></a>
                        <a href="<1?= \yii\helpers\Url::to(['/article/' . $article->slug]) ?>" role="link">
                            <div class="home-block-img"><img src="<1?= $this->getImgUrl($article->thumbnail) ?>" alt=""></div>
                            <div class="home-block-description">
                                <1?= $article->title ?>
                            </div>
                            <div class="home-block-hover"><i class="corner top-left"></i><i
                                    class="corner top-right"></i><i class="corner bottom-left"></i><i class="corner bottom-right"></i>
                                <div class="hover-block-description"><1?= $article->title ?></div>
                                <br>
                                <p>
                                    <1?= $article->shortdesc; ?>
                                </p>
                                <div class="stats"><span class="fa-eye"><1?= $article->watch ?></span><span
                                        class="fa-clock-o"><1?= $article->createdDate ?></span></div>
                            </div>
                        </a>
                    </div-->

                        <div class="f-article">
                            <a href="<?= \yii\helpers\Url::to(['/article/' . $article->slug]); ?>">
                                <div class="img-holder"><img src="<?= $this->getImgUrl($article->thumbnail, 'articleThumb'); ?>" alt="">
                                    <div class="article-label"><?= $article->category->name; ?></div>
                                </div>
                                <div class="text-holder">
                                    <div class="title-block">
                                        <div class="title"><?= $article->title; ?></div>
                                    </div>
                                    <div class="btn-controls-holder">
                                        <div class="btn-wrapp">
                                            <!--a href="javascript:void(0)" role="button" class="likes btn-dark btn-controls"></a-->
                                            <button data-article-id="<?=$article->id ?>" class="<?=$article->isLikedByCurrentUser?'liked':''?> likes  btn-dark btn-controls">
                                            </button>
                                            <a href="<?= \yii\helpers\Url::to(['/article/' . $article->slug]); ?>" role="button" class="more btn-dark btn-controls"></a>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                <?php endforeach; ?>
            </div>
        </div>
            <div class="btn-container">
                <button role="button" type="button" class="btn btn-sm"><span>Все<i class="fa fa-arrow-right"></i></span>
                </button>
            </div>
        <?php } else { ?>
            Тут будут отображаться последние профессионалы, которые вы добавите в избранные
        <?php } ?>
        <br>
        <br>
        <div class="banner-block">
        <?php if ($this->context->banners) {
            if (isset($this->context->banners['center'])) {
                foreach ($this->context->banners['center'] as $banner) {
                    ?>
                    <a href="<?= $banner->url ?>">
                        <img src="<?= $this->getImgUrl($banner->banner,'bannerFullWidth') ?>" alt="">
                    </a>
                    <?php
                }
            }
            ?>
        <?php } else { ?>

                <!--div class="banner banner-type-one">
                    <div class="divider-top"></div>
                    <div class="title">Свадебные тренды</div>
                    <div class="sub-title">Место для баннера</div>
                    <div class="divider-bottom"></div>
                </div-->

        <?php } ?>
        </div>

    </article>
</main>