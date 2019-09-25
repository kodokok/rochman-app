@if ($url_show)
    @if (!$model->konfirmasi_kadept)
        <a href="{{ $url_show }}" class="btn btn-primary btn-sm btn-show" title="View: {{ $model->objektif_audit }}"><i class="fas fa-eye"></i></a></a>
    @endif
@endif
@if ($url_edit)
    <a href="{{ $url_edit }}" class="btn btn-info btn-sm edit" title="Edit: {{ $model->objektif_audit }}"><i class="fas fa-pencil-alt"></i></a></a>
@endif
@if ($url_destroy)
    <a href="{{ $url_destroy }}" class="btn btn-danger btn-sm btn-delete" title="{{ $model->objektif_audit }}"><i class="fas fa-trash"></i></a></a>
@endif
