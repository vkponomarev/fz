<?php

/* @var $this yii\web\View */
/* @var $model common\models\PagesText */

$this->title = 'Редактирование текста страницы: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pages Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pages-text-update">



    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'pages' => $pages,
    ]) ?>

</div>
