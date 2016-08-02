<div class="gallery-wrapper">
    <div class="small-gallery">
        <div id="professional-gallery" class="small-gallery-items">
            <?php foreach ($userMedia as  $media) {
                switch ($media->type){
                    case 'image':
                        echo $this->render('_gallery-image',['media'=>$media]);
                        break;
                    case 'video':
                        echo $this->render('_gallery-video',['media'=>$media]);
                        break;
                }
            }
            ?>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
            $('#professional-gallery').magnificPopup({
                type: 'image',
                delegate: 'div',
                image: {
                    titleSrc: function (item) {
                        return item.el.attr('title');
                    },
                    markup: '<button class="mfp-close"></button>' +
                    '<div class="mfp-figure">'+
                    '<figure>' +
                    '<div class="mfp-img"></div>' +
                    '<figcaption>' +
                    '<div class="mfp-bottom-bar">' +
                    '<div class="mfp-title"></div>'+
                    '<div class="mfp-counter"></div>'+
                    '</figcaption>' +
                    '</figure >'+
                    '</div>'+
                    '</div>'
                },
                iframe: {
                    markup: '<button class="mfp-close"></button>' +
                    '<div class="mfp-figure">'+
                    '<figure>' +
                    '<div class="mfp-img">' +
                    '<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
                    '</div>' +
                    '<figcaption>' +
                    '<div class="mfp-bottom-bar">' +
                    '<div class="mfp-title"></div>'+
                    '<div class="mfp-counter"></div>'+
                    '</figcaption>' +
                    '</figure >'+
                    '</div>'+
                    '</div>',
                    patterns: {
                        youtube: {
//                           // index: 'youtube.com/', // String that detects type of video (in this case YouTube). Simply via url.indexOf(index).
//
//                            //id: 'v=', // String that splits URL in a two parts, second part should be %id%
//                            // Or null - full URL will be returned
//                            // Or a function that should return %id%, for example:
//                            // id: function(url) { return 'parsed id'; }
//
//                            src: 'h%id%' // URL that will be set as a source for iframe.
                        },
                        vimeo: {
                            index: 'vimeo.com/',
                            id: '/',
                            src: '//player.vimeo.com/video/%id%?autoplay=1'
                        },
                        gmaps: {
                            index: '//maps.google.',
                            src: '%id%&output=embed'
                        }

                        // you may add here more sources

                    },

                    srcAction: 'iframe_src', // Templating object key. First part defines CSS selector, second attribute. "iframe_src" means: find "iframe" and set attribute "src".
                },
                gallery: {
                    enabled: true,
                    navigateByImgClick: true,
                    tCounter: ""
                }
            });
    });
</script>