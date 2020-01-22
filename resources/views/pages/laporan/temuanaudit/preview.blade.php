@extends('layouts.app')

{{-- @section('page-title', 'Laporan Temuan Audit') --}}
@section('breadcrumbs', Breadcrumbs::render('laporan.temuanaudit-preview'))

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Main content -->
        <div class="report p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h4>
                        <i class="fas fa-globe"></i> AdminLTE, Inc.
                        <small class="float-right">Date: 2/10/2014</small>
                    </h4>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row report-info">

            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Qty</th>
                                <th>Product</th>
                                <th>Serial #</th>
                                <th>Description</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-12">
                    <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>
                        Print</a>
                    <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                        Payment
                    </button>
                </div>
            </div>
        </div>
        <!-- /.report -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
