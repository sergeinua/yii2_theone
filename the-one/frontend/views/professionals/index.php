<?php
/**
 * @var $models = array;
 */

?>
<div class="content container-content" id="professionals-list">
    <div class="professionals-wrapper">
        <h1 class="magazine-heading"><?=$this->title ?></h1>
        <div class="filter-btn-wrapper"><a href="#" role="button" title="Filter" id="filter-switcher" class="btn"><i class="fa fa-filter"></i><span>Фильтр</span></a></div>
        <div class="list-of-professionals">
            <?php if(isset($models[0])){ ?>
            <?php foreach($models[0] as $v):
                echo $this->render('index/list-of-professionals',[
                    'model'=>$v
                ]);
                endforeach;?>
            <?php }else{?>
                <h2>Ничего не найдено</h2>
            <?php } ?>
            <?=$this->render('index/banners-content'); ?>

            <?php
            if(isset($models[1])):
                foreach($models[1] as $v):
                    echo $this->render('index/list-of-professionals',[
                        'model'=>$v
                    ]);
                endforeach;
            endif;?>
            <div class="pagination-block">
                <?=\yii\widgets\LinkPager::widget([
                    'pagination'=>$pages,
                    'nextPageLabel'=>'<i class="fa fa-arrow-right"></i>',
                    'prevPageLabel'=>'<i class="fa fa-arrow-left"></i>']); ?>
            </div>
        </div>
        <aside class="aside-filter">
        <?=$this->render('index/search-form',[
            'searchModel'=>$searchModel,
            'route'=>$route,
            'countryList'=>$countryList,
            'cityList'=>$cityList
        ]);?>
            <?=$this->render('index/banners-sidebar'); ?>
        <div class="backdrop"></div>
        </aside>
    </div>
</div>