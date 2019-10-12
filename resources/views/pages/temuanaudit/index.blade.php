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
                                <th>Audit Plan ID</th>
                                <th>Klausul ID</th>
                                <th>Ketidaksesuaian</th>
                                <th>Akar Masalah</th>
                                <th>Klasifikasi</th>
                                <th>Status</th>
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
            {data: 'klausul_id', name: 'klausul_id'},
            {data: 'ketidaksesuaian', name: 'ketidaksesuaian'},
            {data: 'akar_masalah', name: 'akar_masalah'},
            {data: 'klasifikasi_temuan', name: 'klasifikasi'},
            {data: 'status', name: 'status'},

            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
