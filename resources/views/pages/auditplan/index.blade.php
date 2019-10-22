@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('auditplan'))
@section('page-title', 'Audit Plan List')
@section('page-action')
@hasanyrole('admin|auditor_lead|auditor')
<a href="{{ route('auditplan.create') }}" class="btn btn-success float-right" title="Create New" style="margin-right: 5px;">
    <i class="fas fa-plus mr-2"></i>Create New
</a>
@endhasrole
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-bordered table-striped table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 20%">Departemen</th>
                            <th style="width: 5%">Status</th>
                            <th style="width: 5%">Tanggal</th>
                            <th style="width: 5%">Waktu</th>
                            <th style="width: 15%">Auditee</th>
                            <th style="width: 15%">Auditor</th>
                            <th style="width: 15%">Auditor Leader</th>
                            <th style="width: 5%">Klausul</th>
                            <th style="width: 15%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('partials.modal')
@endsection

@push('scripts')
<script>
$(document).ready(function() {

    $('#datatable').DataTable({
        stateSave: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('auditplan.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id', 'searchable': false, 'orderable': false},
            {data: 'departemen', name: 'departemen'},
            {data: 'approval_kadept', name: 'status', render: function(data) {
                return data ? '<span class="badge badge-success">Approved</span>' : '<span class="badge badge-info">Open</span>';
            }},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'waktu', name: 'waktu'},
            {data: 'auditee', name: 'auditee'},
            {data: 'auditor', name: 'auditor'},
            {data: 'auditor_lead', name: 'auditor_lead'},
            {data: 'klausul', name: 'klausul'},
            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });

    $("body").on("click", ".btn-approve", function(event) {
        event.preventDefault();

        var me = $(this);
        var url = me.attr('href');
        var title = me.attr('title');
        var csrf_token = $('meta[name="csrf-token"]').attr('content');

        Swal.fire({
            title: 'Apakah and ingin meng-' + title + '?',
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, approved!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        '_method': 'PUT',
                        '_token': csrf_token
                    },
                    success: function(response) {
                        window.location.href = response.redirect_to;
                    },
                    error: function(xhr, status, errorThrown)
                    {
                        var res = xhr.responseJSON;
                        toastr.error(res.message);
                    }
                });
            }
        });
    });
});
</script>
@endpush
