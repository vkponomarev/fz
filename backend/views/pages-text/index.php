<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PagesTextSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Текста страниц';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-text-index">



    <p>
        <?= Html::a('Создать текста страниц', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pages_id',
            'languages_id',
            'menu_name',
            //'title',
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
