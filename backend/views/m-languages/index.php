<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\MLanguagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'M Languages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mlanguages-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create M Languages', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label' => 'Переводы',
                'format'    => ['html'],
                'value'     => function($data) {


                    return $data->translateButtons($data);

                },
            ],
            'main',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
