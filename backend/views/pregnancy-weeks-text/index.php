<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PregnancyWeeksTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pregnancy Weeks Texts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregnancy-weeks-text-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pregnancy Weeks Text', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pregnancy_weeks_id',
            'languages_id',
            'menu_name',
            'title',
            //'h1',
            //'description:ntext',
            //'keywords',
            //'text1:ntext',
            //'text2:ntext',
            //'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
