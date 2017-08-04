$('.deleteClass').on('click', function(e) {
    var inputData = $('#formDeleteClass').serialize();

    //var dataId = $('#btnDeleteProduct').attr('data-id');
    var dataId = $(this).attr('data-id');

    $.ajax({
        url: '{{ url("/school-classes") }}' + '/' + dataId,
        type: 'DELETE',
        data: inputData,
        success: function( msg ) {
            if ( msg.status === 'success' ) {
                toastr.success( msg.msg );
                setInterval(function() {
                    window.location.reload();
                }, 5900);
            }
        },
        error: function( data ) {
            if ( data.status === 422 ) {
                toastr.error('Cannot delete the category');
            }
        }
    });

    return false;
});
