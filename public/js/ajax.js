// https://www.codovel.com/complete-laravel-5-crud-ajax-popup-modal-form.html

// $(document).on('click', 'a.page-link', function (e) {
//     e.preventDefault();
//     ajaxLoad($(this).attr('href'));
// });

$(document).on('submit', 'form#frm', function (e) {
    e.preventDefault();
    var form = $(this);
    var data = new FormData($(this)[0]);

    var url = form.attr('action');

    $.ajax({
        type: form.attr('method'),
        url: url,
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (data) {
            $('.is-invalid').removeClass('.is-invalid');
            if (data.fail) {
                for (control in data.errors) {
                    $('input[name='+control+']').addClass('is-invalid');
                    $('#error-' + control).html(data.errors[control]);
                }
            } else {
                $('#modalForm').modal('hide');
                ajaxLoad(data.redirect_url);
            }
        },
        error: function (xhr, textStatus, errorThrown) {
            alert("Error: " + errorThrown);
        }
    });
    return false;
});

function ajaxLoad(url, content) {
    content = typeof content !== undefined ? content : 'content';
    $.ajax({
        type: 'GET',
        url: url,
        contentType: false,
        success: function (data) {
            $('#' + content).html(data);
        },
        error: function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function ajaxDelete(filename, token, content) {
    content = typeof content !== undefined ? content : 'content';
    $('.loading').show();

    $.ajax({
        type: 'POST',
        data: {_method: 'DELETE', _token: token},
        url: filename,
        success: function (data) {
            $('#modalDelete').modal('hide');
            $('#' + content).html(data);
            $('.loading').hide();
        },
        error: function (xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

$('#modal').on('show.bs.modal', function(e) {
    var button = $(e.relatedTarget);
    var url = button.attr("href");
    var title = button.attr("title");
    var modal = $(this);

    modal.find('#modal-title').text(title);
    modal.find('#modal-btn-save').text(button.hasClass('edit') ? 'Update' : 'Create');

    ajaxLoad(url, 'modal-body');
    // console.log(url);
});

$('#modalDelete').on('show.bs.modal', function(e) {
    var button = $(e.relatedTarget);
    $('#delete_id').val(button.data('id'));
    $('#delete_token').val(button.data('token'));
});

$('#modalForm').on('show.bs.modal', function() {
    $('#focus').trigger('focus');
})
