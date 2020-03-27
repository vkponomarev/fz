<?php

/* @var $this yii\web\View */
/* @var $model common\models\Languages */

$this->title = 'Update Languages: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="languages-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
