<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\TeamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'The One Girls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="team-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label'=>'Фото',
                'format'=>'raw',
                'value'=>function($model){
                    $url = \common\helpers\OneHelper::getImgUrl($model->photo);
                    return Html::img($url,['class'=>'img-responsive','style'=>'height:50px;']);
                },
            ],
            'name',
            'profession',
            'top_quote:ntext',
            // 'main_quote:ntext',
            // 'soc_tw',
            // 'soc_fb',
            // 'soc_vk',
            // 'soc_in',
            // 'slug',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
