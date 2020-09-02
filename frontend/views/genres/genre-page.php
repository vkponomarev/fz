<?php
/* @var $this \frontend\controllers\GenresController
 * @var $genreData \common\components\genre\GenreData
 * @var $songsByGenre \common\components\songs\SongsByGenre
 * @var $genresByParent \common\components\genres\GenresByParent
 */

use yii\widgets\ListView; ?>

<a name="genre"></a>
<h1 class="main-page-h1"">
    <?= Yii::$app->params['text']['h1'] ?>
</h1>
<br>

<?php $count=0; ?>
<?php if ($genresByParent):?>
<div class="rflex genres-index">
    <div>
        <?php foreach ($genresByParent as $eachLink): ?>
            <?php if ($count >0):?>,<?=' '?><?=' '?>
            <?php endif;?>
            <a href="/<?= Yii::$app->language ?>/genres/<?= $eachLink['url'] ?>/">
                <?= $eachLink['name'] ?>
            </a>
            <?php $count++ ?>
        <?php endforeach;?>

    </div>
</div>
<?php endif;?>

<div class="rflex genre-songs">

        <?= ListView::widget([
            'dataProvider' => $songsByGenre,

            'itemView' => 'genre-page_item.min.php',
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