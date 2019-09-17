$('body').on('click','.modal-show', function(event) {
    event.preventDefault();

    var me = $(this),
        url = me.attr('href'),
        title = me.attr('title');

    $('#modal-title').text(title);
    $('#modal-btn-save').text('Create');

    $.ajax({
        url: url,
        dataType: 'html',
        success: function (response) {
            $('#modal-body').html(response);
        }
    });

    $('#modal').modal('show');
});

$('#modal-btn-save').click(function(event) {
    event.preventDefault();

    var form = $('#modal-body form'),
        url = form.attr('action'),
        method = $('input[name=_method]').val() == undefined ? 'POST' : 'PUT';

    $.ajax({
       url: url,
       method: method,
       data: form.serialize(),
       success: function(response) {

       },
       error: function(xhr) {
           var res = xhr.responseJSON;
           if ($.isEmptyObject(res) == false) {
               $.each(res.errors, function (key, value) {
                    $('#' + key).closest('.form-control').addClass('is-invalid');
                    $('#' + key).closest('.form-control').append(
                            '<span class="has-error">' + value + '</span>'
                        );
               });
           }
       }
    });
})
