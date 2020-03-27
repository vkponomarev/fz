<?php


?>


<?=$this->render('./_first-letter-index_en');?>

<?php if (Yii::$app->language == 'ru'):?>
    <br>
    <?=$this->render('./_first-letter-index_ru');?>
<?php endif;?>
