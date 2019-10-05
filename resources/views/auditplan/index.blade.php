@extends('layouts.app')

@section('content')

<!-- Main content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('auditplan.create') }}" class="btn btn-success" title="Create Audit Plan">
                        <i class="fas fa-plus mr-2"></i>Create Audit Plan
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Departemen</th>
                                <th>Klausul</th>
                                <th>Approval</th>
                                <th>Auditee</th>
                                <th>Auditor</th>
                                <th>Auditor Lead</th>
                                <th>Tanggal</th>
                                <th>Waktu</th>
                                <th>Temuan</th>
                                <th>Remarks</th>
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
    $('#datatable').DataTable({
        responsive: true,
        processing: true,
        scrollX: true,
        ajax: "{{ route('auditplan.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},
            {data: 'departement', name: 'departement'},
            {data: 'klausul', name: 'klausul'},
            {data: 'approval_kadept', name: 'approval_kadept'},
            {data: 'auditee', name: 'auditee'},
            {data: 'auditor', name: 'auditor'},
            {data: 'auditor_lead', name: 'auditor_lead'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'waktu', name: 'waktu'},
            {data: 'temuan', name: 'temuan'},
            {data: 'remarks', name: 'remarks'},
            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
