<?php

/* @var $this \yii\web\View */
/* @var $content string */



//AppAsset::register($this);
//echo $this->params['title'];


?>

<?php if (!$this->params['isEmbed']): ?>
<p><br></p>
<div id="vk_comments"></div>
<script type="text/javascript">
    VK.Widgets.Comments("vk_comments", {limit: 15, attach: "*"});
</script>
<p><br><br></p>
<?php endif;?>