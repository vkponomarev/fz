<?php if ($model['url_youtube']): ?>
    <span
            onclick="sYM(this)"
            data-url="<?= $model['url_youtube'] ?>">
    </span>
<?php else: ?>
    <span>  </span>

<?php endif; ?>
<?php if ($model['albumPhoto']): ?>
    <?php if (file_exists(Yii::getAlias('@frontend') . '/web/files/albums/' . $model['albumFirstLetter'] . '/' . $model['albumPhoto'])): ?>
        <img
                src="/files/albums/<?= $model['albumFirstLetter'] ?>/<?= $model['albumPhoto'] ?>"
                alt="<?php if ($model['artistName']) echo $model['artistName'] . ' - ' ?><?= $model['albumName'] ?><?php if ($model['albumYear']) echo ' (' . $model['albumYear'] . ')' ?>"
        >
    <?php else: ?>
        <img src="/files/no-album-photo.png"
             alt="<?php if ($model['artistName']) echo $model['artistName'] . ' - ' ?><?= $model['albumName'] ?><?php if ($model['albumYear']) echo ' (' . $model['albumYear'] . ')' ?>"
        >
    <?php endif; ?>
<?php else: ?>
    <img src="/files/no-album-photo.png"
         alt="<?php if ($model['artistName']) echo $model['artistName'] . ' - ' ?><?= $model['albumName'] ?><?php if ($model['albumYear']) echo ' (' . $model['albumYear'] . ')' ?>"
    >
<?php endif; ?>

<div>
    <div>
        <a href="/<?= Yii::$app->language ?>/artists/<?= $model['artistUrl'] ?>/">
            <?= $model['artistName'] ?>
        </a>
        <?= ' ' ?>-<?= ' ' ?>
        <a href="/<?= Yii::$app->language ?>/songs/<?= $model['url'] ?>/">
            <?= $model['name'] ?>
        </a>
    </div>

    <?php if ($model['albumName']): ?>
        <a href="/<?= Yii::$app->language ?>/albums/<?= $model['albumUrl'] ?>/">
            <?= $model['albumName'] ?>
        </a>

        <?php if ($model['albumYear']): ?>

            <?= ' (' . $model['albumYear'] . ')' ?>

        <?php endif; ?>
    <?php else: ?>


    <?php endif; ?>


</div>