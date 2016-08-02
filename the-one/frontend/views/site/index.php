<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container-content homepage">
<div class="swiper-container homepage-slider">
    <div class="swiper-wrapper">

        <?php if($mainPageSettings['slide1_image']) : ?>
            <?php if($mainPageSettings['slide1_image']) { ?>
                <div onclick="window.open('<?= $mainPageSettings['slide1_link']; ?>', '_blank')" style="background-image:url(<?= $this->getImgUrl($mainPageSettings['slide1_image']); ?>)" class="swiper-slide"></div>
            <?php } ?>
        <?php endif; ?>

        <?php if($mainPageSettings['slide2_image']) : ?>
            <?php if($mainPageSettings['slide2_image']) { ?>
                <div onclick="window.open('<?= $mainPageSettings['slide2_link']; ?>', '_blank')" style="background-image:url(<?= $this->getImgUrl($mainPageSettings['slide2_image']); ?>)" class="swiper-slide"></div>
            <?php } ?>
        <?php endif; ?>

        <?php if($mainPageSettings['slide3_image']) : ?>
            <?php if($mainPageSettings['slide3_image']) { ?>
                <div onclick="window.open('<?= $mainPageSettings['slide3_link']; ?>', '_blank')" style="background-image:url(<?= $this->getImgUrl($mainPageSettings['slide3_image']); ?>)" class="swiper-slide"></div>
            <?php } ?>
        <?php endif; ?>

        <?php if($mainPageSettings['slide4_image']) : ?>
            <?php if($mainPageSettings['slide4_image']) { ?>
                <div onclick="window.open('<?= $mainPageSettings['slide4_link']; ?>', '_blank')" style="background-image:url(<?= $this->getImgUrl($mainPageSettings['slide4_image']); ?>)" class="swiper-slide"></div>
            <?php } ?>
        <?php endif; ?>

        <?php if($mainPageSettings['slide5_image']) : ?>
            <?php if($mainPageSettings['slide5_image']) { ?>
                <div onclick="window.open('<?= $mainPageSettings['slide5_link']; ?>', '_blank')" style="background-image:url(<?= $this->getImgUrl($mainPageSettings['slide5_image']); ?>)" class="swiper-slide"></div>
            <?php } ?>
        <?php endif; ?>

        <?php if($mainPageSettings['slide6_image']) : ?>
            <?php if($mainPageSettings['slide6_image']) { ?>
                <div onclick="window.open('<?= $mainPageSettings['slide6_link']; ?>', '_blank')" style="background-image:url(<?= $this->getImgUrl($mainPageSettings['slide6_image']); ?>)" class="swiper-slide"></div>
            <?php } ?>
        <?php endif; ?>

        <?php if($mainPageSettings['slide7_image']) : ?>
            <?php if($mainPageSettings['slide7_image']) { ?>
                <div onclick="window.open('<?= $mainPageSettings['slide7_link']; ?>', '_blank')" style="background-image:url(<?= $this->getImgUrl($mainPageSettings['slide7_image']); ?>)" class="swiper-slide"></div>
            <?php } ?>
        <?php endif; ?>

        <?php if($mainPageSettings['slide8_image']) : ?>
            <?php if($mainPageSettings['slide8_image']) { ?>
                <div onclick="window.open('<?= $mainPageSettings['slide8_link']; ?>', '_blank')" style="background-image:url(<?= $this->getImgUrl($mainPageSettings['slide8_image']); ?>)" class="swiper-slide"></div>
            <?php } ?>
        <?php endif; ?>

    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
    <div class="main-event-block">
    <div class="divider-lines"><span>События</span></div>
    <div class="home-block-container">
        <?php foreach($feeds as $feed){
            echo $this->render('index/home-block',['feed'=>$feed]);?>
        <?php } ?>
        <div  class="home-block advertise-block">
            <a href="<?=$mainPageSettings['ads_3_link']; ?>" target=_blank>
                <div class="label label-color-gray">Реклама</div>
                <div class="home-block-img"><img src="<?=$this->getImgUrl($mainPageSettings['ads_3_image']) ?>" alt="Home img"></div>
            </a>
        </div>

        <div class="home-block advertise-block">
            <a href="<?=$mainPageSettings['ads_2_link']; ?>" target=_blank>
                <div class="label label-color-gray">Реклама</div>
                <div class="home-block-img"><img src="<?=$this->getImgUrl($mainPageSettings['ads_2_image']) ?>" alt="Home img"></div>
            </a>
        </div>
        <div class="home-block advertise-block">
            <a href="<?=$mainPageSettings['ads_1_link']; ?>" target=_blank>
                <div class="label label-color-gray">Реклама</div>
                <div class="home-block-img"><img src="<?=$this->getImgUrl($mainPageSettings['ads_1_image']) ?>" alt="Home img"></div>
            </a>
        </div>
    </div>

    <?php if(isset($this->context->banners['center'])){ ?>
        <div class="divider-lines"></div>
        <div class="banner-block">
            <?php foreach($this->context->banners['center'] as $value) {?>
                <a href="<?= $value->url; ?>">
                    <img src="<?=$this->getImgUrl($value->banner,'bannerFullWidth')?>" alt="">
                </a>
            <?php } ?>

        </div>
    <?php  }else{ ?>
        <!--div class="banner-block">
            <div class="banner-type-one">
                <div class="divider-top"></div>
                <div class="title">Свадебные тренды</div>
                <div class="sub-title">Место для баннера</div>
                <div class="divider-bottom"></div>
            </div>
        </div-->
    <?php } ?>
</div>
    <div class="magazine-slider">
        <div class="divider-lines"><span>Журнал</span></div>
        <div class="swiper-container swiper-2">
            <div class="swiper-wrapper">
                <?php foreach($magazines as $magazine): ?>
                    <a href="<?=Url::to(['magazine/'.$magazine->id])?>"
                       style="background-image:url(<?=$this->getImgUrl($magazine->cover); ?>)"
                       class="swiper-slide"></a>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next swiper-magazines-button-next"></div>
            <div class="swiper-button-prev swiper-magazines-button-prev"></div>

        </div>
        <div class="divider-lines modify"></div>

        <div class="subscribe-block">
            <div class="title">Подписаться на рассылку</div>
            <form id="subscribe_form" class="subscribe-form" action="<?= Url::toRoute('site/subscribe'); ?>" method="post">
                <input id="customer_name" type="text" role="textbox" placeholder="Ваше имя" class="subscribe-field required">
                <input id="customer_tel" type="text" role="textbox" placeholder="Номер телефона" class="subscribe-field">
                <input id="customer_email" type="email" role="textbox" placeholder="е-mail" class="subscribe-field required">
                <button id="subscribe" href="#" role="button" title="Button" type="submit" class="btn-dark">Подписаться</button>
            </form>
            <div class="submit">
                <p class="msg-error"><span>*</span><span> Эти поля обязательны к заполнению</span></p>
            </div>
        </div>

        <p class="subscribe_notification"></p>

        <!--div class="divider-lines"></div-->

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

    <script>
        $(document).ready(function () {
            var form = $('#subscribe_form');
            /*var btn = $('#submit');*/
            $('#customer_tel').attr('maxlength', '14');

            $(function(){
                $("#customer_tel").mask("(999) 999-9999");
                $("#customer_tel").on("blur", function() {
                    var last = $(this).val().substr( $(this).val().indexOf("-") + 1 );
                    if( last.length == 5 ) {
                        var move = $(this).val().substr( $(this).val().indexOf("-") + 1, 1 );
                        var lastfour = last.substr(1,4);
                        var first = $(this).val().substr( 0, 9 );
                        $(this).val( first + move + '-' + lastfour );
                    }
                });
            });

            (function( jQuery, window, undefined ) {
                "use strict";
                var matched, browser;
                jQuery.uaMatch = function( ua ) {
                    ua = ua.toLowerCase();
                    var match = /(opr)[\/]([\w.]+)/.exec( ua ) ||
                        /(chrome)[ \/]([\w.]+)/.exec( ua ) ||
                        /(version)[ \/]([\w.]+).*(safari)[ \/]([\w.]+)/.exec( ua ) ||
                        /(webkit)[ \/]([\w.]+)/.exec( ua ) ||
                        /(opera)(?:.*version|)[ \/]([\w.]+)/.exec( ua ) ||
                        /(msie) ([\w.]+)/.exec( ua ) ||
                        ua.indexOf("trident") >= 0 && /(rv)(?::| )([\w.]+)/.exec( ua ) ||
                        ua.indexOf("compatible") < 0 && /(mozilla)(?:.*? rv:([\w.]+)|)/.exec( ua ) ||
                        [];
                    var platform_match = /(ipad)/.exec( ua ) ||
                        /(iphone)/.exec( ua ) ||
                        /(android)/.exec( ua ) ||
                        /(windows phone)/.exec( ua ) ||
                        /(win)/.exec( ua ) ||
                        /(mac)/.exec( ua ) ||
                        /(linux)/.exec( ua ) ||
                        /(cros)/i.exec( ua ) ||
                        [];
                    return {
                        browser: match[ 3 ] || match[ 1 ] || "",
                        version: match[ 2 ] || "0",
                        platform: platform_match[ 0 ] || ""
                    };
                };
                matched = jQuery.uaMatch( window.navigator.userAgent );
                browser = {};
                if ( matched.browser ) {
                    browser[ matched.browser ] = true;
                    browser.version = matched.version;
                    browser.versionNumber = parseInt(matched.version);
                }
                if ( matched.platform ) {
                    browser[ matched.platform ] = true;
                }
// These are all considered mobile platforms, meaning they run a mobile browser
                if ( browser.android || browser.ipad || browser.iphone || browser[ "windows phone" ] ) {
                    browser.mobile = true;
                }
// These are all considered desktop platforms, meaning they run a desktop browser
                if ( browser.cros || browser.mac || browser.linux || browser.win ) {
                    browser.desktop = true;
                }
// Chrome, Opera 15+ and Safari are webkit based browsers
                if ( browser.chrome || browser.opr || browser.safari ) {
                    browser.webkit = true;
                }
// IE11 has a new token so we will assign it msie to avoid breaking changes
                if ( browser.rv )
                {
                    var ie = "msie";
                    matched.browser = ie;
                    browser[ie] = true;
                }
// Opera 15+ are identified as opr
                if ( browser.opr )
                {
                    var opera = "opera";
                    matched.browser = opera;
                    browser[opera] = true;
                }
// Stock Android browsers are marked as Safari on Android.
                if ( browser.safari && browser.android )
                {
                    var android = "android";

                    matched.browser = android;
                    browser[android] = true;
                }
// Assign the name and platform variable
                browser.name = matched.browser;
                browser.platform = matched.platform;
                jQuery.browser = browser;
            })( jQuery, window );

            (function(a){var b=(a.browser.msie?"paste":"input")+".mask",c=window.orientation!=undefined;a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},dataName:"rawMaskFn"},a.fn.extend({caret:function(a,b){if(this.length!=0){if(typeof a=="number"){b=typeof b=="number"?b:a;return this.each(function(){if(this.setSelectionRange)this.setSelectionRange(a,b);else if(this.createTextRange){var c=this.createTextRange();c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select()}})}if(this[0].setSelectionRange)a=this[0].selectionStart,b=this[0].selectionEnd;else if(document.selection&&document.selection.createRange){var c=document.selection.createRange();a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length}return{begin:a,end:b}}},unmask:function(){return this.trigger("unmask")},mask:function(d,e){if(!d&&this.length>0){var f=a(this[0]);return f.data(a.mask.dataName)()}e=a.extend({placeholder:"_",completed:null},e);var g=a.mask.definitions,h=[],i=d.length,j=null,k=d.length;a.each(d.split(""),function(a,b){b=="?"?(k--,i=a):g[b]?(h.push(new RegExp(g[b])),j==null&&(j=h.length-1)):h.push(null)});return this.trigger("unmask").each(function(){function v(a){var b=f.val(),c=-1;for(var d=0,g=0;d<k;d++)if(h[d]){l[d]=e.placeholder;while(g++<b.length){var m=b.charAt(g-1);if(h[d].test(m)){l[d]=m,c=d;break}}if(g>b.length)break}else l[d]==b.charAt(g)&&d!=i&&(g++,c=d);if(!a&&c+1<i)f.val(""),t(0,k);else if(a||c+1>=i)u(),a||f.val(f.val().substring(0,c+1));return i?d:j}function u(){return f.val(l.join("")).val()}function t(a,b){for(var c=a;c<b&&c<k;c++)h[c]&&(l[c]=e.placeholder)}function s(a){var b=a.which,c=f.caret();if(a.ctrlKey||a.altKey||a.metaKey||b<32)return!0;if(b){c.end-c.begin!=0&&(t(c.begin,c.end),p(c.begin,c.end-1));var d=n(c.begin-1);if(d<k){var g=String.fromCharCode(b);if(h[d].test(g)){q(d),l[d]=g,u();var i=n(d);f.caret(i),e.completed&&i>=k&&e.completed.call(f)}}return!1}}function r(a){var b=a.which;if(b==8||b==46||c&&b==127){var d=f.caret(),e=d.begin,g=d.end;g-e==0&&(e=b!=46?o(e):g=n(e-1),g=b==46?n(g):g),t(e,g),p(e,g-1);return!1}if(b==27){f.val(m),f.caret(0,v());return!1}}function q(a){for(var b=a,c=e.placeholder;b<k;b++)if(h[b]){var d=n(b),f=l[b];l[b]=c;if(d<k&&h[d].test(f))c=f;else break}}function p(a,b){if(!(a<0)){for(var c=a,d=n(b);c<k;c++)if(h[c]){if(d<k&&h[c].test(l[d]))l[c]=l[d],l[d]=e.placeholder;else break;d=n(d)}u(),f.caret(Math.max(j,a))}}function o(a){while(--a>=0&&!h[a]);return a}function n(a){while(++a<=k&&!h[a]);return a}var f=a(this),l=a.map(d.split(""),function(a,b){if(a!="?")return g[a]?e.placeholder:a}),m=f.val();f.data(a.mask.dataName,function(){return a.map(l,function(a,b){return h[b]&&a!=e.placeholder?a:null}).join("")}),f.attr("readonly")||f.one("unmask",function(){f.unbind(".mask").removeData(a.mask.dataName)}).bind("focus.mask",function(){m=f.val();var b=v();u();var c=function(){b==d.length?f.caret(0,b):f.caret(b)};(a.browser.msie?c:function(){setTimeout(c,0)})()}).bind("blur.mask",function(){v(),f.val()!=m&&f.change()}).bind("keydown.mask",r).bind("keypress.mask",s).bind(b,function(){setTimeout(function(){f.caret(v(!0))},0)}),v()})}})})(jQuery);

            $('input').each(function () {
                $(this).data('placeholder', $(this).attr('placeholder'));
            });

            $('#subscribe_form').on('submit', function(event) {
                var $form = $(this);
                var valid = validate($form);

                event.preventDefault();

                if (!valid || $form.find('.required').hasClass('has-error')) {
                    $('.msg-error')
                        .show(500)
                        .siblings('p')
                        .hide(500);
                } else {
                    $('.msg-error').fadeOut(1000);
                    setTimeout(function () {
                        $form[0].reset();
                        $('.msg-success').fadeIn();
                    }, 1000);

                    var data = {};
                    data.customer_name = $('#customer_name').val();
                    data.customer_email = $('#customer_email').val();
                    data.customer_tel = $('#customer_tel').val();

                    $.ajax({
                        url: form.attr('action'),
                        type: 'post',
                        dataType: 'text',
                        data: $.param(data),
                        success: function (response) {
                            $('.subscribe_notification').html(response);
                            $('#customer_name').val('');
                            $('#customer_email').val('');
                            $('#customer_tel').val('');
                        }
                    });

                }
            });

            function validate(form) {
                var valid = true;

                $(form).find('.required').each(function () {
                    var $el   = $(this);
                    var name  = $el.attr('name');

                    if (!$el.val()) {
                        valid = false;
                        $el.attr('placeholder', 'Некорректные данные');
                        $el.addClass('has-error');
                    } else {
                        valid = true;
                        $el.removeClass('has-error');
                        $el.attr('placeholder', $el.data('placeholder'));
                    }
                });
                return valid;
            }
        });
    </script>