<?php
use yii\helpers\Url;
$socials = \yii\helpers\Json::decode($this->context->params['site']['socials']); ?>

<footer role="contentinfo" class="footer">
    <div class="divider-lines"></div>
    <div class="socials-block">
        <ul role="list" class="sosials">
            <?php for ($i = 0; $i < count($socials); $i++) { ?>
                <li role="listitem" class="social-item">
                    <a href="<?= $socials[$i]['url'] ?>" role="link" class="<?= $socials[$i]['social']['class'] ?> socials-link" target="_blank"></a>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="footer-nav-block">
        <ul role="list" class="footer-nav">

            <?php foreach($this->context->footerArticles as $article) : ?>

                <?php if($article->slug !== 'kontakty') : ?>

                    <li role="listitem" class="footer-item"><a href="<?=Url::to(['/article/' . $article->slug]) ?>" role="link" class="footer_nav-link"><?=$article->title ?></a></li>

                <?php else : ?>

                    <li role="listitem" class="footer-item"><a href="<?=Url::to(['/site/contact']) ?>" role="link" class="footer_nav-link"><?=$article->title ?></a></li>

                <?php endif; ?>

            <?php endforeach; ?>

        </ul>
    </div>
    <div class="copyrights">
        <div class="copyright-theone">
            <div>OOO "Гетьман — Фуршет", 2013-<?= date("Y"); ?>.</div>
            <div>Все права на материалы, размещенные на сайте theone-mag.com, охраняются в соответствии с законодательством Украины.</div>
        </div>
        <div class="copyright-reclamare">
            <div class="copyright-reclamare-inn">
                <div>made by</div><a href="https://www.reclamare.ua/" target="_blank"><img src="../images/home/rcl_logo--svg.svg" alt="Reclamare Logo">
                    <svg id="rcl_logo" data-name="rcl logo" xmlns="http://www.w3.org/2000/svg" viewbox="0 0 48 24">
                        <defs>
                            <style>.cls-11, .cls-22{fill:#5c6366;}</style>
                        </defs>
                        <path id="rcl_cloud" data-name="rcl cloud" d="M27.1,10.2L24.7,10A11.6,11.6,0,0,0,14,17H13.1A11.6,11.6,0,0,0,2.3,24H0a12.6,12.6,0,0,1,11.7-8.1h1A12.6,12.6,0,0,1,24.3,8a12.4,12.4,0,0,1,3.7.5l-0.9,1.6h0v0.1ZM46.5,24a11.7,11.7,0,0,0-8.1-3.2l-2.1.2a10.9,10.9,0,0,0-.4-2.8l0.7-.4a12.9,12.9,0,0,1,.3,2.7l2.3-.2A12.4,12.4,0,0,1,48,24H46.5ZM21.7,19.2H21.5c-3,0-5.4,2.2-6.5,4.8H13.5a8.5,8.5,0,0,1,8.8-5.5l-0.7.7h0.1Z" class="cls-11"></path>
                        <path id="rcl_rocket" data-name="rcl rocket" d="M40.2,14.9a16.8,16.8,0,0,1-12.3,5.2l-2.4-2.4A17.2,17.2,0,0,1,30.6,5.2,16.4,16.4,0,0,1,45.1.2a16.9,16.9,0,0,1-4.9,14.7h0Zm-9-9.2a16.7,16.7,0,0,0-5,11.4l0.5,0.5a23.4,23.4,0,0,1,5.6-9.5,2.1,2.1,0,0,0,.5,1.8c0.9,0.9,2.7.6,4-.7s1.6-3.2.7-4.1a1.9,1.9,0,0,0-1.3-.5A19,19,0,0,1,44.5.8a14.72,14.72,0,0,0-13,4.6Zm5.1,3c-1.1,1.1-2.6,1.4-3.4.7s-0.5-2.3.7-3.4,2.6-1.4,3.4-.7,0.5,2.3-.7,3.4h0Zm-11.8,6A7.9,7.9,0,0,0,21.9,13a5.7,5.7,0,0,1,3.6-.7,16.7,16.7,0,0,0-.3,3.2l-0.6-.7h0ZM23,20.5a1.8,1.8,0,0,0-1.1.6c0.1-2.2,2.3-2.7,3.8-2.4a2.1,2.1,0,0,1-.8,2,1.9,1.9,0,0,0,2-.8,2.9,2.9,0,0,1-1.5,3.5,0.6,0.6,0,0,0-.1-0.7c-0.9-.3-1.2,1.8-3.5,1,1.1-.7.1-2.7,1.2-3.2h0Zm9.5,3.2A8,8,0,0,0,30.8,21l-0.7-.6a16,16,0,0,0,3.1-.3,5.8,5.8,0,0,1-.7,3.7h0V23.7Z" class="cls-22"></path>
                    </svg></a>
                <div>with<i class="love fa fa-heart"></i></div>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var all_img = $('img');
        all_img.attr('alt', 'Свадебный журнал');
        all_img.attr('title', 'Идеи для свадьбы от theone-mag.com');
    });
</script>