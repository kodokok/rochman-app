@extends('layouts.app')

@section('page-title', 'Dashboard')
@section('breadcrumbs', Breadcrumbs::render('dashboard'))

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                @include('partials.dashboard.small-box.auditplan')
                @include('partials.dashboard.small-box.temuanaudit')
            </div>
            <div class="col-md-9">
                @include('partials.dashboard.chart.temuanaudit')
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    Highcharts.chart('chartAudit', {
        chart: {
            type: 'column'
        },
        title: {
            text: ''
        },
        xAxis: {
            categories: {!! json_encode($legendTemuanAudit) !!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            max: 20,
            title: {
                text: 'Temuan Audit'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Open',
            data: {!! json_encode($dataTemuanAuditOpen) !!}

        }, {
            name: 'Closed',
            data: {!! json_encode($dataTemuanAuditClosed) !!}

        }]
    });
</script>
@endpush
