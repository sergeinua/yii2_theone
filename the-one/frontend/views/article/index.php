<?php
/**
 * @var $pagination \yii\data\Pagination
 * @var $models array
 */
?>
<?php //sorting models
//dump(Yii::$app->controller->id);
//dump(Yii::$app->controller->actigoon->id);
//$models = array_reverse($models); ?>
<style>
    .img-holder iframe{
        width: 100%;
        height: 25rem;
    }
</style>

<div class="content the-one-article-ideas container-content" id="articles">
    <h1 class="magazine-heading"><?=$this->context->title ?></h1>

    <?php if($show_filter) : ?>

        <div class="filter-btn-wrapper">
            <a href="javascript:(0)" role="button" title="Filter" id="filter-switcher" class="btn">
                <i class="fa fa-filter"></i>
                <span>Фильтр</span>
            </a>
        </div>

    <?php endif; ?>

    <div class="articles-blocks-wrapper">
        <?php  foreach($models as $model){
            echo $this->render('index/article-block',[
                'model'=>$model,
                'withColors'=>!empty($colors),
                'categorySlug'=>$categorySlug,
                'param'=>$param
            ]);
        }
        ?>
        <?= $this->render('index/banners', ['banners' => $banners]); ?>
        <div class="pagination-block">
                <?=\yii\widgets\LinkPager::widget([
                    'pagination'=>$pagination,
                    'nextPageLabel'=>'<i class="fa fa-arrow-right"></i>',
                    'prevPageLabel'=>'<i class="fa fa-arrow-left"></i>']); ?>
        </div>
    </div>


    <?= $this->render('index/sidebar-filter',[
        'categorySlug'=>$categorySlug,
        'termGroups'=>$termGroups,
        'param'=>$param,
        'searchModel'=>$searchModel,
        'colors'=>$colors,
        'banners' => $banners,
        'show_filter' => $show_filter,

    ]); ?>



    <div class="backdrop"></div>
</div>
