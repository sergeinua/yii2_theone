<?php
use yii\helpers\Url;

$user = Yii::$app->user->identity
?>

<aside class="aside-panel divider-title">
    <?php if ($this->context->route === 'profile/edit-info') { ?>
        <div id='kn-avatar'>
            <div class="img-holder">
            <img data-bind="attr:{
            src:$root.imgSrc
        }" alt="title">
            </div>
            <input type="file" id="avatarka" name="avatarka" data-bind="event:{
            change:function(){
                uploadImage($element.files[0]);
            }
        }" style="display:none;">
            <label for="avatarka" class="btn">
               Изменить аватар
            </label>
        </div>
    <?php }else{ ?>
        <div class="img-holder">
            <?php if (Yii::$app->user->identity->avatar) { ?>
                <img src="<?= $this->getImgUrl(Yii::$app->user->identity->avatar, 'thumbnail') ?>" alt="title">
            <?php } else { ?>
                <img src="/images/no-image.gif" alt="title">
            <?php } ?>
        </div>
    <?php } ?>
    <div class="text-holder">
        <nav class="rubrics-menu">
            <ul role="menu">
                <li role="menuitem" class="rubrics-title">
                    Привет, <?= $user->first_name ? $user->first_name : ' пользователь!' ?></li>
                <li role="menuitem"><a href="<?= Url::to(['profile/index']) ?>" role="link" class=" fa-angle-left">Личный
                        кабинет</a></li>
                <li role="menuitem"><a href="<?= Url::to(['profile/edit-info']) ?>" role="link"
                                       class=" fa-angle-left">Редактировать профиль</a></li>
                <!--li role="menuitem"><a href="<!?= Url::to(['profile/my-gallery']) ?!>" role="link"
                                       class=" fa-angle-left">Моя галерея</a></li-->
                <li role="menuitem"><a href="<?= Url::to(['profile/favorite-articles']) ?>" role="link"
                                       class=" fa-angle-left">Избранные статьи</a></li>
                <!--li role="menuitem"><a href="<!?= Url::to(['profile/favorite-specialists']) ?!>" role="link" class="active fa-angle-left">Избранные
                        специалисты</a></li-->
            </ul>
        </nav>
    </div>

</aside>