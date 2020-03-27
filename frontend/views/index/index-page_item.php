<?
/**
 * @var $model \common\models\Post
 */
//use yii\helpers\Url;

?>
<a href="/<?= Yii::$app->language ?>/artists/<?= $model['url'] ?>">
    <?= $model['name'] ?>
</a>