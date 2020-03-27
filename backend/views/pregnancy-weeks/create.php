<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PregnancyWeeks */

$this->title = 'Create Pregnancy Weeks';
$this->params['breadcrumbs'][] = ['label' => 'Pregnancy Weeks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregnancy-weeks-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
