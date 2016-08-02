<?php
use yii\helpers\Url;

/**
 * @var $model \common\models\User
 */
?>
<div class="professionals">

    <div class="img-holder"><img src="<?= $this->getImgUrl($model->avatar) ?>" alt=""></div>
    <div class="text-holder">
        <a href="<?= Url::to(['/professional/' . $model->slug]) ?>">
            <div class="title-block">
                <div class="title"><?= $model->userProfessionalInfo->organisation_name ?></div>
                <div class="sub-title">
                    <div class="town">
                        <?php if ($model->city) { ?>
                            <?= $model->city->name ?>
                        <?php } ?>
                    </div>
                    <div class="category"><?= $model->commaSeparatedGroupNames ?></div>
                </div>
            </div>
            <div class="tools">
                <div class="stats">
                    <span class="views"><?= $model->userProfessionalInfo->frontViews ?></span>
                    <span class="likes"><?= $model->userProfessionalInfo->frontLikes ?></span>
                </div>
            </div>
        </a>

        <div class="btn-controls-holder">
            <div class="btn-wrapp">
                <a href="mailto:<?= $model->contactMail ?>" role="button" class="mail btn-dark btn-controls"></a>
                <button data-professional-id="<?= $model->id; ?>" role="button"
                        class="likes <?= $model->isLikedByCurrentUser() ? 'liked' : '' ?> professional btn-dark btn-controls"></button>
                <a href="<?= Url::to(['/professional/' . $model->slug]) ?>" role="button"
                   class="more btn-dark btn-controls"></a>
            </div>
        </div>
    </div>
</div>