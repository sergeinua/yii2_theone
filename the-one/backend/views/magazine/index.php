<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\Magazine */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Журналы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="magazine-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'Обложка',
                'format'=>'raw',
                'value'=>function($model){
                    $url = \common\helpers\OneHelper::getImgUrl($model->cover);
                    return Html::img($url,['class'=>'img-responsive','style'=>'height:50px;']);
                },
            ],
            'name',
            'price',
            'shortdesc',
            'content:ntext',
            // 'announcement:ntext',

            // 'issuu:ntext',
            // 'journals_ua',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
