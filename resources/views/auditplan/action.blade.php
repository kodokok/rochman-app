@if (!$model->konfirmasi_kadept)
    <a href="{{ $url_show }}" class="btn btn-success btn-sm" title="Approve: {{ $model->objektif_audit }}"><i class="fas fa-eye"></i></a></a>
@endif
<a href="{{ $url_edit }}" class="btn btn-sm btn-primary edit" title="Edit: {{ $model->objektif_audit }}"><i class="fas fa-pencil-alt"></i></a></a>
<a href="{{ $url_destroy }}" class="btn btn-danger btn-sm btn-delete" title="{{ $model->objektif_audit }}"><i class="fas fa-trash"></i></a></a>
