<?php
use yii\helpers\Url;
use yii\widgets\ActiveForm;
$loginForm = $this->context->loginForm;
$signUp = $this->context->signUpForm;
$linksOfSubcats = $this->context->linksOfSubcats;
?>

<a id="btn-buy-mag" href="<?= Url::to(['/magazine']); ?>" role="btn" title="Купить журнал" class="btn-buy-mag"><span>Купить журнал</span></a>
<?php frontend\components\OneNotify::showNotifies(); ?>
<header class="header">
    <div class="logo"><a href="/">
            <svg id="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 115.02 38.37">
                <title></title>
                <path d="M19.34,38.37A19.28,19.28,0,0,1,0,19.19a19.34,19.34,0,0,1,38.67,0A19.28,19.28,0,0,1,19.34,38.37Zm0-35a15.87,15.87,0,1,0,16,15.87A15.87,15.87,0,0,0,19.34,3.32Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M95.68,38.37A19.6,19.6,0,0,1,82,33a18.37,18.37,0,0,1-5.66-13.4A19.62,19.62,0,0,1,82,5.84a19.25,19.25,0,0,1,27.22-.4l0.13,0.13a19.62,19.62,0,0,1,5.66,14,1.47,1.47,0,0,1-1.34,1.59H79.51C80.33,29,87.28,35,95.68,35c8.67,0,12.46-3.83,15.48-9.59A1.66,1.66,0,0,1,114.1,27C111.15,32.63,106.65,38.37,95.68,38.37ZM79.5,18.19h32c-0.77-8.44-7.25-14.87-15.83-14.87C87.54,3.32,80.35,10.11,79.5,18.19Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M27.07,25.63a3.38,3.38,0,0,1-3.43-3.33s0,0,0-.07a3.49,3.49,0,0,1,3.43-3.54,3.45,3.45,0,0,1,3.43,3.47v0.07a0.43,0.43,0,0,1-.43.43H24.54a2.53,2.53,0,0,0,2.54,2.11,2.56,2.56,0,0,0,2.28-1.4,0.43,0.43,0,0,1,.76.39A3.42,3.42,0,0,1,27.07,25.63ZM24.53,21.8H29.6a2.54,2.54,0,0,0-2.54-2.25,2.65,2.65,0,0,0-2.52,2.26h0Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M71.6,38.27a1.63,1.63,0,0,1-1.28-.62L45.5,6.51v30.1a1.51,1.51,0,1,1-3,0V1.76A1.52,1.52,0,0,1,43.44.2,1.23,1.23,0,0,1,45,.73L70.5,33.87V1.76c0-.92.08-1.66,1-1.66a2,2,0,0,1,2,1.66V36.61a1.77,1.77,0,0,1-1.23,1.57A2.42,2.42,0,0,1,71.6,38.27Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M12.95,25.62a2.46,2.46,0,0,1-2.45-2.47V13.79a0.51,0.51,0,0,1,1,0v9.33a1.56,1.56,0,0,0,1.45,1.67H13a1.61,1.61,0,0,0,1.6-1.62v0A0.39,0.39,0,0,1,15,22.71h0a0.42,0.42,0,0,1,.42.41A2.49,2.49,0,0,1,12.95,25.62Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M14.36,20.19H8.55a0.51,0.51,0,0,1,0-1h5.81a0.59,0.59,0,0,1,.1.78A0.43,0.43,0,0,0,14.36,20.19Z" transform="translate(0 0)" class="cls-1"></path>
                <path d="M22,25.75a0.5,0.5,0,0,1-.5-0.41V21.19A1.59,1.59,0,0,0,20,19.53H19.93a5.75,5.75,0,0,0-3.61,1.54,0.39,0.39,0,0,1-.55,0l0,0a0.41,0.41,0,0,1,0-.58h0A6.71,6.71,0,0,1,20,18.7a2.5,2.5,0,0,1,2.49,2.49v4.15A0.5,0.5,0,0,1,22,25.75Z" transform="translate(0 0)"></path>
                <path d="M17,25.62a0.46,0.46,0,0,1-.5-0.41V8a0.51,0.51,0,0,1,1,0V25.2a0.46,0.46,0,0,1-.5.42h0Z" transform="translate(0 0)" class="cls-1"></path>
            </svg></a></div>
    <nav role="nav" class="navbar-main">
        <div class="menu-wrapper">
            <div class="icon-menu">
                <div id="burger" class="burger"><span></span><span></span><span></span></div>
            </div>
            <ul role="list">
                <li role="listitem"><a href="#" role="button" title="" class="second-menu-link">О нас</a>
                    <ul role="list" class="second-level-menu">
                        <li role="listitem"><span class="close-menu">
                             <div class="fa fa-arrow-left"></div>Назад</span></li>
                        <li role="listitem"><a href="<?= Url::to(['/site/about']); ?>" role="link">Журнал the ONE</a></li>
                        <li role="listitem"><a href="<?= Url::to(['/team']); ?>" role="link">Команда the ONE</a></li>
                        <li role="listitem"><a href="<?= Url::to(['/magazine']); ?>" role="link">Купить журнал</a></li>
                        <li role="listitem"><a href="<?= Url::to(['/site/contact']) ?>" role="link">Контакты</a></li>
                    </ul>
                </li>
                <li role="listitem">
                    <a href="<?= Url::to(['/the-one-news']) ?>" role="link" class="second-menu-link">События</a>
<!--                    <a href="#" role="link" class="second-menu-link">События</a>-->
                    <?php if (isset($linksOfSubcats['the-one-news'])) { ?>
                        <ul role="list" class="second-level-menu">
                            <li role="listitem"><span class="close-menu">
                                 <div class="fa fa-arrow-left"></div>Назад</span></li>
                            <?php foreach($linksOfSubcats['the-one-news'] as $link){ ?>
                                <li>
                                    <a href="<?=Url::to("/the-one-news/{$link->slug}") ?>" role="link">
                                        <?=$link->name ?>
                                    </a>
                                </li>
                            <?php } ?>
                    </ul>
                    <?php } ?>
                </li>
                <li role="listitem">
                    <a href="<?= Url::to('/articles') ?>" role="button" title="" class="second-menu-link">Репортажи</a>
<!--                    <a href="#" role="button" title="" class="second-menu-link">Репортажи</a>-->
                    <?php if (isset($linksOfSubcats['articles'])) { ?>
                        <ul role="list" class="second-level-menu">
                            <li role="listitem"><span class="close-menu">
                                 <div class="fa fa-arrow-left"></div>Назад</span></li>
                            <?php foreach($linksOfSubcats['articles'] as $link){ ?>
                                <li>
                                    <a href="<?=Url::to("/articles/{$link->slug}") ?>" role="link">
                                        <?=$link->name ?>
                                    </a>
                                </li>
                            <?php } ?>
                    </ul>
                    <?php } ?>
                </li>
                <li role="listitem">
                    <a href="<?= Url::to('/interview') ?>" role="button" title="" class="second-menu-link">Интервью</a>
                    <?php if (isset($linksOfSubcats['interview'])) { ?>
                        <ul role="list" class="second-level-menu">
                            <li role="listitem"><span class="close-menu">
                                 <div class="fa fa-arrow-left"></div>Назад</span></li>
                                <?php foreach($linksOfSubcats['interview'] as $link){ ?>
                                    <li>
                                        <a href="<?=Url::to("/interview/{$link->slug}") ?>" role="link">
                                            <?=$link->name ?>
                                        </a>
                                    </li>
                                <?php } ?>
                    </ul>
                    <?php } ?>
                </li>
                <li role="listitem">
                    <a href="<?= Url::to('/creative-weddings') ?>" role="button" title="" class="second-menu-link">Свадьба</a>
<!--                    <a href="#" role="button" title="" class="second-menu-link">Свадьба</a>-->
                    <?php if (isset($linksOfSubcats['creative-weddings'])) { ?>
                        <ul role="list" class="second-level-menu">
                            <li role="listitem"><span class="close-menu">
                                 <div class="fa fa-arrow-left"></div>Назад</span></li>
                                <?php foreach($linksOfSubcats['creative-weddings'] as $link){ ?>
                                    <li>
                                        <a href="<?=Url::to("/creative-weddings/{$link->slug}") ?>" role="link">
                                            <?=$link->name ?>
                                        </a>
                                    </li>
                                <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
                <li role="listitem">
                    <a href="<?= Url::to('/advices-and-ideas') ?>" role="button" title="" class="second-menu-link">Невеста</a>
                    <?php if (isset($linksOfSubcats['advices-and-ideas'])) { ?>
                        <ul role="list" class="second-level-menu">
                            <li role="listitem"><span class="close-menu">
                                 <div class="fa fa-arrow-left"></div>Назад</span></li>

                            <?php foreach($linksOfSubcats['advices-and-ideas'] as $link){ ?>
                                <li>
                                    <a href="<?=Url::to("/advices-and-ideas/{$link->slug}") ?>" role="link">
                                        <?=$link->name ?>
                                    </a>
                                </li>
                            <?php } ?>

                    </ul>
                    <?php } ?>
                </li>
                <li role="listitem">
                    <a href="<?= Url::to('/honeymoon') ?>" role="button" title="" class="second-menu-link">Lifestyle</a>
                    <?php if (isset($linksOfSubcats['honeymoon'])) { ?>
                    <ul role="list" class="second-level-menu">
                        <li role="listitem"><span class="close-menu">
                                 <div class="fa fa-arrow-left"></div>Назад</span></li>

                            <?php foreach($linksOfSubcats['honeymoon'] as $link){ ?>
                                <li>
                                    <a href="<?=Url::to(".honeymoon/{$link->slug}") ?>" role="link">
                                        <?=$link->name ?>
                                    </a>
                                </li>
                            <?php } ?>

                    </ul>
                    <?php } ?>
                </li>
                <li role="listitem" class="consult">
                    <a href="#" role="button" title="" class="second-menu-link" class="second-menu-link">Консультация</a>
                    <div role="list" class="second-level-menu consult">

                        <div class="consult-text">
                            <div class="divider-lines invert"><span>Свадебная консультация</span></div>
                            <p>
                                Наша миссия – показывать идеальные праздники не только на страницах нашего журнала, но и создавать их в жизни.

                                Обладая многолетним опытом в организации торжеств любой сложности по всему миру, мы точно знаем, как это сделать. Поэтому теперь мы проводим для вас свадебные консультации, на которых каждая пара сможет получить подробные ответы на свои вопросы, а также профессиональные рекомендации.

                                Мы познакомим вас с лучшими экспертами, в непринужденной атмосфере поделимся знаниями и раскроем массу секретов, чтобы ваша свадьба стала совершенной.
                            </p><a href="<?= Url::toRoute(['site/contact']); ?>">Записаться на консультацию</a>
                        </div>
                        <?=$this->render('header-icons'); ?>
                    </div>
                </li>
            </ul>
            <div class="user-activity">
                <div class="search dropdown active-item">
                    <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="search-icon fa fa-search"></div>
                    <div class="dropdown-menu">
                        <form action="<?= Url::toRoute('site/search'); ?>" method="get" id="search-form">
                            <input type="search" role="input" id="search-field" name="search-field">
                            <button type="submit" class="btn-search fa fa-search"></button>
                        </form>
                    </div>
                </div>
                <?php if(Yii::$app->user->isGuest){  ?>
                <div class="signin dropdown active-item ">
                    <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="search-icon fa fa-sign-in"></div>
                    <div class="dropdown-menu form">
                        <?php $form = \yii\bootstrap\ActiveForm::begin([
                            'method' => 'post',
                            'id' => 'login-form',
                            'action' => \yii\helpers\Url::to(['/api/auth/validate-login']),
                            'options' => [
                                'class' => 'border-form login-form',
                                'validationUrl' => \yii\helpers\Url::to(['/api/auth/validate-login']),
                                'validateOnSubmit' => true,
                                'validateOnChange' => true,
                                'validateOnBlur' => false,
                            ]

                        ]) ?>
                        <?= $form->field($loginForm, 'email', [
                            'template' => '{input}{error}',
                            'options' => ['class' => 'input-block border email']
                        ])->input('email', [
                            'class' => 'form-input',
                            'placeholder' => 'Email'
                        ]) ?>

                        <?= $form->field($loginForm, 'password', [
                            'template' => '{input}{error}',
                            'options' => ['class' => 'input-block border password'],
                        ])->input('password', [
                            'class' => 'form-input',
                            'placeholder' => 'Пароль'
                        ]) ?>

                        <div class="btn-wrapper">
                            <button class="btn btn-invert" type="submit">Войти</button>
                        </div>
                        <div class="subscribe">
                            <p>Нет учетной записи ?</p><a href="<?= Url::to('/site/signup') ?>" role="link">Зарегистрируйся!</a>
                            <a href="<?=Url::to(['site/request-password-reset']) ?>">Забыли пароль?</a>
                        </div>
                        <?php \yii\bootstrap\ActiveForm::end(); ?>
                        <div class="registr-status">
                            <div class="no-reg">Нет учетной записи ?</div><a href="<?=Url::to(['/site/signup']) ?>" class="go-reg">Зарегистрируйся!</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="registration dropdown active-item">
                    <div data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="search-icon fa fa-user"></div>
                    <div class="dropdown-menu form menu-wrapper">

                        <?php if(!Yii::$app->user->isGuest){  ?>
                            <ul role="list" class="second-level-menu">
                            <li role="menuitem" class="submenu-hide"><a href="javascript:void(0)" role="link" class="fa-long-arrow-left">Назад</a></li>
                            <li role="menuitem">
                                <a href="<?= Url::to(['profile/index']); ?>" role="link">Личный кабинет</a>
                            </li>
                            <li role="menuitem">
                                <a href="<?= Url::to(['profile/edit-info']) ?>" role="link">Редактировать профиль</a>
                            </li>
                            <!--li role="menuitem"><a href="<!?= Url::to(['profile/my-gallery']) ?>" role="link">Моя
                                    галерея</a></li-->
                            <li role="menuitem"><a href="<?=Url::to(['profile/favorite-articles']) ?>" role="link">Избранные статьи</a></li>
                            <!--li role="menuitem"><a href="<!?=Url::to(['profile/favorite-specialists']) ?!>" role="link">Избранные специалисты</a-->
                            </li>
                            <li role="menuitem"><a href="<?= Url::to(['site/logout']) ?>" role="link">Выйти</a></li>
                            </ul>
                        <?php }else{ ?>
                            <?php  $form = ActiveForm::begin([
                                'id' => 'home-registration-form',
                                'options' => [
                                    'class' => 'border-form registration-form',
                                ],
                                'action'=>\yii\helpers\Url::to(['/api/auth/validate-sign-up']),
                                'enableAjaxValidation'=>true,
                                'validateOnSubmit'=>true,
                                'validateOnChange'=>true,
                                'validateOnBlur'=>false,
                                'validationUrl'=>\yii\helpers\Url::to(['/api/auth/validate-sign-up']),
                            ]);?>

                            <?=$form->field($signUp,'email',[
                            'template'=>'{input}{error}',
                            'options'=>['class'=>'input-block border email'],

                        ])->input('email',[
                            'class'=>'form-input',
                            'placeholder'=>'E-mail'
                        ]) ?>
                            <?=$form->field($signUp,'password',[
                            'template'=>'{input}{error}',
                            'enableAjaxValidation'=>false,
                            'options'=>[
                                'class'=>'input-block border password '
                            ]])->input('password',[
                            'class'=>'form-input',
                            'placeholder'=>'Пароль'
                        ]) ?>

                            <?=$form->field($signUp,'passwordRepeat',[
                            'template'=>'{input}{error}',
                            'enableAjaxValidation'=>false,
                            'options'=>[
                                'class'=>'input-block border password ',
                            ]])->input('password', ['class'=>'form-input',
                            'placeholder'=>'Повтор пароля'
                        ]) ?>
                            <div class="btn-wrapper">
<!--                                <a href="--><?//=Url::to(['/site/signup']) ?><!--" role="button" title="Button" id="registasdasdrate" class="btn">Зарегистрироваться</a>-->
                                <button  role="button" title="Button" id="form-registrate" class="btn">Зарегистрироваться</button>
                            </div>
                            <?php ActiveForm::end(); ?>
                            <div class="registr-status">
                                <div class="reg">Зарегистрируйся,</div>
                                <div class="reg">что бы получить доступ</div>
                                <div class="reg">ко всем возможностям сайта</div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>