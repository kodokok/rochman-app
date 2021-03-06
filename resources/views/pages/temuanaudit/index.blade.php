@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('temuanaudit'))
@section('page-title', 'Temuan Audit List')
@section('page-action')

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
                                <th>Audit Plan ID</th>
                                <th>Klausul</th>
                                <th>Ketidaksesuaian</th>
                                <th>Akar Masalah</th>
                                <th>Klasifikasi</th>
                                <th>Status</th>
                                <th>Tindakan Perbaikan & Pencegahan</th>
                                <th>Tanggal Perbaikan & Pencegahan</th>
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
            {data: 'id', name: 'id'},
            {data: 'audit_plan_id', name: 'audit_plan_id'},
            {data: 'klausul.nama', name: 'klausul_nama'},
            {data: 'ketidaksesuaian', name: 'ketidaksesuaian'},
            {data: 'akar_masalah', name: 'akar_masalah'},
            {data: 'klasifikasi_temuan', name: 'klasifikasi', render: function(data) {
                return data ? 'Mayor' : 'Minor';
            }},
            {data: 'status', name: 'status'},
            {data: 'tindakan_perbaikan_pencegahan', name: 'tindakan_perbaikan_pencegahan'},
            {data: 'tanggal_perbaikan_pencegahan', name: 'tanggal_perbaikan_pencegahan'},
            {data: 'action', name: 'action', 'searchable': false, 'orderable': false, 'className': 'text-center'}
        ]
    });
});
</script>
@endpush
