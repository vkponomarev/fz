<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MLanguagesTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'M Languages Texts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mlanguages-text-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create M Languages Text', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'languages_id',
            'm_languages_id',
            'name',
            'name_second',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
