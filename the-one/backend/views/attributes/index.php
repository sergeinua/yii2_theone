<h1>Атрибуты</h1>

<div class="form-group ">

    <label class="control-label" >Выберите категорию</label>
    <?= \yii\bootstrap\Html::dropDownList('category_term_group',null,\yii\helpers\ArrayHelper::map($category_term_group,'id','name'),['class'=>'form-control','id'=>'load-attributes','prompt'=>'Выберите категорию']) ?>
</div>

<div id="react_thing">

</div>
<style>
    .unsaved{
        position: relative;
        transform: scale(1.6) translateX(1px) translateY(-8px);
        color: red;
        font-size: 7px;
        /* background-color: yellow; */
        padding: 2px;
        width: 0px;
    }

</style>
<!--//  -->