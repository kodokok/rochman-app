@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('user'))
@section('page-title', 'User List')
@section('page-action')
<a href="{{ route('user.create') }}" class="btn btn-success float-right" style="margin-right: 5px;"><i class="fas fa-plus mr-2"></i>New User</a>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-responsive" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Phone</th>
                            <th>Pendidikan</th>
                            <th>Tanggal Masuk</th>
                            <th>Roles</th>
                            <th style="width: 20%"></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

        </div>

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
            ajax: "{{ route('user.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id', 'searchable': false, 'orderable': false},
                {data: 'nama', name: 'nama'},
                {data: 'email', name: 'email'},
                {data: 'alamat', name: 'alamat'},
                {data: 'phone', name: 'phone'},
                {data: 'pendidikan', name: 'pendidikan'},
                {data: 'tanggal_masuk', name: 'tanggal_masuk'},
                {data: 'roles', name: 'roles'},
                {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
            ]
        });
    });
</script>
@endpush
