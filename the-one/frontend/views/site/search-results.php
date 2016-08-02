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

    <?php if($models) : ?>

        <div class="search-results-block">

            <?php foreach($models[$page] as $model) : ?>

                <div class="search-result-itm" onclick="location.href='<?= $model['id']; ?>'" style="cursor: pointer;">
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

    <?php endif; ?>

</div>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>-->
<!--<script>-->
<!--    $( document ).ready(function() {-->
<!--        var query = getUrlParameter('search-field');-->
<!--        alert(query);-->
<!--    });-->
<!--    var getUrlParameter = function getUrlParameter(sParam) {-->
<!--        var sPageURL = decodeURIComponent(window.location.search.substring(1)),-->
<!--            sURLVariables = sPageURL.split('&'),-->
<!--            sParameterName,-->
<!--            i;-->
<!---->
<!--        for (i = 0; i < sURLVariables.length; i++) {-->
<!--            sParameterName = sURLVariables[i].split('=');-->
<!---->
<!--            if (sParameterName[0] === sParam) {-->
<!--                return sParameterName[1] === undefined ? true : sParameterName[1];-->
<!--            }-->
<!--        }-->
<!--    };-->
<!--</script>-->