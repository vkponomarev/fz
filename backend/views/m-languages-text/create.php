<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MLanguagesText */

$this->title = 'Create M Languages Text';
$this->params['breadcrumbs'][] = ['label' => 'M Languages Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mlanguages-text-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'mLanguages' => $mLanguages,
    ]) ?>

</div>
