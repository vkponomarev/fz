<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\MLanguagesText */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="mlanguages-text-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'm_languages_id')->textInput(['value'=>$mLanguages]) ?>

    <?= $form->field($model, 'languages_id')->textInput(['value'=>$languages]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_second')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
