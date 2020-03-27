<?php

/* @var $this \yii\web\View */
/* @var $content string */



//AppAsset::register($this);
//echo $this->params['title'];


?>

<?php if (!$this->params['isEmbed']): ?>
<p><br></p>
<div class="comments-width">

    <div class="fb-comments" data-href="https://womencalc.com" data-width="100%" data-numposts="15"></div>
</div>
<?php endif;?>