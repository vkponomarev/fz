<?php
/* @var $this \frontend\controllers\GenresController
 * @var $genreData \common\components\genre\GenreData
 * @var $songsByYear \common\components\songs\SongsByYear
 */

use yii\widgets\ListView; ?><br><br><a name=genre></a><h1 class=main-page-h1><?= Yii::$app->params['text']['h1'] ?></h1><br><div class="rflex year-songs"><?= ListView::widget([
        'dataProvider' => $songsByYear,

        'itemView' => 'year-page_item.min.php',
        'layout' => '{items}<li class="genre-pager">{pager}</li>',
        'options' => [
            'tag' => 'ul'
        ],
        'itemOptions' => [
            'tag' => 'li',
        ],
        'pager' => [
            'registerLinkTags' => false,
            'options' => [
                'class' => 'pagination'
            ],
            'linkOptions' => [
                //'class' => 'mylink'
            ],
            // 'activePageCssClass' => 'myactive',
            // 'disabledPageCssClass' => 'mydisable',

        ],

    ]) ?></div>