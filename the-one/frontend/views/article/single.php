<?php
use yii\helpers\Url;
/**
 * @var $article \common\models\Article
 * @var $nextArticle \common\models\Article
 * @var $previousArticle \common\models\Article
 * @var $threeRandomArticles array
 */
?>

<div class="container-content article-single" id="art-s">
    <?php if(!empty($article->video_frame)){
        echo $this->render('single/article-video',[
            'article'=>$article,
            'previousArticle'=>$previousArticle,
            'nextArticle'=>$nextArticle,
            'threeArticles'=>$threeArticles

        ]);
    }else{
        echo $this->render('single/article-typical',[
            'article'=>$article,
            'previousArticle'=>$previousArticle,
            'nextArticle'=>$nextArticle,
            'threeArticles'=>$threeArticles,
            'tags' => $tags,
        ]);
    }?>
</div>
<!--<script type="text/javascript" async defer src="//assets.pinterest.com/js/pinit.js"></script>-->
<!--<script async defer src="//assets.pinterest.com/js/pinit.js"></script>-->
<script src="https://code.jquery.com/jquery-3.0.0.js" integrity="sha256-jrPLZ+8vDxt2FnE1zvZXCkCcebI/C8Dt5xyaQBjxQIo=" crossorigin="anonymous"></script>
<!--<script>-->
<!--    $(document).ready(function(){-->
<!--        var item = $('.article-block img');-->
<!--        item.each(function(){-->
<!--            $('<a href="https://www.pinterest.com/pin/create/button/' +-->
<!--                '?url=' + $(location).attr('href') +-->
<!--                '&media=' + $(this).attr('src') +-->
<!--                '&description=TheOne wedding magazine"' +-->
<!--                'data-pin-shape="round">' +-->
<!--                '<img src="//assets.pinterest.com/images/pidgets/pinit_fg_en_rect_gray_20.png" /></a>').insertBefore($(this));-->
<!--            });-->
<!--    });-->
<!--</script>-->

<script>
    $(document).ready(function(){
        var item = $('.article-block img');
        item.each(function(){
            var foo = 'http://pinterest.com/pin/create/button/' +
            '?url=' + $(location).attr('href') +
            '&media=' + $(this).attr('src') +
            '&description=TheOne wedding magazine';

            $('<a href="#" onclick="window.open(\''+foo+'\');return false" class="board-pin"><img src="http://<?= $_SERVER["SERVER_NAME"]; ?>/img/pinterest.png" /></a>').insertBefore($(this));
        });
        var img = $("img[class*='foo']");
        img.each(function(){
            $(this).parent().wrap( "<div class='wrapper'></div>" );
        });
    });
</script>


<!---->
<!---->
<!--<style>-->
<!--    .gallery-item > a {-->
<!--        position: absolute;-->
<!--        right: 0;-->
<!--        top: 0;-->
<!--        z-index: 2;-->
<!--        width: 50px!important;-->
<!--        height: 50px!important;-->
<!--    }-->
<!--</style>-->