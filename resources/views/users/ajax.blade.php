<script>
$(function () {
    // datatable
    $('#datatable').DataTable({
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
    });

    // add button modal
    $('#add_button').click(function(){
        $('#formModal').modal('show');
    });

    // add form modal
    $('#user_form').on('submit', function(event){
        event.preventDefault();
        if($('#action').val() == 'Add') {
            $.ajax({
                url: "{{ route('users.store') }}",
                method: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                success: function(data) {
                    var html = '';
                    if (data.errors) {
                        html = '<div class="alert alert-danger">';

                        for (var count = 0; count < data.errors) {
                            html += '<p>' + data.errors[count] + '</p>';
                        }

                        html += '</div>';
                    }
                }
            });
        }
    });
});
</script>
