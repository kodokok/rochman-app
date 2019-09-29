@extends('layouts.print')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">

                @include('auditplan.report.content')
            <!-- /.invoice -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
