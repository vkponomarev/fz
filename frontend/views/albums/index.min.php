<?php

/* @var $this yii\web\View
 * @var $songByYoutube common\components\song\SongByYoutube
 * @var $albumsByPopularity common\components\albums\AlbumsByPopularity
 */

?><br><br><a name=popular-artists></a><h1 class=main-page-h1><?= Yii::t('app', 'Popular albums') ?></h1><br><br><div class="pop-albums row"><?php foreach ($albumsByPopularity as $album): ?><a class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12"href="/<?= Yii::$app->params['language']['current']['url'] ?>/albums/<?= $album['url']; ?>/"><div><div><p><img alt="<?php if ($album['artistName']) echo $album['artistName'] . ' - '?><?= $album['name'] ?><?php if ($album['year']) echo ' (' . $album['year'] . ')'?>"src="/files/albums/<?= $album['first_letter'] ?>/<?= $album['photos'] ?>"><p><?= $album['name']; ?><?=' ';?><?php if ($album['year']): ?>(<?= $album['year']; ?>)<?php endif; ?><p><?= $album['artistName']; ?></div></div></a><?php endforeach; ?></div><br><br><br>