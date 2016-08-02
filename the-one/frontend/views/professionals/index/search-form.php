
    <div id="close-filter" class="fa-long-arrow-right">Назад</div>
    <div class="switch-block">
        <label>Вид</label>
        <div class="switch-look-block">
            <div>
                <input id="radio1" type="radio" name="radio" value="list" class="switch-look">
                <label id="prof-list" for="radio1"></label>
            </div>
            <div>
                <input id="radio2" type="radio" name="radio" value="grid" checked="checked" class="switch-look">
                <label id="prof-grid" for="radio2"></label>
            </div>
        </div>
    </div>

    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'method'=>'get',
        'action'=>$route
    ]); ?>


    <?=$form->field($searchModel,'country',[
        'options'=>[
            'class'=>'select-wrapper'
        ]
    ])->dropDownList(\yii\helpers\ArrayHelper::map($countryList,'name','name'),[
        'class'=>'city-sort',
        'prompt'=>'Выберите страну'
    ])->label('Страна');?>

    <?=$form->field($searchModel,'city',[
        'options'=>[
            'class'=>'select-wrapper'
        ]
    ])->dropDownList(\yii\helpers\ArrayHelper::map($cityList,'name','name'),[
        'class'=>'base-sort',
        'prompt'=>'Выберите город'
    ])->label('Город');?>

    <div class="select-wrapper">
        <?= \yii\bootstrap\Html::a('<span class="glyphicon glyphicon-remove"></span> Сбросить', \yii\helpers\Url::to(['/']), ['class' => 'btn btn-danger']) ?>
        <?= \yii\bootstrap\Html::submitButton('<span class="glyphicon glyphicon-search"></span> Поиск', ['class' => 'btn btn-primary']) ?>
    </div>
    <?php $form->end();?>
    <?php ?>
    <nav class="rubrics-menu">
        <ul role="menu">
            <li role="menuitem" class="rubrics-title">Рубрики</li>
            <?php foreach($this->context->params['professional-groups'] as $v){
                //TODO:Реализовать и выяснить,по возможности, как избежать увеличения запросов mysql в два раза
              if($v->user_count>0){ ?>
                     <li role="menuitem"><a href="<?=\yii\helpers\Url::to(['/professionals/'.$v->slug]) ?>" role="link" class="active fa-angle-left"><?=$v->name ?>( <?=$v->user_count ?>)</a></li>
                <?php } ?>
            <?php } ?>
        </ul>
    </nav>
    <div class="divider"></div>
<!--    <div class="home-block">-->
<!--        <a href="#">-->
<!--            <div class="label label-color-dark-blue">Instagram</div></a><a href="#">-->
<!--            <div class="home-block-img"><img src="./../images/gallery-6.jpg" alt="Instagramm" class="align-width"></div>-->
<!--        </a>-->
<!--    </div>-->
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
