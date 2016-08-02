<aside class="main-sidebar">
    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset; ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <?php if(Yii::$app->user->identity) : ?>
                    <p><?= Yii::$app->user->identity->fullName; ?></p>
                <?php endif; ?>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->

        <!-- /.search form -->

        <?php
        $additions = [];
            if(Yii::$app->user->can('admin')){

            }

        ?>

        <?= \backend\widgets\AdminMenu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Материалы', 'icon' => 'fa fa-file-code-o', 'url' => ['/#'],'items'=>[

                        ['label' => 'Афиша', 'icon' => 'fa fa-star', 'url' => ['/#'],'items'=>[
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['poster/index']],
                            ['label' => 'Создать материал', 'icon' => 'fa  fa-file-o', 'url' => ['poster/create']],
                        ]],

                        ['label' => 'Невеста', 'icon' => 'fa fa-lightbulb-o ', 'url' => ['/#'],'items'=>[
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/article/index/advices-and-ideas']],
                            ['label' => 'Создать материал', 'icon' => 'fa  fa-file-o', 'url' => ['/article/create/advices-and-ideas']],
                        ]],

                        ['label' => 'События', 'icon' => 'fa fa-newspaper-o', 'url' => ['#'],'items'=>[
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/article/index/the-one-news']],
                            ['label' => 'Создать новость', 'icon' => 'fa  fa-file-o', 'url' => ['/article/create/the-one-news']],
                        ]],
                        ['label' => 'Свадьба', 'icon' => 'fa fa-birthday-cake', 'url' => ['#'],'items'=>[
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/article/index/creative-weddings']],
                            ['label' => 'Создать материал', 'icon' => 'fa  fa-file-o', 'url' => ['/article/create/creative-weddings']],
                        ]],

                        ['label' => 'Lifestyle', 'icon' => 'fa fa-heart .hidden-md', 'url' => ['#'],'items'=>[
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/article/index/honeymoon']],
                            ['label' => 'Создать материал', 'icon' => 'fa  fa-file-o', 'url' => ['/article/create/honeymoon']],
                        ]],

                        ['label' => 'Мастер классы', 'icon' => 'fa fa-star', 'url' => ['#'],'items'=>[
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/article/index/workshops']],
                            ['label' => 'Создать материал', 'icon' => 'fa  fa-file-o', 'url' => ['/article/create/workshops']],
                        ]],
                        ['label' => 'Интервью', 'icon' => 'fa fa-star', 'url' => ['#'],'items'=>[
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/article/index/interview']],
                            ['label' => 'Создать материал', 'icon' => 'fa  fa-file-o', 'url' => ['/article/create/interview']],
                        ]],

                        ['label' => 'Репортажи', 'icon' => 'fa fa-coffee', 'url' => ['#'],'items'=>[
                            ['label' => 'Репортажи', 'icon' => 'fa fa-list', 'url' => ['/article/index/articles']],
                            ['label' => 'Создать репортаж', 'icon' => 'fa  fa-file-o', 'url' => ['/article/create/articles']],
                        ]],

                        ['label' => 'Цвета', 'icon' => 'fa fa-paint-brush', 'url' => ['/color/index']],
                        ['label' => 'Атрибуты', 'icon' => 'fa fa-file-code-o', 'url' => ['/terms']],
                        ['label' => 'Настройки', 'icon' => 'fa fa-file-code-o', 'url' => ['/article-preferences']],
                        ['label' => 'Футер', 'icon' => 'fa fa-star', 'url' => ['#'],'items'=>[
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/article/index/additional']],
                            ['label' => 'Создать материал', 'icon' => 'fa  fa-file-o', 'url' => ['/article/create/additional']],
                        ]],
                    ]],
                    ['label' => 'Пользователи', 'icon' => 'fa fa-users', 'url' => ['#'],'items'=>[
                        ['label' => 'Список', 'icon' => 'fa  fa-file-o', 'url' => ['/user']],
                        ['label' => 'Группы профессионалов', 'icon' => 'fa  fa-file-o', 'url' => ['/professional-group']],
                        ['label' => 'Комментарии', 'icon' => 'fa  fa-file-o', 'url' => ['/comment']],
                    ]],
                    ['label' => 'Баннеры', 'icon' => 'fa fa-file-code-o', 'url' => ['/banner'] ],
                    ['label' => 'The One Girls', 'icon' => 'fa fa-file-code-o', 'url' => ['/team'] ],
                    ['label' => 'Журнал', 'icon' => 'fa fa-file-code-o', 'url' => ['/magazine'] ],
                    ['label' => 'Настройки', 'icon' => 'fa fa-file-code-o', 'url' => ['/settings'] ],
                ],
            ]
        ) ?>

    </section>

</aside>
