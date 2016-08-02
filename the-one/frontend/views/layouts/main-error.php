<?php

\yii\web\YiiAsset::register($this);
\frontend\assets\TheOneBowerAsset::register($this);

\frontend\assets\TheOneLayoutAsset::register($this);
\frontend\assets\AppAsset::register($this);
$this->beginPage(); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <title>The One</title>

    <?= $this->head() ?>

</head>
<?php $this->beginBody() ?>
<body>
<header>
    <div id="preloader">
        <div class="spinner"></div>
    </div>
</header>
<div class="block-404">
    <main role="main" class="block-404-content"><!--img src="/img/icon_404.png"-->
        <h1 role="heading">Ошибка 404<span>Невесту украли, попробуйте найти её на <a href="/" role="link" title="На главную страницу">главной странице.</a>
                <!--/br>Или в нашем <a href="/" role="link" title="На главную страницу">блоге</a-->
            </span>
        </h1>
    </main>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>