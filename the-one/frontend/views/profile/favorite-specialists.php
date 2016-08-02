<main id="the-one_profile" class="content container-content">
    <h2 class="h1 page-title">Личный кабинет</h2>
    <?= $this->render('_sidebar'); ?>
    <article class="main-content">
        <h3 class="h2 divider-title">Избранные специалисты</h3>

        <div class="list-of-professionals">
            <?php if (!$favoriteSpecialists) { ?>
                <p>Вы не добавили ни одного специалиста</p>
            <?php } else { ?>

                <?php foreach ($favoriteSpecialists as $professional):
                    $info = $professional->userProfessionalInfo;
                    ?>
                    <div class="list professionals">
                        <div class="img-holder"><img src="<?= $this->getImgUrl($professional->avatar) ?>" alt=""></div>
                        <div class="text-holder">
                            <div class="title-block">
                                <div class="title"><?= $info->organisation_name ?></div>
                                <div class="sub-title">
                                    <div class="town"><?= $professional->place->city->name ?></div>
                                    <div class="category"><?= $professional->commaSeparatedGroupNames ?></div>
                                </div>
                            </div>
                            <div class="tools">
                                <div class="stats"><span class="views"><?= $professional->userProfessionalInfo->views ?></span><span
                                        class="likes"><?= $professional->userProfessionalInfo->likes ?></span></div>
                            </div>
                            <div class="btn-controls-holder">
                                <div class="btn-wrapp">
                                    <a href="javascript:void(0)" role="button" class="mail btn-dark btn-controls"></a>

                                    <button data-professional-id="<?= $professional->id; ?>" role="button" class="likes liked professional btn-dark btn-controls">
                                    </button>
                                    <a href="<?= \yii\helpers\Url::to(['/professional/' . $professional->slug]) ?>"
                                       role="button" class="more btn-dark btn-controls"></a></div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } ?>
        </div>
    </article>
</main>