$(document).ready(function() {

    $("body").on("click", ".modal-show", function(event) {
        event.preventDefault();

        var me = $(this),
            url = me.attr("href"),
            title = me.attr("title");

        $("#modal-title").text(title);
        $("#modal-btn-save").text(me.hasClass("edit") ? "Update" : "Create");

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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var form = $("#modal-body form");
        var formData = new FormData(form[0]);
        var url = form.attr("action");
        var method = $("input[name=_method]").val() == undefined ? "POST" : "PUT";

        $(".invalid-feedback").hide();
        $(".is-invalid").removeClass("is-invalid");

        $.ajax({
            url: url,
            method: method,
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                form.trigger("reset");
                $("#modal").modal("hide");
                if ($("#datatables").length) {
                    $("#datatables").DataTable().ajax.reload();
                }
            },
            error: function(xhr) {
                var res = xhr.responseJSON;
                if ($.isEmptyObject(res) == false) {
                    $.each(res.errors, function(key, value) {
                        $("#" + key).addClass("is-invalid");
                        $("#error-" + key).show();
                        $("#error-" + key).html(value);
                    });
                }
            }
        });
    });

    $("body").on("click", ".btn-delete", function(event) {
        event.preventDefault();

        var me = $(this);
        var url = me.attr('href');
        var title = me.attr('title');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: 'Are you sure want to delete ' + title + '?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
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
                        $('#datatables').DataTable().ajax.reload();
                        Swal.fire(
                            'Deleted!',
                            'Data has been deleted.',
                            'success'
                        );
                    }
                });
            }
        });
    });
});
