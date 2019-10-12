@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Audit Plan</th>
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
            {data: 'audit_plan_id', name: 'audit_plan_id'},

            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
