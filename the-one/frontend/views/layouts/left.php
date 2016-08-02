<?php
use yii\helpers\Url;

$loginForm = $this->context->loginForm;
$linksOfSubcats = $this->context->linksOfSubcats;
$socials = \yii\helpers\Json::decode($this->context->params['site']['socials']);
?>
<div class="nav-shell login">
    <nav role="navigation" id="navigation" class="nav">
        <div id="burger" class="burger"><span></span><span></span><span></span></div>
        <div class="nav-header-xs">
            <div class="nav-logo">
                <a href="/">
                    <svg id="logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 115.02 38.37">
                        <title></title>
                        <path
                            d="M19.34,38.37A19.28,19.28,0,0,1,0,19.19a19.34,19.34,0,0,1,38.67,0A19.28,19.28,0,0,1,19.34,38.37Zm0-35a15.87,15.87,0,1,0,16,15.87A15.87,15.87,0,0,0,19.34,3.32Z"
                            transform="translate(0 0)" class="cls-1"></path>
                        <path
                            d="M95.68,38.37A19.6,19.6,0,0,1,82,33a18.37,18.37,0,0,1-5.66-13.4A19.62,19.62,0,0,1,82,5.84a19.25,19.25,0,0,1,27.22-.4l0.13,0.13a19.62,19.62,0,0,1,5.66,14,1.47,1.47,0,0,1-1.34,1.59H79.51C80.33,29,87.28,35,95.68,35c8.67,0,12.46-3.83,15.48-9.59A1.66,1.66,0,0,1,114.1,27C111.15,32.63,106.65,38.37,95.68,38.37ZM79.5,18.19h32c-0.77-8.44-7.25-14.87-15.83-14.87C87.54,3.32,80.35,10.11,79.5,18.19Z"
                            transform="translate(0 0)" class="cls-1"></path>
                        <path
                            d="M27.07,25.63a3.38,3.38,0,0,1-3.43-3.33s0,0,0-.07a3.49,3.49,0,0,1,3.43-3.54,3.45,3.45,0,0,1,3.43,3.47v0.07a0.43,0.43,0,0,1-.43.43H24.54a2.53,2.53,0,0,0,2.54,2.11,2.56,2.56,0,0,0,2.28-1.4,0.43,0.43,0,0,1,.76.39A3.42,3.42,0,0,1,27.07,25.63ZM24.53,21.8H29.6a2.54,2.54,0,0,0-2.54-2.25,2.65,2.65,0,0,0-2.52,2.26h0Z"
                            transform="translate(0 0)" class="cls-1"></path>
                        <path
                            d="M71.6,38.27a1.63,1.63,0,0,1-1.28-.62L45.5,6.51v30.1a1.51,1.51,0,1,1-3,0V1.76A1.52,1.52,0,0,1,43.44.2,1.23,1.23,0,0,1,45,.73L70.5,33.87V1.76c0-.92.08-1.66,1-1.66a2,2,0,0,1,2,1.66V36.61a1.77,1.77,0,0,1-1.23,1.57A2.42,2.42,0,0,1,71.6,38.27Z"
                            transform="translate(0 0)" class="cls-1"></path>
                        <path
                            d="M12.95,25.62a2.46,2.46,0,0,1-2.45-2.47V13.79a0.51,0.51,0,0,1,1,0v9.33a1.56,1.56,0,0,0,1.45,1.67H13a1.61,1.61,0,0,0,1.6-1.62v0A0.39,0.39,0,0,1,15,22.71h0a0.42,0.42,0,0,1,.42.41A2.49,2.49,0,0,1,12.95,25.62Z"
                            transform="translate(0 0)" class="cls-1"></path>
                        <path
                            d="M14.36,20.19H8.55a0.51,0.51,0,0,1,0-1h5.81a0.59,0.59,0,0,1,.1.78A0.43,0.43,0,0,0,14.36,20.19Z"
                            transform="translate(0 0)" class="cls-1"></path>
                        <path
                            d="M22,25.75a0.5,0.5,0,0,1-.5-0.41V21.19A1.59,1.59,0,0,0,20,19.53H19.93a5.75,5.75,0,0,0-3.61,1.54,0.39,0.39,0,0,1-.55,0l0,0a0.41,0.41,0,0,1,0-.58h0A6.71,6.71,0,0,1,20,18.7a2.5,2.5,0,0,1,2.49,2.49v4.15A0.5,0.5,0,0,1,22,25.75Z"
                            transform="translate(0 0)"></path>
                        <path d="M17,25.62a0.46,0.46,0,0,1-.5-0.41V8a0.51,0.51,0,0,1,1,0V25.2a0.46,0.46,0,0,1-.5.42h0Z"
                              transform="translate(0 0)" class="cls-1"></path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 9">
                        <title>divider</title>
                        <path
                            d="M27.32.94a6.62 6.62 0 0 0-4-.14 3.77 3.77 0 0 0-2.44-.8A7.66 7.66 0 0 0 17 1.12C15.27 2.11 8.55 6.33 6.57 7c-.39.12-.57.67-.77.28a1.31 1.31 0 0 1-.11-.95.1.1 0 0 0-.2 0 1.73 1.73 0 0 0 .15 1.07c.21.43 0 .38-.38.45a6 6 0 0 1-3-.2A2.79 2.79 0 0 1 .37 4.77c.19-1.35 1.88-2.2 3-2.49A6 6 0 0 1 7.62 3a6.57 6.57 0 0 1 .89.59.1.1 0 0 0 .14 0 .1.1 0 0 0 0-.09.66.66 0 0 0-.29-.4 5.9 5.9 0 0 0-1.68-1.21 5 5 0 0 0-4.29 0A3.72 3.72 0 0 0 0 5c0 2 1.92 3 3.53 3.3a8 8 0 0 0 2.36.07A10 10 0 0 0 9 9a8.14 8.14 0 0 0 4.56-1.39c1.8-1.05 3.48-2.29 5.2-3.48 1.33-.93 4-2.32 3.79-2.25.46-.2.92-.58 1.11.09.08.29-.09.8 0 1s.25-.44.25-.49a3.39 3.39 0 0 1-.07-1.05C24 1.53 27.65.49 29 3c2.16 4-4.93 5.14-7.53 2.49l-.14.15c.19.36 1 2.12 4.24 2 1.63-.08 3.68-1 4.28-2.75.66-1.98-.95-3.43-2.53-3.95zm-5.06.2a31.47 31.47 0 0 0-3.11 1.65c-1.38.91-2.76 1.83-4.15 2.77-2.19 1.56-4.78 3.17-7.84 2.74h-.08c1.63-.79 7-4.88 11.5-7.06 1.27-.61 2.76-1.11 4.1-.42.32.11-.38.31-.42.32z"></path>
                    </svg>
                </a>
            </div>
            <div class="divider"></div>
        </div>
        <div class="nav-menu">
            <ul role="menu">

                <li role="menuitem" data-menuid="1" class="sublink"><a href="javascript:void(0)" role="link">
                        О нас</a></li>

                <?php if (isset($linksOfSubcats['the-one-news'])) { ?>
                    <li role="menuitem" data-menuid="10" class="sublink">
                        <a href="javascript:void(0)" role="link">События</a>
                    </li>
                <?php } else { ?>
                    <li role="menuitem" class="sublink">
                        <a href="<?= Url::to(['/the-one-news']) ?>" role="link">События</a>
                    </li>
                <?php } ?>


                <?php if (isset($linksOfSubcats['articles'])) { ?>
                    <li role="menuitem" data-menuid="15" class="sublink">
                        <a href="javascript:void(0)" role="link">
                            Репортажи
                        </a>
                    </li>
                <?php } else { ?>
                    <li role="menuitem">
                        <a href="<?= Url::to(['/articles']) ?>" role="link">
                            Репортажи
                        </a>
                    </li>
                <?php } ?>

                <?php if (isset($linksOfSubcats['interview'])) { ?>
                    <li role="menuitem" data-menuid="25" class="sublink">
                        <a href="javascript:void(0)" role="link">
                            Интервью
                        </a>
                    </li>
                <?php } else { ?>
                    <li role="menuitem">
                        <a href="<?= Url::to(['/interview']) ?>" role="link">
                            Интервью
                        </a>
                    </li>
                <?php } ?>


                <!--                4 - thematical weddings-->
                <?php if (isset($linksOfSubcats['creative-weddings'])) { ?>
                    <li role="menuitem" data-menuid="4" class="sublink">
                        <a href="javascript:void(0)" role="link">
                            Свадьба
                        </a>
                    </li>
                <?php } else { ?>
                    <li role="menuitem">
                        <a href="<?= Url::to(['/creative-weddings']) ?>" role="link">
                            Свадьба
                        </a>
                    </li>
                <?php } ?>

                <li role="menuitem" data-menuid="2" class="sublink">
                    <a href="javascript:void(0)" role="link">Консультирование</a>
                </li>




                <!--                    6 - honeymoon-->



<!--                <li role="menuitem">-->
<!--                    <a href="##" role="link">Авторский проэкт</a>-->
<!--                </li>-->


                <!--                3 - advices and ideas-->
                <?php if (isset($linksOfSubcats['advices-and-ideas'])) { ?>
                    <li role="menuitem" data-menuid="3" class="sublink">
                        <a href="javascript:void(0)" role="link">Невеста</a>
                    </li>
                <?php } else { ?>
                    <li role="menuitem" class="sublink">
                        <a href="<?= Url::to(['/advices-and-ideas']) ?>" role="link">Невеста</a>
                    </li>
                <?php } ?>


                <!--                5 - workshops (TODO:Чё с ней делать то теперь?)-->
                <?php if (false) { ?>
                    <li role="menuitem" data-menuid="5" class="sublink">
                        <a href="javascript:void(0)" role="link">
                            Мастер-классы
                        </a>
                    </li>
                    <?php //} else { ?>
                    <li role="menuitem">
                        <a href="<?= Url::to(['/workshops']) ?>" role="link">
                            Мастер-классы
                        </a>
                    </li>
                <?php } ?>

                <!--                    6 - honeymoon-->
                <?php if (isset($linksOfSubcats['honeymoon'])) { ?>
                    <li role="menuitem" data-menuid="6" class="sublink">
                        <a href="javascript:void(0)" role="link">
                            Lifestyle
                        </a>
                    </li>
                <?php } else { ?>
                    <li role="menuitem">
                        <a href="<?= Url::to(['/honeymoon']) ?>" role="link">
                            Lifestyle
                        </a>
                    </li>
                <?php } ?>





            </ul>
        </div>
        <div class="nav-footer">
            <?php if (Yii::$app->user->isGuest) { ?>
                <div class="nav-footer-block">
                    <div class="divider"></div>
                    <div class="nav-short">
                        <div class="nav-divider">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 9">
                                <title>divider</title>
                                <path
                                    d="M27.32.94a6.62 6.62 0 0 0-4-.14 3.77 3.77 0 0 0-2.44-.8A7.66 7.66 0 0 0 17 1.12C15.27 2.11 8.55 6.33 6.57 7c-.39.12-.57.67-.77.28a1.31 1.31 0 0 1-.11-.95.1.1 0 0 0-.2 0 1.73 1.73 0 0 0 .15 1.07c.21.43 0 .38-.38.45a6 6 0 0 1-3-.2A2.79 2.79 0 0 1 .37 4.77c.19-1.35 1.88-2.2 3-2.49A6 6 0 0 1 7.62 3a6.57 6.57 0 0 1 .89.59.1.1 0 0 0 .14 0 .1.1 0 0 0 0-.09.66.66 0 0 0-.29-.4 5.9 5.9 0 0 0-1.68-1.21 5 5 0 0 0-4.29 0A3.72 3.72 0 0 0 0 5c0 2 1.92 3 3.53 3.3a8 8 0 0 0 2.36.07A10 10 0 0 0 9 9a8.14 8.14 0 0 0 4.56-1.39c1.8-1.05 3.48-2.29 5.2-3.48 1.33-.93 4-2.32 3.79-2.25.46-.2.92-.58 1.11.09.08.29-.09.8 0 1s.25-.44.25-.49a3.39 3.39 0 0 1-.07-1.05C24 1.53 27.65.49 29 3c2.16 4-4.93 5.14-7.53 2.49l-.14.15c.19.36 1 2.12 4.24 2 1.63-.08 3.68-1 4.28-2.75.66-1.98-.95-3.43-2.53-3.95zm-5.06.2a31.47 31.47 0 0 0-3.11 1.65c-1.38.91-2.76 1.83-4.15 2.77-2.19 1.56-4.78 3.17-7.84 2.74h-.08c1.63-.79 7-4.88 11.5-7.06 1.27-.61 2.76-1.11 4.1-.42.32.11-.38.31-.42.32z"></path>
                            </svg>
                        </div>
                        <button type="button" role="button" class="fa-user"></button>
                    </div>
                    <div class="nav-footer-content absolute">
                        <button type="button" role="button" data-menuid="7" class="btn sublink">Войти</button>
                    </div>
                </div>
            <?php } else { ?>
                <div class="nav-footer-block logined"><span class="fa-angle-right"></span>

                    <div class="divider"></div>
                    <div class="nav-short">
                        <div class="nav-divider">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 9">
                                <title>divider</title>
                                <path
                                    d="M27.32.94a6.62 6.62 0 0 0-4-.14 3.77 3.77 0 0 0-2.44-.8A7.66 7.66 0 0 0 17 1.12C15.27 2.11 8.55 6.33 6.57 7c-.39.12-.57.67-.77.28a1.31 1.31 0 0 1-.11-.95.1.1 0 0 0-.2 0 1.73 1.73 0 0 0 .15 1.07c.21.43 0 .38-.38.45a6 6 0 0 1-3-.2A2.79 2.79 0 0 1 .37 4.77c.19-1.35 1.88-2.2 3-2.49A6 6 0 0 1 7.62 3a6.57 6.57 0 0 1 .89.59.1.1 0 0 0 .14 0 .1.1 0 0 0 0-.09.66.66 0 0 0-.29-.4 5.9 5.9 0 0 0-1.68-1.21 5 5 0 0 0-4.29 0A3.72 3.72 0 0 0 0 5c0 2 1.92 3 3.53 3.3a8 8 0 0 0 2.36.07A10 10 0 0 0 9 9a8.14 8.14 0 0 0 4.56-1.39c1.8-1.05 3.48-2.29 5.2-3.48 1.33-.93 4-2.32 3.79-2.25.46-.2.92-.58 1.11.09.08.29-.09.8 0 1s.25-.44.25-.49a3.39 3.39 0 0 1-.07-1.05C24 1.53 27.65.49 29 3c2.16 4-4.93 5.14-7.53 2.49l-.14.15c.19.36 1 2.12 4.24 2 1.63-.08 3.68-1 4.28-2.75.66-1.98-.95-3.43-2.53-3.95zm-5.06.2a31.47 31.47 0 0 0-3.11 1.65c-1.38.91-2.76 1.83-4.15 2.77-2.19 1.56-4.78 3.17-7.84 2.74h-.08c1.63-.79 7-4.88 11.5-7.06 1.27-.61 2.76-1.11 4.1-.42.32.11-.38.31-.42.32z"></path>
                            </svg>
                        </div>
                        <div class="img-block">
                            <?php //TODO ?>
                            <img
                                src="<?= Yii::$app->user->identity->avatar ? $this->getImgUrl(Yii::$app->user->identity->avatar, 'icon') : '/images/no-image.gif' ?>"
                                alt=""></div>
                    </div>
                    <div class="nav-footer-content absolute">
                        <div id="sub-link-4" data-menuid="8" class="logined-user sublink">
                            Привет,<br> <?= Yii::$app->user->identity->fullName ? Yii::$app->user->identity->fullName : ' пользователь' ?>
                            <span>Личный кабинет</span></div>
                    </div>
                </div>
            <?php } ?>
            <div class="nav-footer-block">
                <div class="nav-short">
                    <div class="nav-divider">
                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 30 9">
                            <title>divider</title>
                            <path
                                d="M27.32.94a6.62 6.62 0 0 0-4-.14 3.77 3.77 0 0 0-2.44-.8A7.66 7.66 0 0 0 17 1.12C15.27 2.11 8.55 6.33 6.57 7c-.39.12-.57.67-.77.28a1.31 1.31 0 0 1-.11-.95.1.1 0 0 0-.2 0 1.73 1.73 0 0 0 .15 1.07c.21.43 0 .38-.38.45a6 6 0 0 1-3-.2A2.79 2.79 0 0 1 .37 4.77c.19-1.35 1.88-2.2 3-2.49A6 6 0 0 1 7.62 3a6.57 6.57 0 0 1 .89.59.1.1 0 0 0 .14 0 .1.1 0 0 0 0-.09.66.66 0 0 0-.29-.4 5.9 5.9 0 0 0-1.68-1.21 5 5 0 0 0-4.29 0A3.72 3.72 0 0 0 0 5c0 2 1.92 3 3.53 3.3a8 8 0 0 0 2.36.07A10 10 0 0 0 9 9a8.14 8.14 0 0 0 4.56-1.39c1.8-1.05 3.48-2.29 5.2-3.48 1.33-.93 4-2.32 3.79-2.25.46-.2.92-.58 1.11.09.08.29-.09.8 0 1s.25-.44.25-.49a3.39 3.39 0 0 1-.07-1.05C24 1.53 27.65.49 29 3c2.16 4-4.93 5.14-7.53 2.49l-.14.15c.19.36 1 2.12 4.24 2 1.63-.08 3.68-1 4.28-2.75.66-1.98-.95-3.43-2.53-3.95zm-5.06.2a31.47 31.47 0 0 0-3.11 1.65c-1.38.91-2.76 1.83-4.15 2.77-2.19 1.56-4.78 3.17-7.84 2.74h-.08c1.63-.79 7-4.88 11.5-7.06 1.27-.61 2.76-1.11 4.1-.42.32.11-.38.31-.42.32z"></path>
                        </svg>
                    </div>
                    <button type="button" role="button" class="fa-share-alt"></button>
                </div>
                <div class="divider"></div>
                <div class="nav-footer-content absolute last">
                    <div class="social">

                        <ul role="menu">
                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                <li role="menuitem"><a href="<?= $socials[$i]['url'] ?>" role="link"
                                                       class="<?= $socials[$i]['social']['class'] ?>"></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="submenu-shell">
        <ul class="submenu-block">
            <div data-menublock="1" class="submenu">
                <div class="submenu-header">
                    <h3>Свадебный журнал<span>The ONE</span></h3>

                    <div class="divider"></div>
                </div>
                <div class="submenu-navigation">
                    <ul role="menu">
                        <li role="menuitem" class="submenu-hide"><a href="javascript:void(0)" role="link"
                                                                    class="fa-long-arrow-left">Назад</a></li>
                        <li role="menuitem"><a href="<?= Url::to(['site/about']); ?>" role="link">Журнал the ONE</a></li>
                        <li role="menuitem"><a href="<?= Url::to(['/team']); ?>" role="link">Команда the ONE</a></li>
                        <li role="menuitem">
                            <a href="<?= Url::to(['/magazine']); ?>" role="link">Купить журнал
                            </a>
                        </li>
                        <li role="menuitem"><a href="<?= Url::to(['site/contact']) ?>" role="link">Контакты</a></li>
                    </ul>
                </div>
                <div class="submenu-footer">
                    <div class="divider"></div>
                    <a href="<?= $this->context->params['site']['menu_banner_url'] ?>">
                        <img src="<?= $this->getImgUrl($this->context->params['site']['menu_banner_image']) ?>" alt="">
                    </a>
                </div>
            </div>


            <div data-menublock="2" class="submenu prof">
                <div class="submenu-header">
                    <h3>Свадебный журнал<span>The ONE</span></h3>

                    <div class="divider"></div>
                </div>
                <div class="submenu-navigation">
                    <ul role="menu">
                        <li role="menuitem" class="submenu-hide"><a href="javascript:void(0)" role="link"
                                                                    class="fa-long-arrow-left">Назад</a></li>
                    </ul>
                    <div class="icon-block">
                        <?php foreach ($this->context->params['professional-groups'] as $k => $v) {
                            if ($v->user_count > 0) {
                                ?>
                                <a href="<?= Url::to('/professionals/' . $v->slug) ?>" role="link"
                                   class="icon icon-<?= $v->slug ?>"><?= $v->name ?></a>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
                <div class="submenu-footer">
                    <div class="divider"></div>
                </div>
            </div>
            <!--            3 - advices and ideas-->
            <?php if (isset($linksOfSubcats['advices-and-ideas'])) { ?>
                <?= $this->render('left/subcats', [
                    'cat' => 'advices-and-ideas',
                    'id' => 3
                ]) ?>
            <?php } ?>


            <?php if (isset($linksOfSubcats['interview'])) { ?>
                <?= $this->render('left/subcats', [
                    'cat' => 'interview',
                    'id' => 25
                ]) ?>
            <?php } ?>

            <?php if (isset($linksOfSubcats['creative-weddings'])) { ?>
                <?= $this->render('left/subcats', [
                    'cat' => 'creative-weddings',
                    'id' => 4
                ]) ?>
            <?php } ?>

            <?php if (isset($linksOfSubcats['workshops'])) { ?>
                <?= $this->render('left/subcats', [
                    'cat' => 'workshops',
                    'id' => 5
                ]) ?>
            <?php } ?>
            <?php if (isset($linksOfSubcats['honeymoon'])) { ?>
                <?= $this->render('left/subcats', [
                    'cat' => 'honeymoon',
                    'id' => 6
                ]) ?>
            <?php } ?>
            <?php if (isset($linksOfSubcats['the-one-news'])) { ?>
                <?= $this->render('left/subcats', [
                    'cat' => 'the-one-news',
                    'id' => 10
                ]) ?>
            <?php } ?>
            <?php if (isset($linksOfSubcats['articles'])) { ?>
                <?= $this->render('left/subcats', [
                    'cat' => 'articles',
                    'id' => 15
                ]) ?>
            <?php } ?>




            <?php if (Yii::$app->user->isGuest) { ?>
                <div data-menublock="7" class="submenu">
                    <div class="submenu-header">
                        <h3>Вход</h3>

                        <div class="divider"></div>
                    </div>
                    <div class="submenu-navigation">
                        <ul role="menu">
                            <li role="menuitem" class="submenu-hide"><a href="javascript:void(0)" role="link"
                                                                        class="fa-long-arrow-left">Назад</a></li>
                        </ul>
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
                    </div>
                    <div class="submenu-footer absolute">
                        <div class="divider"></div>
                    </div>
                </div>
            <?php } else { ?>
                <div data-menublock="8" class="submenu">
                    <div class="submenu-header">
                        <h3>Профиль пользователя</h3>

                        <div class="divider"></div>
                    </div>
                    <div class="submenu-navigation">
                        <ul role="menu">
                            <?php if (Yii::$app->user->can('activated')) { ?>
                                <li role="menuitem" class="submenu-hide"><a href="javascript:void(0)" role="link"
                                                                            class="fa-long-arrow-left">Назад</a></li>
                                <li role="menuitem"><a href="<?= Url::to(['profile/edit-info']) ?>" role="link">Редактировать
                                        профиль</a>
                                </li>
                                <li role="menuitem"><a href="<?= Url::to(['profile/my-gallery']) ?>" role="link">Моя
                                        галерея</a></li>
                                <li role="menuitem"><a href="<?=Url::to(['profile/favorite-articles']) ?>" role="link">Избранные статьи</a></li>
                                <li role="menuitem"><a href="<?=Url::to(['profile/favorite-specialists']) ?>" role="link">Избранные специалисты</a>
                                </li>
                                <li role="menuitem"><a href="<?= Url::to(['site/logout']) ?>" role="link">Выйти</a></li>
                            <?php } else { ?>
                                <li role="menuitem"><span style="color:white;padding:2.6rem;display:block">Ваш аккаунт не активирован.Для активации аккаунта пройдите по ссылке,
                                        которое было вам отправлено после регистрации</span></li>
                                <li>
                                    <div class="divider"></div>
                                </li>
                                <li role="menuitem"><a href="javascript:void(0)" role="link">Отправить письмо еще
                                        раз</a></li>
                                <li role="menuitem"><a href="<?= Url::to(['site/logout']) ?>" role="link">Выйти из
                                        аккаунта</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="submenu-footer absolute">
                        <div class="divider"></div>
                    </div>
                </div>
            <?php } ?>
        </ul>
    </div>
</div>