<div class="fade modal"data-backdrop=false id=yM><div class=modal-dialog role=document><div class=modal-content><div class=modal-body></div><div class=modal-footer><button class="btn btn-default"data-dismiss=modal type=button>Close</button></div></div></div></div><script>let youtubeModal = $('#yM').modal({'show': false});
    youtubeModal.on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let url = button.data('url');
        $.ajax({
            url: '<?= \yii\helpers\Url::toRoute(['youtube/index'])?>',
            type: 'post',
            data: {url: url},
            success(response) {
                $('.modal-body').html(response);
            }
        });
    });
    function sYM(trigger) {
        youtubeModal.modal('show', $(trigger));
    }</script>