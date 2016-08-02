<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label'=>'Адресант комментария',
                'attribute'=>'user_author_id',
                'format'=>'html',
                'value'=>function($model){
                    return Html::a($model->userAuthor->fullName,\yii\helpers\Url::to(['user/update',['id'=>$model->userAuthor->id]]));
                }
            ],
            [
                'label'=>'Адресат комментария',
                'attribute'=>'user_professional_id',
                'format'=>'html',
                'value'=>function($model){
                    return Html::a($model->userProfessional->fullName,\yii\helpers\Url::to(['user/update',['id'=>$model->userProfessional->id]]));
                }
            ],
            [
                'label'=>'Оценка',
                'attribute'=>'rate',
            ],
            'date',
            // 'title',
             'text:ntext',
            // 'parent_id',

            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update}{delete}'
            ],
        ],
    ]); ?>

</div>
