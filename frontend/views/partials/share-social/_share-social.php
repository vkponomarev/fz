<?php

/* @var $this \yii\web\View */
/* @var $content string */



//AppAsset::register($this);
//echo $this->params['title'];



?>
<?php if (!$this->params['isEmbed']): ?>
<br>
<div class="social-center">
<?php if ($currentLanguages->url=='ru'):?>


    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter"></div>

<?php else:?>
    <div class="addthis_inline_share_toolbox"></div>
<?php endif;?>
</div>
<?php endif;?>
<br>
