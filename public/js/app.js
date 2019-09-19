$(document).ready(function() {
    $("body").on("click", ".modal-show", function(event) {
        event.preventDefault();

        var me = $(this),
            url = me.attr("href"),
            title = me.attr("title");

        $("#modal-title").text(title);
        $("#modal-btn-save").text('me.hasClass("edit")');

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

        var form = $("#modal-body form");
        var url = form.attr("action");
        var method =
            $("input[name=_method]").val() == undefined ? "POST" : "PUT";

        $(".invalid-feedback").hide();
        $(".is-invalid").removeClass("is-invalid");

        $.ajax({
            url: url,
            method: method,
            data: form.serialize(),
            success: function(res) {
                form.trigger("reset");
                $("#modal").modal("hide");
                $("#datatables")
                    .DataTable()
                    .ajax.reload();
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
});
