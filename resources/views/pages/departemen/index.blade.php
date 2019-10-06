@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('departemen'))
@section('page-title', 'Departemen List')
@section('page-action')
<a href="{{ route('departemen.create') }}" class="btn btn-success float-right modal-show" title="Create New" style="margin-right: 5px;">
    <i class="fas fa-plus mr-2"></i>Create New
</a>
@endsection

@section('content')
@include('partials.modal')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-responsive table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width: 10%">Kode</th>
                                <th style="width: 20%">Nama</th>
                                <th style="width: 30%">Lokasi</th>
                                <th style="width: 20%">Kadept</th>
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

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        stateSave: true,
        responsive: true,
        processing: true,
        serverSide: true,
        ajax: "{{ route('departemen.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id', 'searchable': false, 'orderable': false},
            {data: 'kode', name: 'nama'},
            {data: 'nama', name: 'nama'},
            {data: 'lokasi', name: 'lokasi'},
            {data: 'kadept', name: 'kadept'},
            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
