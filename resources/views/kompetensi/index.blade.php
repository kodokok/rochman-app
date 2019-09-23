@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Kompetensi Auditor</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item active">Kompetensi Auditor</li>
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
                    <a href="{{ route('kompetensi.create') }}" class="btn btn-success modal-show" title="Create New Kompetensi Auditor">
                        <i class="fas fa-plus mr-2"></i>Create New Kompetensi Auditor
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatables" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Auditor</th>
                                <th>Pelatihan</th>
                                <th>Tanggal Pelatihan</th>
                                <th>Pendidikan</th>
                                <th>Masa Kerja</th>
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
            ajax: "{{ route('table.kompetensi') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'auditor', name: 'auditor'},
                {data: 'pelatihan', name: 'pelatihan'},
                {data: 'tanggal_pelatihan', name: 'tanggal_pelatihan'},
                {data: 'pendidikan', name: 'pendidikan'},
                {data: 'masa_kerja', name: 'masa_kerja'},
                {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
            ]
        });
    });
</script>
@endpush
