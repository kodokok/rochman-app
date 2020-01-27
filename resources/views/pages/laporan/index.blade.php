@extends('layouts.app')

@section('breadcrumbs', Breadcrumbs::render('laporan'))
{{-- @section('page-title', 'Laporan') --}}
@section('page-action')

@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Laporan</h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm">
                        <input type="text" class="form-control" placeholder="Search Report">
                        <div class="input-group-append">
                            <div class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="nav flex-column">
                            <li class="nav-item border-0">
                                <a href="{{ route('laporan.kompetensi-show') }}" class="nav-link modal-show-print" title="Kompetensi Auditor" >
                                    <i class="fas fa-chevron-right mr-2"></i>Kompetensi Auditor
                                </a>
                            </li>
                            <li class="nav-item border-0">
                                <a href="#" class="nav-link modal-show-print" title="Temuan Audit" >
                                    <i class="fas fa-chevron-right mr-2"></i>Temuan Audit
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>
@include('partials.modal-print')
@endsection
