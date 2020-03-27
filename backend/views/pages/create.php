<?php


/* @var $this yii\web\View */
/* @var $model common\models\Pages */
/** @var $parentId */
$this->title = 'Создать страницы';
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-create">



    <?=
    $this->render('_form', [
        'model' => $model,
        'parentId' => $parentId,
    ]) ?>

</div>
