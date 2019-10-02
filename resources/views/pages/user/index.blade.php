@extends('layouts.app')

@section('page-title', 'User List'))
@section('breadcrumbs', Breadcrumbs::render('user'))

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('user.create') }}" class="btn btn-success" title="New User">
                        <i class="fas fa-plus mr-2"></i>New User
                    </a>
                </div>

                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Phone</th>
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

</section>
@endsection

@push('scripts')
<link rel="stylesheet" href="{{ asset('plugins/datatables/dataTables.bootstrap4.css') }}">
@endpush

@push('scripts')
<script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('user.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id'},
                {data: 'nama', name: 'nama'},
                {data: 'email', name: 'email'},
                {data: 'alamat', name: 'alamat'},
                {data: 'phone', name: 'phone'},
                {data: 'roles', name: 'roles'},
                {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
            ]
        });
    });
</script>
@endpush
