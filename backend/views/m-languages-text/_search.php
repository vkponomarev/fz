<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MLanguagesTextSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mlanguages-text-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'languages_id') ?>

    <?= $form->field($model, 'm_languages_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_second') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
