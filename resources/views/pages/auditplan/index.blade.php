@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('auditplan'))
@section('page-title', 'Audit Plan List')
@section('page-action')
<a href="{{ route('auditplan.create') }}" class="btn btn-success float-right" title="Create New" style="margin-right: 5px;">
    <i class="fas fa-plus mr-2"></i>Create New
</a>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatables" class="table table-bordered table-striped table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 20%">Departement</th>
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
    $('#datatables').DataTable({
        stateSave: true,
        responsive: true,
        processing: true,
        serverSide: true,
        search: {
            regex: true,
        },
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

});
</script>
@endpush
