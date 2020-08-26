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

            <option value="---------">-------------------</option>
            <option value="artists-delete">Удаление всех файлов Артистов</option>
            <option value="albums-delete">Удаление всех файлов Альбомов</option>
            <option value="songs-delete">Удаление всех файлов Песен</option>
            <option value="pages-delete">Удаление всех Одинарных страниц</option>
            <option value="artists-create">Создание файлов Артистов</option>
            <option value="albums-create">Создание файлов Альбомов</option>
            <option value="songs-create">Создание файлов Песен</option>
            <option value="pages-create">Создание всех Одинарных страниц</option>
            <option value="languages-create">Создание массива языков</option>

        </select>

        <br>


        <label for="exampleForm2">Значение от</label>
        <input type="text" id="exampleForm2" class="form-control" name="value-one">
        <label for="exampleForm3">Значение до</label>
        <input type="text" id="exampleForm3" class="form-control" name="value-two">
        <br>
        <input class="btn btn-success form-button" type="submit" value="<?= Yii::t('app', 'Создать') ?>"
               id="button_calc">

    </form>




</div>

