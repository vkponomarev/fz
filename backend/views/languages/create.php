<?php


/* @var $this yii\web\View */
/* @var $model common\models\Languages */

$this->title = 'Create Languages';
$this->params['breadcrumbs'][] = ['label' => 'Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
