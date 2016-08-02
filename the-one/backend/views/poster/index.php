<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use common\helpers\OneHelper;
use yii\widgets\ActiveForm;
use common\models\Article;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $termGroups array*/
/* @var $categorySlug string*/
$this->title =/* $this->category->title;*/
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <h1><?= Html::encode($this->title); ?></h1>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="panel panel-dafault">
                    <a class="btn btn-success" href="<?= Url::to(['poster/create']); ?>">Создать запись</a>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">Фильтр</div>
                    <div class="panel-body">
                        <?php $form = ActiveForm::begin([
                            'action' => Url::to(['poster/index']),
                            'method' => 'get',
                        ]); ?>
                        <?= $form->field($searchModel, 'title')
                            ->textInput()
                            ->label('Заголовок'); ?>

                        <?= $form->field($searchModel, 'content')
                            ->textInput()
                            ->label('Ключевое слово'); ?>
                        <?= Html::a('<span class="glyphicon glyphicon-remove"></span> Сбросить', Url::to(['poster/index']), ['class' => 'btn btn-danger']); ?>
                        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Поиск', ['class' => 'btn btn-primary']); ?>

                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Список</h3>
                    </div>
                    <div class="panel-body">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'rowOptions'=>function($model,$index,$widget,$grid){
                                if($model->status == Article::STATUS_UNPUBLISHED)
                                    return [
                                        'style'=>'color:#aaa'
                                    ];
                            },
                            'columns' => [
                                'id',
                                [
                                    'label'=>'Изображение',
                                    'format'=>'raw',
                                    'value'=>function($model){
                                        $url = OneHelper::getImgUrl($model->thumbnail);
                                        return Html::img($url,['class'=>'img-responsive','style'=>'height:50px;']);
                                    },
                                ],
                                'title',
                                [
                                    'attribute' => 'created',
                                    'format' => ['date', 'php:d/m/Y']
                                ],
                                ['class' => ActionColumn::className(),
                                    'template'=>'{update}{delete}',
                                    'buttons'=>[
                                        'update'=>function($url,$model,$key){
                                            $newUrl = Yii::$app
                                                ->getUrlManager()
                                                ->createUrl(['poster/update', 'id' => $model->id]);
                                            return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $newUrl, ['class' => 'btn btn-success']);
                                        },
                                        'delete'=>function($url, $model, $key){
                                            $newUrl = Yii::$app
                                                ->getUrlManager()
                                                ->createUrl(['poster/delete','id' => $model->id]);
                                            return Html::a('<span class="glyphicon glyphicon-trash"></span>', $newUrl,
                                                [
                                                    'data-method'=>'post',
                                                    'data-confirm'=>'Вы действительно хотите удалить эту запись?',
                                                    'class'=>'btn btn-danger'
                                                ]);
                                        }
                                    ]
                                ],
                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>