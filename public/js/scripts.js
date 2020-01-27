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
                        $('#' + control).addClass('is-invalid');
                        $('#error-' + control).text(response.errors[control]);
                    }

                    $("#modal-btn-save").text(buttonText);
                } else {
                    $("#modal").modal("hide");
                    $('#datatable').DataTable().ajax.reload(null, false);
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
                        if (response.redirect_to) {
                            window.location.href = response.redirect_to;
                        }
                    },
                    error: function(status)
                    {
                        console.log(status);
                    }
                });
            }
        });
    });

    $("body").on("click", ".modal-show-print", function(event) {
        event.preventDefault();

        var me = $(this),
            url = me.attr("href"),
            title = me.attr("title");

        $("#modal-title").text(title);

        $('#modal-loader').show();
        $('#modal-content').html('');

        $.ajax({
            url: url,
            type: 'GET',
            dataType: "html",
            success: function(response) {
                $('#modal-content').html('');
                $("#modal-content").html(response);
                $('#modal-loader').hide();
            },
            error: function(xhr, textStatus, errorThrown) {
                $("#modal-content").html('<i>'+ errorThrown + '<i/>');
                $('#modal-loader').hide();
            }
        });

        $("#modal-print").modal("show");
    });

    $("#modal-btn-print").click(function(event) {
        event.preventDefault();

        var form = $('#modal-content form');
        var data = new FormData(form.get(0));
        // console.log(...data);
        var url = form.attr('action');

        var buttonText = $("#modal-btn-print").text();
        $("#modal-btn-print").text('Sending...');

        $.ajax({
            url: url,
            method: 'POST',
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                toastr.success('Success', 'Report berhasil dibuat.');
                $("#modal-btn-print").text(buttonText);
                $("#modal-print").modal("hide");
                if (response.url) {
                    window.open(response.url, '_blank');
                }
            },
            error: function (xhr, textStatus, errorThrown) {
                $("#modal-print").modal("hide");
                $("#modal-btn-print").text(buttonText);
                toastr.error('Error', 'Report gagal dibuat.' . errorThrown);
            }
        })
    });
});
