<div role="tabpanel" class="tab-pane" id="recomended">
    <?php $i = 0;
    while($i<3){
        $selected = false;
        if(isset($model->relatedArticles[$i])){
            $selected = $model->relatedArticles[$i];
        }
        echo \backend\components\OneHtml::activeArticleList($model,"[relatedArticles][]",$selected);
        $i++;
    }?>
</div>