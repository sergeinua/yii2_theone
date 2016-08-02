<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Фильтр
                </div>
                <div class="panel-body">
                    <?php $form = \yii\widgets\ActiveForm::begin([
                        'action' => \yii\helpers\Url::to(["/user/index"]),
                        'method' => 'get',
                    ]); ?>
                    <?=$form->field($searchModel,'first_name')->label('Имя')?>
                    <?=$form->field($searchModel,'last_name')->label('Фамилия')?>
                    <?=$form->field($searchModel,'email')->label('Email')?>
                    <?= $form->field($searchModel, 'role')
                        ->dropDownList(\yii\helpers\ArrayHelper::map(Yii::$app->authManager->getRoles(),'name','description'),[
                            'prompt'=>'Все'
                        ]);?>

                    <?=$form->field($searchModel,'status')
                        ->dropDownList([User::STATUS_BANNED=>'Забанен',User::STATUS_NEW=>'Новый',User::STATUS_ACTIVE=>'Активен',User::STATUS_AVAILABLE=>'Доступен'],[
                            'prompt'=>'Все'
                        ])->label('Статус');?>
                    <?= Html::a('<span class="glyphicon glyphicon-remove"></span> Сбросить',\yii\helpers\Url::to(["/user/index/"]),['class'=>'btn btn-danger'])?>
                    <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Поиск',['class'=>'btn btn-primary'])?>

                    <?php \yii\widgets\ActiveForm::end() ?>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Помощь
                </div>
                <div class="panel-body">
                    У пользователей 4 статуса
                    <ul>
                        <li>
                            <strong>Забанен</strong> - пользователь не имеет возможности войти на сайт.
                        </li>
                        <li>
                            <strong>Новый</strong> - пользователь только зарегистрировался но еще не активировал свой email.
                        </li>
                        <li>
                            <strong>Активен</strong> - пользователь зарегистрировался,имеет возможность входить в лишний кабинет,лайкать и оставлять комментарии.
                        </li>
                        <li>
                            <strong>Доступен</strong> - статус только для профессионалов.
                            Означает что профессионал отображается в списке профессионалов.
                            Данный статус ставится вручную для того чтобы обеспечить модерацию информации о профессионалах перед их публикацией.
                        </li>
                    </ul>
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
    //                    'filterModel' => $searchModel,
                        'rowOptions'=>function($model,$index,$widget,$grid){
                            switch($model->status){
                                case 0:
                                    return ['style'=>'color:#aaa'];
                                    break;
                                case 5;
                                    return ['style'=>'color:black;background-color:#e0a2b7'];
                                    break;
                            }
                        },
                        'columns' => [
    //                        ['class' => 'yii\grid\SerialColumn'],

                            'id',
                            'email',
                            [
                                'label'=>'Тип',
                                'attribute'=>'role',
                                'value'=>function($model){
                                    if($role = Yii::$app->authManager->getRole($model->role)){
                                        return $role->description;
                                    }

                                }
                            ],
                            [
                                'label'=>'Полное имя',
                                'attribute'=>'fullName'
                            ],


                            'userProfessionalInfo.organisation_name',
                            //'auth_key',
                            // 'password_hash',
                            // 'password_reset_token',
                            // 'email:email',
                            // 'city',
                            // 'slug',

                            [
                                'label'=>'Статус',
                                'attribute'=>'status',
                                'value'=>function($model){
                                    switch($model->status){
                                        case 0:
                                            return 'Забанен';
                                            break;
                                        case 5:
                                            return 'Новый';
                                            break;
                                        case 10:
                                            return 'Активен';
                                            break;
                                        case 15:
                                            return 'Доступен';
                                            break;
                                    }
                                }
                            ],

                            // 'created_at',
                            // 'updated_at',

    //                        ['class' => yii\grid\ActionColumn::className(),
    //                            'template'=>'{update}',
    //                            'buttons'=>[
    //                                'update'=>function($url,$model,$key){
    //                                    $newUrl = Yii::$app
    //                                        ->getUrlManager()
    //                                        ->createUrl(['user/update/','id'=>$model->id]);
    //                                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>',$newUrl,['class'=>'btn btn-success']);
    //                                },
    //                            ],
    //                        ],
    //                        ['class' => yii\grid\ActionColumn::className(),
    //                            'template'=>'{delete}',
    //                            'buttons'=>[
    //                                'delete'=>function($url,$model,$key){
    //                                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['user/delete'], [
    //                                        'class' => 'btn btn-success',
    //                                        'data'=>[
    //                                            'method' => 'post',
    //                                            'confirm' => 'Are you sure?',
    //                                            'params' => ['id' => $model->id],
    //                                        ],
    //                                    ]);
    //                                },
    //                            ],
    //                        ],
                            ['class' => 'yii\grid\ActionColumn',
                                'buttons'=>[
                                    'delete'=>function($url,$model,$key){
                                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['user/delete'], [
    //                                        'class' => 'btn btn-success',
                                            'data'=>[
                                                'method' => 'post',
                                                'confirm' => 'Are you sure?',
                                                'params' => ['id' => $model->id],
                                            ],
                                        ]);
                                    },
                                ],
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
