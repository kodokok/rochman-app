$(document).ready(function() {

    // display modal form
    $('.open-modal').click(function(){
        var user_id = $(this).val();

        $.get("{{route(''," + user_id + ")}}", function (data) {
            //success data
            console.log(data);
            // $('#task_id').val(data.id);
            // $('#task').val(data.task);
            // $('#description').val(data.description);
            // $('#btn-save').val("update");

            // $('#myModal').modal('show');
        })
    });

    // edit button
    $("#btn-edit").click(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'PUT',
            url: '/tasks/' + $("#frmEditTask input[name=task_id]").val(),
            data: {
                task: $("#frmEditTask input[name=task]").val(),
                description: $("#frmEditTask input[name=description]").val(),
            },
            dataType: 'json',
            success: function(data) {
                $('#frmEditTask').trigger("reset");
                $("#frmEditTask .close").click();
                window.location.reload();
            },
            error: function(data) {
                var errors = $.parseJSON(data.responseText);
                $('#edit-task-errors').html('');
                $.each(errors.messages, function(key, value) {
                    $('#edit-task-errors').append('<li>' + value + '</li>');
                });
                $("#edit-error-bag").show();
            }
        });
    });
});

function editUserForm(user_id) {
    $.ajax({
        type: 'GET',
        url: '/users/' + user_id,
        success: function(data) {
            // $("#edit-error-bag").hide();
            // $("#frmEditTask input[name=task]").val(data.task.task);
            // $("#frmEditTask input[name=description]").val(data.task.description);
            // $("#frmEditTask input[name=task_id]").val(data.task.id);
            $('#userFormModal').modal('show');
        },
        error: function(data) {
            console.log(data);
        }
    });
}
