$(document).ready(function() {
    $("body").on("click", ".modal-show", function(event) {
        event.preventDefault();

        var me = $(this),
            url = me.attr("href"),
            title = me.attr("title");

        $("#modal-title").text(title);
        $("#modal-btn-save").text(me.hasClass("edit") || me.hasClass("change") ? "Update" : "Create");

        $.ajax({
            url: url,
            dataType: "html",
            success: function(response) {
                $("#modal-body").html(response);
            }
        });

        $("#modal").modal("show");
    });

    $("#modal-btn-save").click(function(event) {
        event.preventDefault();

        var form = $('#modal-body form');
        var data = new FormData(form.get(0));
        // console.log(...data);
        var url = form.attr('action');

        var buttonText = $("#modal-btn-save").text();
        $("#modal-btn-save").text('Sending...');

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $('.is-invalid').removeClass('is-invalid');
                if (response.fail) {

                    for (const control in response.errors) {
                        $('input[name='+control+']').addClass('is-invalid');
                        $('#error-' + control).text(response.errors[control]);
                    }

                    $("#modal-btn-save").text(buttonText);
                } else {
                    $("#modal").modal("hide");
                    $('#datatable').DataTable().ajax.reload();
                    toastr.success('Saved', 'Data telah berhasil disimpan.');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                alert("Error: " + errorThrown);
                $("#modal-btn-save").text(buttonText);
            }
        })
    });

    $("body").on("click", ".btn-delete", function(event) {
        event.preventDefault();

        var me = $(this);
        var url = me.attr('href');
        var title = me.attr('title');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: 'Apakah and ingin menghapus ' + title + '?',
            text: "Data yang terhapus tidak bisa dikembalikan!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        '_method': 'DELETE',
                        '_token': csrf_token
                    },
                    success: function(response) {
                        $('#datatable').DataTable().ajax.reload(null, false);
                        toastr.warning('Deleted!', 'Data telah berhasil dihapus.');
                    }
                });
            }
        });
    });
});
