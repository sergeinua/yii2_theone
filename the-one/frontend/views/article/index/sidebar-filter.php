<?php
/**
 * @var $categorySlug string
 * @var $param string
 * @var $termGroups array
 * @var $searchModel \common\models\search\ArticleSearch
 *
 */

?>
<aside class="aside-filter">

    <?php if($show_filter == true) : ?>

        <?php $form = \yii\widgets\ActiveForm::begin([
            'action' => \yii\helpers\Url::to([$categorySlug . '/' . $param]),
            'method' => 'get',
        ]); ?>
        <!--    Color Palette Filter-->
        <?php if (!empty($colors)) { ?>
            <div class="color-palette-wrapper">
                <label>Цветовая палитра</label>
                <?= \frontend\components\OneHtml::activeColorCheckboxList($searchModel, 'colors', $colors); ?>
            </div>
        <?php } ?>
        <!--    //Color Palette Filter-->
        <!--    Orderings -->
        <div id="close-filter" class="fa-long-arrow-right">Назад</div>
        <div class="select-wrapper">
            <?= $form->field($searchModel,'orderBy')->dropDownList([
                'date_created'=>'По дате',
                'title'=>'По названию',
                'popularity'=>'По популярности'
            ],['class'=>'base-sort'])->label('Сортировка') ?>
        </div>
        <!--    //Orderings -->
        <!--    Checkboxes-->

        <?php
        if (isset($termGroups['checkbox'])) {
            foreach ($termGroups['checkbox'] as $k => $v):?>
                <?= $form->field($searchModel, 'terms[' . $v->slug . ']', [
                ])
                    ->checkboxList(\yii\helpers\ArrayHelper::map($v->terms, 'id', 'name'),
                        ['prompt' => 'Выберите..',
                            'template' => '<div class="checkbox">{input}{label}</div>',
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $id = 'chk' . $value;
                                return \yii\helpers\Html::checkbox($name, $checked, [
                                    'value' => $value,
                                    'id' => $id,
                                    'label' => "<label for='{$id}'>{$label}</label>",
                                    'labelOptions' => [
                                        'class' => 'checkbox',
                                        'tagName' => 'div'
                                    ],
                                ]);
                            }
                        ])->label($v->name); ?>
            <?php endforeach; ?>
        <?php } ?>
        <!--    /AttributesFilter-->
        <div class="select-wrapper">
            <?= \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-remove"></span> Сбросить', \yii\helpers\Url::to([$categorySlug . '/' . $param]), ['class' => 'btn btn-danger']) ?>
         <?= \yii\bootstrap\Html::submitButton('<span class="glyphicon glyphicon-search"></span> Поиск', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php \yii\widgets\ActiveForm::end() ?>
        <!--    Links filter (not Form)-->
        <!--?php if (isset($termGroups['link'])) { ?>
            <--?php foreach ($termGroups['link'] as $k => $v) { ?>
                <nav class="rubrics-menu">
                    <ul role="menu">
                        <li role="menuitem" class="rubrics-title"><--?= $v->name ?></li>
                        <--?php foreach ($v->terms as $_v) { ?>
                            <li role="menuitem">
                                <a href="<--?= \yii\helpers\Url::to([$categorySlug . '/' . $_v->slug]) ?>" role="link"
                                   class="active fa-angle-left"><--?= $_v->name ?></a>
                            </li>
                        <--?php } ?>
                    </ul>
                </nav>
            <--?php } ?>
        <--?php } ?-->
        <!--    //Links filter (not Form)-->

        <div class="divider"></div>
        <!--?php
            if (isset($this->context->banners['sidebar'])) {
                foreach ($this->context->banners['sidebar'] as $singleBanner) {
                    ?-->

    <?php endif; ?>




    <?php foreach((array)$banners as $banner) :  ?>

        <?php if($banner->position == 'sidebar') : ?>
                <div class="banner-block ">
                    <div class="small-banner-img">
                        <a href="<?= $banner->url ?>">
                            <img src="<?= $this->getImgUrl($banner->banner); ?>" alt="">
                        </a>
                    </div>
                </div>
        <?php endif; ?>

    <?php endforeach; ?>

<!--    <div class="banner-block">-->
<!--        <div class="small-banner">-->
<!--            <div class="divider-top"></div>-->
<!--            <div class="title">Музыка и диджеи</div>-->
<!--            <div class="sub-title">Место для баннера</div>-->
<!--            <div class="divider-bottom"></div>-->
<!--        </div>-->
<!--        <div class="small-banner">-->
<!--            <div class="divider-top"></div>-->
<!--            <div class="title">Музыка и диджеи</div>-->
<!--            <div class="sub-title">Место для баннера</div>-->
<!--            <div class="divider-bottom"></div>-->
<!--        </div>-->
<!--    </div>-->


</aside>

