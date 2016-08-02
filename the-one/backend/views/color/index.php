<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ColorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Colors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="color-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Добавить цвет:</div>
            <div class="panel-body">
                <?php $form = \yii\widgets\ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'add-article']]); ?>
                <?php  echo $form->field($newModel,'hex')->widget(\kartik\color\ColorInput::className(),[
                    'options' => ['placeholder' => 'Выберите цвет','label'=>'Цвет'],
                ])->label('Цвет');
                ?>
                <div class="form-group">
                    <?= $form
                        ->field($newModel, 'name')
                        ->textInput(['maxlength' => true]) ?>
                </div>
                <div class="form-group">
                    <?= $form
                        ->field($newModel, 'slug')
                        ->textInput(['maxlength' => true]) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Добавить',['class'=>'btn btn-success btn-flat']) ?>
                </div>
                <?php $form->end()?>
            </div>
        </div>



    </div>
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Список</div>
            <div class="panel-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute'=>'hex',
                            'label'=>'Цвет',
                            'format'=>'raw',
                            'value'=>function($model){
                                return "<div style='background-color:".$model->hex.";width:125px;height:25px;'></div>";
                            }
                        ],
                        'name',
                        'slug',
                        ['class' => 'yii\grid\ActionColumn'],
                    ],
                ]); ?>
            </div>
        </div>

    </div>
    </div>
</div>
