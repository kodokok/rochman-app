@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Audit Plan Report</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('app') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('auditplan.index') }}">Audit Plan</a></li>
                    <li class="breadcrumb-item active">Report</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- this row will not appear when printing -->
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="col-12"> --}}
                            <a href="{{ route('auditplan.pdf', $auditplan->id) }}" target="_blank" class="btn btn-primary float-right" style="margin-right: 5px;">
                                <i class="fas fa-file-pdf mr-2"></i>Generate PDF</a>
                            <a href="{{ route('auditplan.print', $auditplan->id) }}" target="_blank" class="btn btn-secondary float-right" style="margin-right: 5px;">
                                <i class="fas fa-print mr-2"></i>Print</a>
                        {{-- </div> --}}
                    </div>
                </div><!-- Main content -->

                @include('auditplan.report.content')

            </div>
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection

@push('scripts')
<script>

</script>
@endpush
