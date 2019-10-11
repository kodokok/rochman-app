@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('temuanaudit.create') }}" class="btn btn-success" title="Create Audit Plan">
                        <i class="fas fa-plus mr-2"></i>Create Temuan Audit
                    </a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
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
        responsive: true,
        processing: true,
        scrollX: true,
        ajax: "{{ route('temuanaudit.datatable') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'id'},

            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
