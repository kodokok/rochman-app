@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('roles'))
@section('page-title', 'Role List')
@section('page-action')
<a href="{{ route('roles.create') }}" class="btn btn-success float-right modal-show" title="Create New Role" style="margin-right: 5px;">
    <i class="fas fa-plus mr-2"></i>Create New
</a>
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
                            <th style="width: 30%">Role</th>
                            <th style="width: 30%">Guard</th>
                            <th style="width: 30%">Users</th>
                            <th style="width: 10%"></th>
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
        ajax: "{{ route('roles.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id', 'searchable': false, 'orderable': false},
            {data: 'name', name: 'name'},
            {data: 'guard_name', name: 'guard_name'},
            {data: 'users', name: 'users'},
            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
