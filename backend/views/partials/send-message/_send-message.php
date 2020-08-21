<?php

/* @var $this \yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $content string */



?>

<?php if (Yii::$app->session->getFlash('success')):?>

    <div class="alert alert-info" role="alert">
        Отправка сообщения выполнена успешно.
    </div>

<?php else:?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($this->params['model'], 'name')->textInput(['maxlength' => true])->label(Yii::t('app','Name')) ?>

    <?= $form->field($this->params['model'], 'email')->Input('email')->label('E-mail') ?>

    <?= $form->field($this->params['model'], 'text')->textarea(['rows' => 10, 'cols' => 2])->label(Yii::t('app','Text')); ?>

    <?= $form->field($this->params['model'], 'language')->hiddenInput(['value' => $this->params['currentLanguages']->url])->label(false) ?>

    <?= $form->field($this->params['model'], 'date')->hiddenInput(['value' => date('Y-m-d')])->label(false) ?>

    <?= $form->field($this->params['model'], 'check')->hiddenInput([
        'type' => 'hidden',
        'id' => 'check',
        'value' => '',
    ])->label(false) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','Send'), [
            'class' => 'btn btn-success',
            'onclick'=>"document.getElementById('check').value = 'nospam';"]) ?>
    </div>

    <?php ActiveForm::end(); ?>


<?php endif;?>
