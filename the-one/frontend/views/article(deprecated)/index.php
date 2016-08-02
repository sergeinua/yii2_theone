<?php
/* @var $this yii\web\View */
?>
<h1>article/index</h1>
<div id="tut">

</div>
<div class="row">

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Фильтр</div>
            <div class="panel-body" id="filterMe">
                <form method="'get" id="articleSearch">
                <?php foreach($termGroups as $k=>$v)://Так,не паникуй...тут всё просто..
                    $selected = array_shift(array_filter($v->terms,function($e) use ($searchModel,$v) {
                        if(isset($searchModel->terms[$v->slug])){
                            return $e->id==$searchModel->terms[$v->slug];
                        }
                    }));?>
                    <?=\yii\bootstrap\Html::dropDownList('terms['.$v->slug.']',
                        $selected?$selected->slug:'',
                        \yii\helpers\ArrayHelper::map($v->terms,'slug','name'),[
                        'id'=>$v->slug,
                        'class'=>'termSelect',
                        'prompt'=>'Выберите...'
                    ]);
                    ?><br>
                <?php endforeach; ?>
                    <button>search</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="row">
            <?php
                foreach($models as $model){
                    ?>
                    <div class="col-md-4 panel" >
                        <?=$model->title ?></div>
                    <?php
                }
            ?>
        </div>
    </div>
    <script>
        window.onload = function(){
            $('#articleSearch').on('submit',function(e){
                var formData = $(this).serializeArray();
                var terms = [];
                var colors = '';
                for(var i in formData){
                    var el = formData[i];
                    if(el.name.indexOf('terms')>=0&&el.value!==''){
                        terms.push(formData[i].value);
                    }
                }
                terms =  terms.sort().join('_');
                console.log(terms);
                var url = [];
                if(terms!==''){
                    url.push('t_'+terms);
                }
                if(colors!=''){
                    url.push('c'+colors);
                }
                if(url.length>1){
                    url = url.join(':');
                }else{
                    url = url[0];
                }
                window.location = '/'+canonicalUrl+'/'+url
                e.preventDefault();

            });

        }
    </script>
</div>
