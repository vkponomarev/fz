<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $model common\models\Pages */
//$model = \common\models\Pages::find();

$this->title = 'Редактировать страницу: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
//$this->title = 'Страница';
//$this->params['breadcrumbs'][] = ['label' => 'Pages', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
$test = '';
?>
<div class="pages-index">



    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


                ['class' => 'yii\grid\SerialColumn'],

            'id',


            [
                'attribute' => 'name',
                'value' => function ($data) {
                    return Html::a(Html::encode($data->name), \yii\helpers\Url::to(['view', 'id' => $data->id]));
                },
                'format' => 'raw',
            ],



   [
                'label' => 'Переводы',
                'format'    => ['html'],
                'value'     => function($data) {


                       return $data->translateButtons($data);

                },
],
            
            ['attribute'=>'active','filter'=>\common\models\Pages::getStatusList(),'value'=>'statusName'],

            ['attribute'=>'menu_active','filter'=>\common\models\Pages::getStatusList(),'value'=>'statusName'],

            ['attribute'=>'main_page_active','filter'=>\common\models\Pages::getStatusList(),'value'=>'statusName'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>




    <?php
   /* foreach (\common\models\Pages::getAllLanguages() as $one){

    [    Рабочий вариант передачи данных.

                'format'    => ['html'],
                'value'     => function($data) {
                   if($data->languages) return 'selected';
                   else return 'Not selected';
                },
],


'value' => function($data){
                $url = "http://www.mysite.ru";



                 return Html::a('Перейти', $url, ['title' => 'Перейти']);
             }

     'buttons' => [
                'paid' => function ($url,$model,$key) {
                    return Html::a('Оплаченный заказ', $url, ['class' => 'btn btn-success btn-xs']);
                },
                'confirm' => function ($url,$model,$key) {
                    return Html::a('Подтвердить заказ', $url, ['class' => 'btn btn-success btn-xs']);
                },
                'clear' => function ($url,$model,$key) {
                    return Html::a('Очистить заказ', $url, ['class' => 'btn btn-danger btn-xs']);
                },
            ],


    }*/

   /* foreach ((\common\models\Languages::getAllLanguages()) as $one) {

        echo $one->id;
        echo $one->name . "<br>";
    }*/



   // echo \common\models\Languages::getLanguages();




    ?>




    <?php Pjax::end(); ?>



</div>
