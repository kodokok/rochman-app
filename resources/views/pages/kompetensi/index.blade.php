@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('kompetensi'))
@section('page-title', 'Kompetensi Auditor')
@section('page-action')
<a href="{{ route('kompetensi.create') }}" class="btn btn-success float-right modal-show" title="Create New" style="margin-right: 5px;">
    <i class="fas fa-plus mr-2"></i>Create New
</a>
@endsection

@section('content')
    @include('partials.modal')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th style="width:20%;">Auditor</th>
                                <th style="width:50%;">Pelatihan</th>
                                <th style="width:10%;">Nilai</th>
                                <th style="width:20%;"></th>
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
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('kompetensi.datatable') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'id', 'searchable': false, 'orderable': false},
                {data: 'auditor', name: 'auditor'},
                {data: 'pelatihan', name: 'pelatihan'},
                {data: 'nilai', name: 'nilai'},
                {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
            ]
        });
    });
</script>
@endpush
