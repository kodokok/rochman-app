@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Audit Plan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Audit Plan</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('auditplan.create') }}" class="btn btn-success modal-show" title="Create New Departement">
                        <i class="fas fa-plus mr-2"></i>Create Audit Plan
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatables" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Objektif Audit</th>
                                <th>Klausul</th>
                                <th>Departement</th>
                                <th>Konfirmasi Kadept</th>
                                <th>Auditee</th>
                                <th>Auditor</th>
                                <th>Auditor Leader</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
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
</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#datatables').DataTable({
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('table.auditplan') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'objectif_audit', name: 'objectif_audit'},
            {data: 'klausul', name: 'lokasi'},
            {data: 'departement', name: 'departement'},
            {data: 'konfirmasi_kadept', name: 'konfirmasi_kadept'},
            {data: 'auditee', name: 'auditee'},
            {data: 'auditor', name: 'auditor'},
            {data: 'auditor_leader', name: 'auditor_leader'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'waktu', name: 'waktu'},
            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
