<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MLanguages */

$this->title = 'Create M Languages';
$this->params['breadcrumbs'][] = ['label' => 'M Languages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mlanguages-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
