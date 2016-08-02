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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?= \yii\helpers\Html::csrfMetaTags() ?>

    <title><?=$this->title ?></title>
    <style>


        #preloader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            background: #f9c;
            z-index: 100500;
            will-change: transform, opacity;
            transition: .275s .15s ease-in-out;
        }

        #preloader .spinner {
            width: 270px;
            height: 90px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background: url('<?=Yii::$app->params['frontEndDomain']?>/preloader.gif') no-repeat 50% 50%;
        }

    </style>

        <title><?= \yii\bootstrap\Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    <link rel="stylesheet" href="/css/site.css">


    <?= $this->render('label-styles')?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="preloader">
    <div class="spinner"></div>
</div>
<header>
    <?=$this->render('left');?>
</header>
<?php frontend\components\OneNotify::showNotifies(); ?>
<div class="content">
    <?=$content;?>
</div>
<?=$this->render('notify');?>
<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>