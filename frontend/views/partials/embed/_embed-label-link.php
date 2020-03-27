<?php

/* @var $this \yii\web\View */
/* @var $content string */


?>

<?php if ($this->params['isEmbed']): ?>
    <?php if ($this->params['embedTitle']): ?>

        <div class="embed-title">
            <?=$this->params['pagesTranslations']->plates_title?>
        </div>
    <?php endif; ?>
    <div class="label-link" >

        <a href="https://womencalc.com/<?=$this->params['currentLanguages']->url;?>/" target="_blank">WomenCalc.com</a>

    </div>
<?php endif; ?>
