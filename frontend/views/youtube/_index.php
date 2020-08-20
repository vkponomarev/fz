<?php
/**
 * @var $this \frontend\controllers\YoutubeController;
 * @var $youtubeUrl
*/

//echo $youtubeUrl;

?>


    <script src="//www.youtube.com/player_api"></script>

    <iframe id="ytplayer" type="text/html" width="100%" height="100%"
            src="https://www.youtube.com/embed/<?=$youtubeUrl?>?autoplay=1&enablejsapi=1"
            frameborder="0" allow="autoplay" allowfullscreen></iframe>

