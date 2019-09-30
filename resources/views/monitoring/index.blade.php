@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Monitoring Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item active">Monitoring Audit</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="form-group row">
                        <div class="col-sm-2">
                            <input type="text" class="form-control" placeholder="Tanggal Awal">
                        </div>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" placeholder="Tanggal Akhir">
                        </div>
                        <div class="col-sm-2">
                        <a href="{{ route('monitoring.index') }}" class="btn btn-success" title="Monitoring Audit">
                            <i class="fas fa-search"></i>
                        </a>
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('monitoring.index')  }}" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-file-pdf mr-2"></i>Generate PDF</a>
                            <a href="{{ route('monitoring.index')  }}" target="_blank" class="btn btn-secondary float-right" style="margin-right: 5px;">
                                <i class="fas fa-print mr-2"></i>Print</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatables" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th rowspan="2">No. Audit</th>
                                <th rowspan="2">Objektif</th>
                                <th rowspan="2">Klausul</th>
                                <th rowspan="2">Tanggal</th>
                                <th rowspan="2">Approval</th>
                                <th rowspan="2">Ketidaksesuaian</th>
                                <th rowspan="2">Akar Masalah</th>
                                <th colspan="2">Perbaikan</th>
                                <th colspan="2">Pencegahan</th>
                                <th rowspan="2">Status</th>
                            </tr>
                            <tr>
                                <th>Tindakan</th>
                                <th>Due Date</th>
                                <th>Tindakan</th>
                                <th>Due Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($auditplans as $auditplan)
                                <tr>
                                    <td>{{ $auditplan->id }}</td>
                                    <td>{{ $auditplan->objektif_audit }}</td>
                                    <td>{{ $auditplan->klausul }}</td>
                                    <td>{{ $auditplan->getSchedule() }}</td>
                                    <td>{{ $auditplan->approval }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>
</script>
@endpush
