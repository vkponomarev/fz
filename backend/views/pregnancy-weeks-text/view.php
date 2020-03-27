<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PregnancyWeeksText */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Pregnancy Weeks Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pregnancy-weeks-text-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pregnancy_weeks_id',
            'languages_id',
            'menu_name',
            'title',
            'h1',
            'description:ntext',
            'keywords',
            'text1:ntext',
            'text2:ntext',
            'active',
        ],
    ]) ?>

</div>
