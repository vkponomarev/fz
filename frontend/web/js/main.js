
let youtubeModal = $('#youtubeModal').modal({'show': false});
youtubeModal.on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget);
    let url = button.data('url');

    $.ajax({
        url: '',
        type: 'post',
        data: {url: url},
    success(response) {
        // Add response in Modal body
        $('.modal-body').html(response);
        //$('#exampleModal').html(response);
        // Display Modal
        //$('#exampleModal').modal('show');
    }
});
});

function sYM(trigger) {
    // here you can call modal function programmatically
    // depending on your needs
    youtubeModal.modal('show', $(trigger));
}
