<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ProfessionalGroup */

$this->title = 'Создать группу профессионалов';
$this->params['breadcrumbs'][] = ['label' => 'Группы профессионалов', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professional-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
