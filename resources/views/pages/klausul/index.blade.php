@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('klausul'))
@section('page-title', 'Klausul List')
@section('page-action')
{{--  <a href="{{ route('klausul.create') }}" class="btn btn-success float-right modal-show" title="Create New" style="margin-right: 5px;">
    <i class="fas fa-plus mr-2"></i>Create New
</a>  --}}
<a href="#modalForm" data-toggle="modal" data-href="{{ route('klausul.create') }}"
    class="btn btn-primary">New</a>
@endsection

@section('content')
{{--  @include('partials.modal')  --}}
@include('pages.klausul.modal')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="datatable" class="table table-responsive table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 20%">Objektif Audit</th>
                            <th style="width: 60%">Nama</th>
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
<script src="{{ asset('js/ajax.js') }}"></script>
<script>
$(document).ready(function() {
    $('#datatable').DataTable({
        stateSave: true,
        responsive: true,
        processing: true,
        serverSide: true,
        order: [3, 'asc'],
        ajax: "{{ route('klausul.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id', 'searchable': false, 'orderable': false},
            {data: 'objektif_audit', name: 'objektif_audit'},
            {data: 'nama', name: 'nama'},
            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
