<?php
use yii\helpers\Url;
/**
 * @var $article \common\models\Article
 * @var $nextArticle \common\models\Article
 * @var $previousArticle \common\models\Article
 * @var $threeRandomArticles array
 */
?>
<style>
    .article-block iframe{
        width:100%;
    }

</style>
<?php  ?>
<div class="content article-single" id="art-s">

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
                'threeArticles'=>$threeArticles
            ]);
         }?>

    </div>