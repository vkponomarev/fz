<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PregnancyWeeks */

$this->title = 'Update Pregnancy Weeks: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pregnancy Weeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pregnancy-weeks-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
