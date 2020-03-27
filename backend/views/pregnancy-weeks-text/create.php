<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PregnancyWeeksText */

$this->title = 'Create Pregnancy Weeks Text';
$this->params['breadcrumbs'][] = ['label' => 'Pregnancy Weeks Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregnancy-weeks-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pregnancyWeeks' => $pregnancyWeeks,
        'languages' => $languages,
    ]) ?>

</div>
