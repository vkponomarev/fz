<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PregnancyWeeksSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pregnancy Weeks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregnancy-weeks-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Pregnancy Weeks', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'url:url',

            [
                'label' => 'Переводы',
                'format'    => ['html'],
                'value'     => function($data) {


                    return $data->translateButtons($data);

                },
            ],


            'active',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
