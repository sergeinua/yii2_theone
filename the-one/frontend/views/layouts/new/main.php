<?php
\yii\web\YiiAsset::register($this);
\frontend\assets\TheOneBowerAsset::register($this);
\frontend\assets\TheOneNewLayoutAsset::register($this);
\frontend\assets\AppAsset::register($this);
$this->beginPage(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta property="og:url" content="<?= \yii\helpers\Url::to($_SERVER["REQUEST_URI"],true); ?>" />
    <meta property="og:type" content="article" />


    <?= \yii\helpers\Html::csrfMetaTags() ?>

    <title><?=$this->title ?></title>
    <!--link rel="stylesheet" href="./../css/styles.css"-->
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
            background: url('../images/preloader.gif') no-repeat 50% 50%;
        }
    </style>
    <?php $this->head() ?>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-257662-64', 'auto');
        ga('send', 'pageview');

    </script>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render('header')?>
<?=$content;?>

<?=$this->render('footer'); ?>
<?=$this->render('notify');?>
<!--<script src="./../js/jquery.min.js"></script>-->
<!--<script src="./../../bower_components/jquery-ui/ui/core.js"></script>-->
<!--<script src="./../../bower_components/jquery-ui/ui/widget.js"></script>-->
<!--<script src="./../../bower_components/jquery-ui/ui/mouse.js"></script>-->
<!--<script src="./../../bower_components/jquery-ui/ui/sortable.js"></script>-->
<!--<script src="./../../bower_components/knockout/dist/knockout.js"></script>-->
<!--<script src="./../../bower_components/knockout-sortable/build/knockout-sortable.js"></script>-->
<!--<script src="./../js/drag.js"></script>-->
<!--<script src="./../js/dropdown.js"></script>-->
<!--<script src="./../js/transition.js"></script>-->
<!--<script src="./../js/modal.js"></script>-->
<!--<script src="./../js/tab.js"></script>-->
<!--<script src="./../js/alert-ko.js"></script>-->
<!--<script src="../../bower_components/magnific-popup/dist/jquery.magnific-popup.js"></script>-->
<!--<script src="../../bower_components/select2/dist/js/select2.min.js"></script>-->
<!--<script src="./../js/owl.carousel.min.js"></script>-->
<!--<script src="http://maps.googleapis.com/maps/api/js?libraries=places&language=ru"></script>-->
<!--<script src="../../bower_components/Swiper/dist/js/swiper.min.js"></script>-->
<!--<script src="./../js/app.js"></script>-->
<!--<script src="./../components/bundle.js"></script>-->
<!--<script src="./../js/geocode.js"></script>-->
<!--<script src="./../js/kn-social.js"></script>-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage(); ?>