<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/* @var $form yii\widgets\ActiveForm */
/*
 *     <?= $form->field($model, 'parent_id')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\Pages::find()->all(),'id','name'),
        'value' =>'0',
        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите'],
        'pluginOptions' => [
            'allowClear' => true,

        ],
    ]);?>

 *
 * */

?>

<div class="pages-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php

         if ($parentId) {

             echo $form->field($model, 'parent_id')->textInput(['maxlength' => true,'value'=>$parentId]);

         }else{

             echo $form->field($model, 'parent_id')->textInput(['maxlength' => true]);

         }
    ?>





    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(\common\models\Pages::getStatusList()) ?>

    <?= $form->field($model, 'menu_active')->dropDownList(\common\models\Pages::getStatusList()) ?>

    <?= $form->field($model, 'main_page_active')->dropDownList(\common\models\Pages::getStatusList()) ?>

    <?= $form->field($model, 'sort')->textInput(['maxlength' => true]); ?>
    <?= $form->field($model, 'embed')->textInput(['maxlength' => true]); ?>
    <?php /*= $form->field($model, 'pages')->widget(\kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\common\models\PagesText::find()->all(),'id','name'),

        'language' => 'ru',
        'options' => ['placeholder' => 'Выберите Tag ...','multiple' => 'true'],
        'pluginOptions' => [
            'allowClear' => true,
            'tags' => true,
            'maximumInputLength' => 10
        ],
    ]); */?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php //$model->translateButtonsNew($model);?>
</div>
