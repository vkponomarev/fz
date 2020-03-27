<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LanguagesText */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="languages-text-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'languages_trans_id')->hiddenInput(['value' => $languages_trans])->label(false) ?>

    <?= $form->field($model, 'languages_id')->hiddenInput(['value' => $languages])->label(false) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
