<?php

/* @var $this yii\web\View */
/* @var $model common\models\LanguagesText */
/** @var \common\models\Languages $languages */
/** @var \common\models\Languages $languages_trans */

$this->title = 'Создать текст для языка';
$this->params['breadcrumbs'][] = ['label' => 'Languages Texts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="languages-text-create">



    <?=

    $this->render('_form', [
        'model' => $model,
        'languages' => $languages,
        'languages_trans' => $languages_trans,
    ]) ?>

</div>
