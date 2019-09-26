@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Temuan Audit</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item active">Temuan Audit</li>
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
                    <a href="{{ route('temuan.create') }}" class="btn btn-success title="Create Audit Plan">
                        <i class="fas fa-plus mr-2"></i>Create Temuan Audit
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatables" class="table table-bordered table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Audit Plan</th>
                                <th>Ketidaksesuaian</th>
                                <th>Akar Masalah</th>
                                <th>Tindakan Perbaikan</th>
                                <th>Tindakan Pencegahan</th>
                                <th>Review</th>
                                <th style="width: 20%"></th>
                            </tr>
                        </thead>
                        <tbody>
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
$(document).ready(function() {

});
</script>
@endpush
