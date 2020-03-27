<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PregnancyWeeksText */

$this->title = 'Update Pregnancy Weeks Text: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pregnancy Weeks Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pregnancy-weeks-text-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pregnancyWeeks' => $pregnancyWeeks,
        'languages' => $languages,
    ]) ?>

</div>
