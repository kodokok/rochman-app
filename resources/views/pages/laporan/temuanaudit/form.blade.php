<div class="container-fluid">
    {!! Form::open([
    'route' => 'laporan.temuanaudit-print',
    'method' => 'POST'
    ]) !!}
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="example-date-input" class="col-form-label">Date From</label>
                <input class="form-control" type="date" value="" name="dateFrom" id="dateFrom">
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="example-date-input" class="col-form-label">Date To</label>
                <input class="form-control" type="date" value="" name="dateTo" id="dateTo">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="">Output</label>
                <div class="icheck-primary">
                    <input type="radio" name="output" value="pdf" id="pdf" checked>
                    <label class="font-weight-normal" for="pdf">PDF</label>
                </div>
                <div class="icheck-primary">
                    <input type="radio" name="output" value="excel" id="excel" disabled>
                    <label class="font-weight-normal" for="excel">Excel</label>
                </div>
            </div>
        </div>
    </div>
    {!! Form::close() !!}

</div>
