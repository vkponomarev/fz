<?php

/* @var $this \yii\web\View */
/* @var $content string */

?>
<br>
<?php if (Yii::$app->language == 'ru'): ?>
    <script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
    <script src="https://yastatic.net/share2/share.js" async="async"></script>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir,twitter"></div>
<?php else: ?>
    <div class="addthis_inline_share_toolbox"></div>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dbbf2586b540d45"></script>
<?php endif; ?>
<br>

