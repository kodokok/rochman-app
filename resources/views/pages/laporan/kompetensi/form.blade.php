<div class="container-fluid">
    {!! Form::open([
    'route' => 'laporan.kompetensi-print',
    'method' => 'POST'
    ]) !!}
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label for="filter_nama">Filter Nama</label>
                <input type="text" name="filter_nama" id="filter_nama" class="form-control">
                <div id="error-name" class="invalid-feedback"></div>
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
            </div>
        </div>
    </div>
    {!! Form::close() !!}

</div>
