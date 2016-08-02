<main id="the-one_profile" class="content container-content">
    <h2 class="h1 page-title">Личный кабинет</h2>
    <?= $this->render('_sidebar'); ?>
    <article class="main-content">
        <h3 class="h2 divider-title">Избранные статьи</h3>

        <div class="favorite-artiles-itm-wrap">
            <div class="poster-itm-wrap">

                <?php if (!$favoriteArticles) { ?>
                    <p>Вы не добавили еще ни одной статьи.</p>
                <?php } else { ?>

                    <?php foreach ($favoriteArticles as $article): ?>
                        <!--div class="home-block"><a href="<!?= \yii\helpers\Url::to(['/' . $article->category->slug]) ?>"
                                                   role="button"
                                                   class="label label-<!?= $article->category->slug ?>"><!?= $article->category->name ?></a>
                            <a href="<!?= \yii\helpers\Url::to(['/article/' . $article->slug]) ?>" role="link">
                                <div class="home-block-img"><img src="<!?= $this->getImgUrl($article->thumbnail) ?>" alt="">
                                </div>
                                <div class="home-block-description"><!?= $article->title ?></div>
                                <div class="home-block-hover"><i class="corner top-left"></i><i
                                        class="corner top-right"></i><i class="corner bottom-left"></i><i
                                        class="corner bottom-right"></i>

                                    <div class="hover-block-description"><!?= $article->title ?></div>
                                    <br>

                                    <p>
                                        <!?= $article->shortdesc; ?>
                                    </p>

                                    <div class="stats"><span class="fa-eye"><!?= $article->watch ?></span><span
                                            class="fa-clock-o"><!?= $article->createdDate ?></span></div>
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
                <?php } ?>

            </div>
        </div>

    </article>
</main>