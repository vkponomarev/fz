<?php

/* @var $this \yii\web\View */
/* @var $content string */


?>

<?php if (!$this->params['isEmbed']): ?>
    <div class="embed-link" >

        <a href="/<?=$this->params['currentLanguages']->url;?>/embed/?embed-url=<?=$this->params['pages']->url?>" rel="nofollow">

            <?=Yii::t('app','Embed on your website')?>

        </a>

    </div>
<?php endif; ?>
