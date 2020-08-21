<div class="modal fade" id="youtubeModal" data-backdrop="false" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    let youtubeModal = $('#youtubeModal').modal({'show': false});
    youtubeModal.on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let youtubeUrl = button.data('url');

        $.ajax({
            url: '<?= \yii\helpers\Url::toRoute(['youtube/index'])?>',
            type: 'post',
            data: {youtubeUrl: youtubeUrl},
            success(response) {
                // Add response in Modal body
                $('.modal-body').html(response);
                //$('#exampleModal').html(response);
                // Display Modal
                //$('#exampleModal').modal('show');
            }
        });
    });

    function showYoutubeModal(trigger) {
        // here you can call modal function programmatically
        // depending on your needs
        youtubeModal.modal('show', $(trigger));
    }
</script>