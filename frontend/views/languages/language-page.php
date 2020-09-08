<?php
/* @var $this \frontend\controllers\LanguagesController
 * @var $songsByLanguage \common\components\songs\SongsByLanguage
 */

use yii\widgets\ListView; ?>
<br><br>
<a name="genre"></a>
<h1 class="main-page-h1"">
    <?= Yii::$app->params['text']['h1'] ?>
</h1>
<br>

<div class="rflex genre-songs">
        <?= ListView::widget([
            'dataProvider' => $songsByLanguage,

            'itemView' => 'language-page_item.min.php',
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

            ]) ?>

</div>