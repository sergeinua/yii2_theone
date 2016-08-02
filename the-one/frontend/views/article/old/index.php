<?php
/**
 * @var $pagination \yii\data\Pagination
 * @var $models array
 */
?>
<style>
    .img-holder iframe{
        width: 100%;
        height: 25rem;
    }
</style>
<div class="content the-one-article-ideas" id="articles">
    <h2 class="magazine-heading"><?=$this->context->title ?></h2>
    <div class="filter-btn-wrapper"><a href="javascript:(0)" role="button" title="Filter" id="filter-switcher" class="btn">
            <i class="fa fa-filter"></i><span>Фильтр</span></a></div>
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
        <?=$this->render('index/banners'); ?>
        <div class="pagination-block">
                <?=\yii\widgets\LinkPager::widget([
                    'pagination'=>$pagination,
                    'nextPageLabel'=>'<i class="fa fa-arrow-right"></i>',
                    'prevPageLabel'=>'<i class="fa fa-arrow-left"></i>']); ?>
        </div>
    </div>
    <?=$this->render('index/sidebar-filter',[
        'categorySlug'=>$categorySlug,
        'termGroups'=>$termGroups,
        'param'=>$param,
        'searchModel'=>$searchModel,
        'colors'=>$colors,

    ]) ?>
    <div class="backdrop"></div>
</div>
