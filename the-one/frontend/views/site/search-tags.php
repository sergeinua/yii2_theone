<?php
use yii\grid\GridView;
use yii\widgets\LinkPager;
?>
<?php $page = Yii::$app->request->get('page');
if(!$page) :
    $page = 0;
else :
    $page = $page - 1;
endif; ?>

<div class="container-content search-block">
    <h1 class="h2">Результаты поиска: "<?= $data; ?>"</h1>
    <?php if($total_results > 0) : ?>
        <p class="results"><?= $total_results; ?> результатов</p>
    <?php else : ?>
        <p class="results">Ничего не найдено</p>
    <?php endif; ?>
    <div class="search-results-block">

        <?php foreach($models[$page] as $model) : ?>

            <div class="search-result-itm" onclick="location.href='/article/<?= $model['slug']; ?>'" style="cursor: pointer;">
                <div class="sr-title"><?= $model['title']; ?></div>
                <div class="sr-date"><?= date('d.m.Y',$model['created']); ?></div>
                <div class="sr-content"><?= $model['shortdesc']; ?></div>
            </div>

        <?php endforeach; ?>

    </div>
    <div class="pagination-block">
        <?= LinkPager::widget([
            'pagination' => $pagination,
            'nextPageLabel' => '<i class="fa fa-arrow-right"></i>',
            'prevPageLabel' => '<i class="fa fa-arrow-left"></i>']); ?>
    </div>
</div>