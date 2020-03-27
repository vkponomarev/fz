<?php


/* @var $this yii\web\View */
/* @var $model common\models\LanguagesText */
/** @var \common\models\Languages $languages */
/** @var \common\models\Languages $languages_trans */

$this->title = 'Редактировать текст для языка: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Languages Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="languages-text-update">



    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'languages_trans' => $languages_trans,
    ]) ?>

</div>
