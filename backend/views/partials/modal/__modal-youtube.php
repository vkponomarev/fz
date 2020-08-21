<div class="modal fade" id="youtubeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
       $('#youtubeModal').on('show.bs.modal', function (event) {

        let button = $(event.relatedTarget) // Button that triggered the modal
        let youtubeUrl = button.data('url') // Extract info from data-* attributes

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

    //$('#youtubeModal').on('hidden.bs.modal', function (event) {
    //    $('#youtubeModal').modal('toggle')
    //})

</script>


