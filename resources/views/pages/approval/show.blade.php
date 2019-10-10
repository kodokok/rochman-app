@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('approval.show'))
@section('page-title', 'Approval Request')
@section('page-action')
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatables" class="table table-bordered table-striped table-responsive" style="width:100%">
                        <thead>
                            <tr>
                                <th style="width: 5%">#</th>
                                <th style="width: 5%">Tanggal</th>
                                <th style="width: 5%">Waktu</th>
                                <th style="width: 15%">Auditee</th>
                                <th style="width: 15%">Auditor</th>
                                <th style="width: 15%">Auditor Leader</th>
                                <th style="width: 20%">Klausul</th>
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

@endsection

@push('scripts')
<script>

</script>
@endpush
