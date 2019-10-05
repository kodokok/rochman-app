@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('auditplan'))
@section('page-title', 'Audit Plan')
@section('page-action')
<a href="{{ route('auditplan.create') }}" class="btn btn-success float-right modal-show" title="Create New" style="margin-right: 5px;">
    <i class="fas fa-plus mr-2"></i>Create New
</a>
@endsection

@section('content')

<!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Departement</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Auditee</th>
                                <th>Auditor</th>
                                <th>Auditor Leader</th>
                                <th>Klausul</th>
                                <th style="width: 20%"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
<!-- /.content -->

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#datatables').DataTable({
        responsive: true,
        processing: true,
        scrollX: true,
        ajax: "{{ route('auditplan.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'departemen', name: 'departemen'},
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
