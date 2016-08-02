<div class="articles-block first"><a href="<?=$mainPageSettings['block_1_url'] ?>" class="home-block">
        <div class="home-block-img"><img src="<?=$this->getImgUrl($mainPageSettings['block_1_image'])?>" alt="Home img"></div>
        <div class="home-block-description">
            <h2 class="home-block-description-text"> <?= $mainPageSettings['block_1_heading']?></h2>
            <h3 class="home-block-description-text"><?= $mainPageSettings['block_1_subheading']?></h3>
        </div></a>
    <a href="<?=$mainPageSettings['block_2_url'] ?>" class="home-block small">
        <div class="home-block-img"><img src="<?=$this->getImgUrl($mainPageSettings['block_2_image'])?>" alt="Home img"></div>
        <div class="home-block-description">
            <h2 class="home-block-description-text"><?= $mainPageSettings['block_2_heading']?></h2>
            <h3 class="home-block-description-text"><?= $mainPageSettings['block_2_subheading']?></h3>
        </div>
        <div class="home-block-hover"><i class="corner top-left"></i><i class="corner top-right"></i><i class="corner bottom-left"></i><i class="corner bottom-right"></i>
            <h2 class="home-block-hover-title"><?= $mainPageSettings['block_2_heading']?></h2>
            <h3 class="home-block-subtitle"><?= $mainPageSettings['block_2_subheading']?></h3>
        </div>
    </a>
</div>
<div class="magazine-description-block">
    <div class="magazine-description">
        <!-- TODO:Make image changeable-->
        <div class="magazine-img"><img src="/images/the-one-name.png" alt=""></div>
        <p class="magazine-text">
            <?= $mainPageSettings['main_page_text']?>
        </p>
    </div>
</div>
<div class="articles-block second">
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['the-one-news'])?array_shift($feeds['the-one-news']):false,
    ]); ?>
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['advices-and-ideas'])?array_shift($feeds['advices-and-ideas']):false,
    ]); ?>
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['honeymoon'])?array_shift($feeds['honeymoon']):false,
    ]); ?>
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['creative-weddings'])?array_shift($feeds['creative-weddings']):false,
    ]); ?>


    <?php if(isset($this->context->banners['center'])){ ?>
        <div class="banner-block">
            <?php foreach($this->context->banners['center'] as $value) {?>
                <a href="<?=\yii\helpers\Url::to([$value->url]) ?>">
                    <img src="<?=$this->getImgUrl($value->banner,'bannerFullWidth')?>" alt="">
                </a>
            <?php } ?>

        </div>
    <?php  }else{ ?>
        <div class="banner-block">
            <div class="banner-type-one">
                <div class="divider-top"></div>
                <div class="title">Свадебные тренды</div>
                <div class="sub-title">Место для баннера</div>
                <div class="divider-bottom"></div>
            </div>
        </div>
    <?php } ?>

</div>
<div class="articles-block third">
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['the-one-news'])?array_shift($feeds['articles']):false,
    ]); ?>
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['creative-weddings'])?array_shift($feeds['creative-weddings']):false,
    ]); ?>
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['workshops'])?array_shift($feeds['workshops']):false,
    ]); ?>

</div>
<div class="articles-block fifth">
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['creative-weddings'])?array_shift($feeds['creative-weddings']):false,
    ]); ?>
    <!--    <a href="#" class="home-block">-->
    <!--        <div class="home-block-img"><img src="http://theone.reclamare.ua/img/block_1_image_0e225619527aa12e39f60b1d70c47b01.jpg" alt="Home img"></div>-->
    <!--        <div class="home-block-description">-->
    <!--            <h1 class="home-block-description-text">Флористы</h1>-->
    <!--            <h3 class="home-block-description-text">на свадьбу</h3>-->
    <!--        </div>-->
    <!--        <div class="home-block-hover"><i class="corner top-left"></i><i class="corner top-right"></i><i class="corner bottom-left"></i><i class="corner bottom-right"></i>-->
    <!--            <div class="hover-block-description">-->
    <!--                <h1>Флористы</h1>-->
    <!--            </div>-->
    <!--            <div class="stats"><span class="fa-eye">3254</span><span class="fa-clock-o">22.09.2015</span></div>-->
    <!--        </div>-->
    <!--    </a>-->
</div>
<?=$this->render('index/registration-block',[
    'signUp'=>$signUp
])?>
<div class="articles-block fourth">
    <div href="#" class="home-block advertisement">
        <a href="<?=$mainPageSettings['ads_1_link']; ?>">
            <div class="label label-color-gray">Реклама</div>
            <div class="home-block-img"><img src="<?=$this->getImgUrl($mainPageSettings['ads_1_image']) ?>" alt="Home img" class="align-width"></div>
        </a>
    </div>

    <div href="#" class="home-block advertisement">
        <a href="<?=$mainPageSettings['ads_2_link']; ?>">
            <div class="label label-color-gray">Реклама</div>
            <div class="home-block-img"><img src="<?=$this->getImgUrl($mainPageSettings['ads_2_image']) ?>" alt="Home img"></div>
        </a>
    </div>
    <div href="#" class="home-block advertisement">
        <a href="<?=$mainPageSettings['ads_3_link']; ?>">
            <div class="label label-color-gray">Реклама</div>
            <div class="home-block-img"><img src="<?=$this->getImgUrl($mainPageSettings['ads_3_image']) ?>" alt="Home img"></div>
        </a>
    </div>

    <div class="divider center"></div>

    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['the-one-news'])?array_shift($feeds['the-one-news']):false,
    ]); ?>
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['advices-and-ideas'])?array_shift($feeds['advices-and-ideas']):false,
    ]); ?>
    <?= $this->render('index/home-block', [
        'item' => !empty($feeds['honeymoon'])?array_shift($feeds['honeymoon']):false,
    ]); ?>
</div>
<div class="instagram-block">
    <div class="divider-block">
        <h2 class="divider-block-heading">The One Life</h2>
        <div class="divider"></div>
    </div>
    <div class="gallery-wrapper" id="instagram-home">
        <div class="label label-color-dark-blue">Instagram</div>
        <div id="instagram-items" data-bind="foreach:$root.photos">
            <div
                data-bind="
                    attr:{
                        href:images.standard_resolution.url,
                        title:caption.text
                    },
                    visible:$index()<12
                " class="gallery-item">
                <img data-bind="attr:{
                        src:images.thumbnail.url
                        }" alt="Gallery img">
            </div>
        </div>
    </div>
</div>
<?php if(Yii::$app->session->getFlash('registration-successful')){
    Yii::$app->view->registerJs('window.rclNotify("alert-info","Вы успешно зарегистрировались!!!!!!!!!!")',\yii\web\View::POS_READY);
} ?>