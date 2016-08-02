<?php
/**
 * @var $model \common\models\User
 */
use yii\helpers\Url;

\frontend\assets\ReactAsset::register($this);
?>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&language=ru"></script>
<div class="content professionals-single container-content">
    <main class="ps-main">
        <div class="ps-main-content">
            <ul role="menu" class="breadcrumb">
                <li role="menuitem"><a href="<?= Url::to(['/professionals']) ?>" role="link">Католог профессионалов</a>
                </li>
                <li role="menuitem"><span><?= $model->userProfessionalInfo->organisation_name ?></span></li>
            </ul>
            <div class="professionals-info">
                <div class="p-i-image"><img src="<?= $this->getImgUrl($model->avatar); ?>" alt="">

                    <div class="p-i-image-footer">

                        <ul role="menu" class="rating four selected">
                            <?php for ($i = 5; $i >= 1; $i--) {
                                ?>
                                <?php if ($model->userProfessionalInfo->rate_average === $i) { ?>
                                    <li role="menuitem" class="current"><i class="fa fa-star"></i></li>
                                <?php } else { ?>
                                    <li role="menuitem"><i class="fa fa-star"></i></li>
                                <?php } ?>
                            <?php } ?>
                        </ul>
                        <div class="stats"><span class="fa-eye"><?= $model->userProfessionalInfo->frontViews ?></span><span
                                class="fa-heart"><?=$model->userProfessionalInfo->frontLikes ?></span></div>
                    </div>
                </div>
                <div class="p-i-content">
                    <h1 role="heading" class="heading-b-i-c"><?= $model->userProfessionalInfo->organisation_name ?></h1>
                    <ul role="list" class="p-i-content-list">
                        <?php if ($model->place) { ?>
                            <li role="listitem" class="professional-city"><?= $model->place->city->name ?></li>

                            <?php if (!empty($model->place->address)) { ?>
                                <li role="listitem" class="professional-address">
                                    <?= $model->place->address ?><a role="link" href="javascript:void(0)"
                                                            data-toggle="modal"
                                                            data-target="#modal-map">показать на
                                        карте</a></li>
                            <?php } ?>
                        <?php } ?>
                        <li role="listitem" class="professional-mail">
                            <a role="link" href="mailto:<?= $model->contactMail ?>"><?= $model->contactMail ?></a></li>
                        <?php if (!empty($model->phone)) { ?>

                            <li role="listitem" class="professional-tel">
                                <?php foreach ($model->phonesArray as $phone) { ?>
                                    <a role="link" href="tel:<?= $phone ?>"><?= $phone ?>,</a>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                    <?php if ($socials = \yii\helpers\Json::decode($model->socials)) { ?>
                        <div class="professionals-social"><span>Мы в соцсетях:</span>

                            <div class="social-professionals-list">
                                <?php foreach ($socials as $social) {
                                    if (is_array($social['social'])) {
                                        ?>
                                        <a href="<?= $social['url'] ?>" class="<?= $social['social']['class'] ?>"></a>

                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="professionals-article">
                <h2 class="heading-b-i-c">Информация о компании</h2>

                <div class="divider"></div>
                <?= $model->userProfessionalInfo->organisation_info ?>
            </div>
            <button id="show-description" type="button" role="button" class="btn active"><span>Развернуть</span><i
                    class="fa fa-long-arrow-down"></i></button>
            <?= $this->render('single/gallery', ['userMedia' => $model->userMedia]) ?>

            <div id="comments-component">
            </div>
            <div class="article-content-footer">
                <div class="divider center"></div>
<!--                <div class="pagination-block">-->
<!--                    <ul role="menu" class="pager pager-lg">-->
<!--                        <li role="menuitem" class="pre"><a href="javascript:void(0)" aria-label="Previous" role="link"-->
<!--                                                           class="btn"><i-->
<!--                                    class="fa fa-arrow-left"></i><span>Предыдущее</span></a></li>-->
<!--                        <li role="menuitem" class="current"><a href="javascript:void(0)" aria-label="Current"-->
<!--                                                               role="link" class="btn">-->
<!--                                <div class="quad"></div>-->
<!--                                <div class="quad"></div>-->
<!--                            </a></li>-->
<!--                        <li role="menuitem" class="next"><a href="javascript:void(0)" aria-label="Next" role="link"-->
<!--                                                            class="btn"><span>Следущее</span><i-->
<!--                                    class="fa fa-arrow-right"></i></a></li>-->
<!--                    </ul>-->
<!--                </div>-->
            </div>
        </div>
    </main>
    <div class="aside-panel">
        <div class="aside-panel-content">
            <div class="aside-another-pro">
                <h3>Похожие специалисты</h3>
                <?php foreach ($model->similarProfessionals as $v) { ?>
                    <a href="<?= \yii\helpers\Url::to(['professional/' . $v->slug]) ?>" class="aa-pro-content">
                        <div class="aa-pro-content-img"><img src="<?= $this->getImgUrl($v->avatar, 'articleThumb') ?>">
                        </div>
                        <div class="aa-pro-content-info">
                            <div class="name"><?= $v->userProfessionalInfo->organisation_name ?></div>
                            <?php if ($v->place) { ?>
                                <div class="location"><?= $v->place->city->name ?></div>
                            <?php } ?>
                        </div>
                    </a>
                <?php } ?>
            </div>
            <div class="aside-another-pro">
                <h3>Популярные</h3>
                <?php foreach ($populars as $popular) { ?>
                    <a href="<?= \yii\helpers\Url::to(['professional/' . $popular->slug]) ?>" class="aa-pro-content">
                        <div class="aa-pro-content-img"><img
                                src="<?= $this->getImgUrl($popular->avatar, 'articleThumb') ?>"></div>
                        <div class="aa-pro-content-info">
                            <div class="name"><?= $popular->userProfessionalInfo->organisation_name ?></div>
                            <?php if ($popular->place) { ?>
                                <div class="location"><?= $popular->place->city->name ?></div>
                            <?php } ?>
                        </div>
                    </a>
                <?php }
                ?>
            </div>
            <div class="divider center"></div>
            <?= $this->render('single/banners'); ?>

        </div>
    </div>
</div>
<div id="modal-map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade">
    <div role="document" class="modal-dialog">
        <div class="modal-overlay"></div>
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="modal-close"></button>
            </div>
            <div class="modal-body">
                <div id="map"></div>
            </div>
        </div>
    </div>
    <?php if ($model->place) { ?>
        <script>
            window.addEventListener('DOMContentLoaded', function () {
                $('#modal-map').on('shown.bs.modal', function () {
                    initProfMap(<?=implode(',',[$model->place->lat,$model->place->lng]) ?>)
                })
            })
        </script>
    <?php } ?>
</div>