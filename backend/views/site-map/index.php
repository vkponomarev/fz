<?php

/* @var $this yii\web\View */
/* @var $searchModel common\models\MailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Create SiteMap';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="mail-index">

    <form action="" method="post">

        <div class="form-left-title"><?= Yii::t('app', 'Выберите что будет создавать:') ?></div>

        <select id="cycle-length-from" name="name" class="form-control select-extended">

            <option value="sitemap-artists-all">Карта сайта для артистов все языки</option>
            <option value="sitemap-albums-all">Карта сайта для альбомов все языки</option>
            <option value="sitemap-songs-all">Карта сайта для песен все языки</option>
            <option value="sitemap-all">Карта сайта основной файл все языки</option>


            <option value="sitemap-artists-ru">Карта сайта для артистов только RU</option>
            <option value="sitemap-albums-ru">Карта сайта для альбомов только RU</option>
            <option value="sitemap-songs-ru">Карта сайта для песен только RU</option>


            <option value="sitemap-ru">Карта сайта основной файл только RU</option>


        </select>

        <br>


        <input class="btn btn-success form-button" type="submit" value="<?= Yii::t('app', 'Создать') ?>"
               id="button_calc">

    </form>




</div>

