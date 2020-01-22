@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('laporan.kompetensi'))

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="report-option pb-2 mb-2">
            {{-- <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i>Print</a> --}}
            <form class="form-inline" method="GET" action="{{ route('laporan.kompetensi-data') }}" id="search-form">

                <label class="sr-only" for="inlineFormInputGroupUsername2">Nama Pencarian</label>
                <div class="input-group mb-2 mr-sm-2">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-search"></i></div>
                    </div>
                    <input type="text" class="form-control" id="namaPencarian" placeholder="Nama Pencarian">
                </div>
                <button type="submit" class="btn btn-primary mb-2">Preview</button>
            </form>
        </div>
    </div>
    <div class="col-md-4">
        <a id="print-button" href="#" target="_blank" class="btn btn-default float-right d-none"><i class="fas fa-print"></i> Print</a>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Report Preview</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-sm" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>
            <div class="card-body">
                <!-- Main content -->
                <div class="report p-3 mb-3" style="height: 430px; overflow-y: scroll;">
                    <!-- title row -->
                    <div class="row">
                        <div class="col-12">
                            <small class="float-right">{{ now()->format('d-m-Y') }}</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-center">
                                <u>LAPORAN KOMPTENSI AUDITOR</u>
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
                            <table id="tbl_report" class="table">
                                <thead>
                                    <tr class="bg-primary">
                                        <th>Nama</th>
                                        <th>Pelatihan</th>
                                        <th class="text-right">Nilai</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.report -->
            </div>
        </div>
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#search-form').submit(function (event) {
            event.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            var method = form.attr('method');
            $('#tbl_report tbody').empty();

            $.ajax({
                type: method,
                url: url,
                success: function(data) {
                    if(!data) {
                        $('#print-button').addClass('d-none');
                        return;
                    }
                    $.each(data.data, function(i, v) {
                        $group = '<tr class="font-weight-bold"><td colspan="3">' + v.nama + '</td></tr>';
                        $('#tbl_report tbody').append($group);

                        var sum = 0;
                        var counter = 0;
                        var avg = 0;
                        $.each(v.kompetensi_auditors, function(i, v) {
                            $detail = '<tr><td></td><td>'
                                + v.pelatihan + '</td><td class="text-right">'
                                + v.nilai + '</td></tr>';
                            $('#tbl_report tbody').append($detail);

                            sum += v.nilai;
                            counter++;
                        });
                        if (counter > 0) {
                            avg = sum / counter;
                        }
                        $subtotal = '<tr class="bg-secondary"><td colspan="2">Rata-Rata</td><td class="text-right">' + avg.toFixed(2) + '</td></tr>';
                        $('#tbl_report tbody').append($subtotal);
                        // console.log(v);
                    });
                    $('#print-button').removeClass('d-none');
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
    });
</script>
@endpush
