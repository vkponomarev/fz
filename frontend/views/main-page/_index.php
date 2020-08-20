<?php

/* @var $this yii\web\View
 *
 * @var $songByYoutube yii\web\View
 * @var $artistByPopularity yii\web\View
 * @var $albumsByPopularity yii\web\View
 * @var $songsByPopularity yii\web\View
 *
 */

//echo $pageText['title'];$songByYoutube
?>
    <br><br><br>

<?php
/*
= $this->render('/partials/youtube-player/youtube-player', [
    'songByYoutube' => $songByYoutube,
]);
*/
?>

<?php

/*
\yii\bootstrap\Modal::begin([
    'header' => "<h4>Top 10</h4>",
    'id' => 'top10',
    'size' => 'model-lg',
    'url' => \yii\helpers\Url::to(['/partner/default/create']),
    'toggleButton' => [
        'tag' => 'a',
        'label' => '
        <span style="cursor: pointer;">
            Veja os associados TOP 10 e cadastre sua visita!
            </span>',
    ]
]);
echo $this->render('test', ['manager' => 'awefawef']);
\yii\bootstrap\Modal::end();
*/


/*
use lo\widgets\modal\ModalAjax;

echo ModalAjax::widget([
    'id' => 'showVideo',
    'header' => 'Create Company',
    //'toggleButton' => [
    //    'label' => 'New Company',
    //    'class' => 'btn btn-primary pull-right'
    //],
    'url' => \yii\helpers\Url::toRoute(['youtube/index', 'param' => 42]), // Ajax view with form to load
    'ajaxSubmit' => true, // Submit the contained form as ajax, true by default
    // ... any other yii2 bootstrap modal option you need
]);
*/
?>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showVideo" data-video="fbnSR-KBOiE" data-backdrop="false">
    show video
</button>


    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="mdo" data-backdrop="false">
        Open modal for @mdo
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">
        Open modal for @fat
    </button>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"
            data-whatever="@getbootstrap">Open modal for @getbootstrap
    </button>
    ...more buttons...

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">New message</h4>
                </div>
                <div class="modal-body">


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>


<div id="player"></div>

<script>
    // 2. This code loads the IFrame Player API code asynchronously.
    var tag = document.createElement('script');

    tag.src = "https://www.youtube.com/iframe_api";
    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // 3. This function creates an <iframe> (and YouTube player)
    //    after the API code downloads.
    var player;

    function onYouTubeIframeAPIReady() {
        player = new YT.Player('player', {
            height: '200',
            width: '100%',
            videoId: '<?= $songByYoutube["youtubeUrl"][1] ?>',
            events: {
                'onReady': onPlayerReady,
                'onStateChange': onPlayerStateChange
            }
        });
    }

    // 4. The API will call this function when the video player is ready.
    function onPlayerReady(event) {
        //event.target.playVideo();
    }

    // 5. The API calls this function when the player's state changes.
    //    The function indicates that when playing a video (state=1),
    //    the player should play for six seconds and then stop.
    var done = false;

    function onPlayerStateChange(event) {
        if (event.data == YT.PlayerState.PLAYING && !done) {
            //setTimeout(stopVideo, 6000);
            done = true;
        }
    }

    function stopVideo() {
        player.stopVideo();
    }


    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipient = button.data('whatever') // Extract info from data-* attributes
        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

        //$(this).find(".modal-body").load("/ru/youtube/index");
        //var modal = $(this)
       // modal.find('.modal-title').text('New message to ' + recipient)
        //modal.find('.modal-body input').val(recipient)

        $.ajax({
            url: '<?= \yii\helpers\Url::toRoute(['youtube/index', 'param' => 42])?>',
            type: 'post',
            data: {recipient: recipient},
            success: function(response){
                // Add response in Modal body
                $('.modal-body').html(response);
                //$('#exampleModal').html(response);
                // Display Modal
                //$('#exampleModal').modal('show');
            }
        });


    });
    /*
     $('#exampleModal').on('shown.bs.modal',
         function onPlayerReady(event) {
             player.playVideo();
         });

         $('#exampleModal').on('hidden.bs.modal',
             function onPlayerReady(event) {
                 player.pauseVideo();
             });
     */

    $('#exampleModal').on('hidden.bs.modal',
        function (event) {
            //$('#exampleModal').modal('show');
            //$('#exampleModal').modal('')
        });

</script>

    <div id="playYoutube">воспроизведение</div>
    <div id="pauseYoutube">пауза</div>

    <script src="//www.youtube.com/player_api"></script>
    <script>
        function onYouTubePlayerAPIReady() {
            player = new YT.Player('player', {
                events: {'onReady': onPlayerReady}
            });
        }
        function onPlayerReady(event) {
            document.getElementById("playYoutube").addEventListener("click", function() {player.playVideo();});
            document.getElementById("pauseYoutube").addEventListener("click", function() {player.pauseVideo();});
        }
    </script>
    <div id="play"></div>
    <div id="playYoutube1">воспроизведение</div>
    <div id="pauseYoutube1">пауза</div>

    <script src="//www.youtube.com/player_api"></script>
    <script>
        var play;
        function onYouTubePlayerAPIReady() {
            play = new YT.Player('play', {videoId: 'JMJXvsCLu6s',});
            document.getElementById('playYoutube1').onclick = function() {play.playVideo();};
            document.getElementById('pauseYoutube1').onclick = function() {play.pauseVideo();};
        }
    </script>

    <br><br><br><br>

    <h2 class="main-page-h2"><?= Yii::t('app', 'Popular artists') ?></h2>


<?php //echo print_r($item);?>
    <br><br>
    <div class="row row-flex">

        <?php foreach ($artistByPopularity as $artist): ?>

            <a href="/<?= Yii::$app->language ?>/artists/<?= $artist['url']; ?>/"
               class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates-artists-main">
                <div class="plates-artists-outside">
                    <div class="plates-artists">
                        <?php if ($artist['photos'] == 'asdsds'): ?>
                            <p>
                                <img class="plates-artists-img"
                                     src="/files/artists/<?= $artist['first_letter'] ?>/<?= $artist['photos'] ?>"
                                     alt="<?= $artist['name'] ?>"
                                     width="200">
                            </p>
                        <?php endif; ?>
                        <br><br><br><br>
                        <p class="plates-artists-title"><?= $artist['name']; ?></p>
                        <p class="plates-artists-under-title"><?php // $itemParent['short_description']; ?></p>
                        <br><br><br><br>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
    <br><br><br><br>
    <h2 class="main-page-h2"><?= Yii::t('app', 'Popular albums') ?></h2>
    <br><br>
    <div class="row row-flex">

        <?php foreach ($albumsByPopularity as $album): ?>

            <a href="/<?= Yii::$app->language ?>/albums/<?= $album['url']; ?>/"
               class="col-lg-3 col-md-3 col-sm-4 col-xs-6 col-xxs-12 plates-albums-main">
                <div class="plates-albums-outside">

                    <div class="plates-albums">
                        <p>
                            <img class="plates-img"
                                 src="/files/albums/<?= $album['first_letter'] ?>/<?= $album['photos'] ?>"
                                 alt="<?= $album['name'] ?>"
                                 width="210">

                        </p>

                        <p class="plates-albums-title"><?= $album['name']; ?>

                            <?php if ($album['year']): ?>
                                (<?= $album['year']; ?>)
                            <?php endif; ?>

                        </p>

                        <p class="plates-albums-artist-name"><?= $album['artistName']; ?>
                        </p>

                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>

    <br><br><br><br>
    <h2 class="main-page-h2"><?= Yii::t('app', 'Popular songs') ?></h2>
    <br><br>
    <div class="row row-flex">
        <?php //(new \common\components\dump\Dump())->printR($songsByPopularity); ?>
        <?php foreach ($songsByPopularity as $songs): ?>

            <a href="/<?= Yii::$app->language ?>/songs/<?= $songs['url']; ?>/"
               class="col-lg-3 col-md-4 col-sm-6 col-xs-12 main-pages-extended">
                <div class="plates-songs-outside">

                    <div class="plates-songs">

                        <?php if ($songs['albumPhoto']): ?>
                            <p>
                                <img class="plates-songs-img"
                                     src="/files/albums/<?= $songs['albumFirstLetter'] ?>/<?= $songs['albumPhoto'] ?>"
                                     alt="<?= $songs['name'] ?>"
                                     width="100">

                            </p>
                        <?php endif; ?>

                        <?= $songs['name']; ?>
                        <p class="plates-songs-title">

                        </p>

                        <p class="plates-songs-artist-name"><?= $songs['artistName']; ?>
                        </p>

                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>


    <br><br><br><br>
<?php

/*
 *
<a href="/script/first-letter/">first-letter</a><br>
<a href="/script/artists/">artists</a><br>
<a href="/script/albums/">albums</a><br>


 *             <?php if ($songs['year']): ?>
                            (<?php// $songs['year']; ?>)
                        <?php endif; ?>
 * */
 \yii\helpers\Url::toRoute(['youtube/index', 'param' => 42])
?>   