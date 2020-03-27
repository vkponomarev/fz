<?php


/* @var $this yii\web\View */
/* @var $model common\models\PagesText */

$this->title = 'Создание текста страницы';
$this->params['breadcrumbs'][] = ['label' => 'Pages Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-text-create">




    <?= $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'pages' => $pages,
    ]) ?>

</div>
