<a href="{{ $url_edit }}" class="btn btn-sm btn-primary edit" title="Edit: {{ $model->id }}"><i class="fas fa-pencil-alt"></i></a></a>
@hasanyrole('admin|auditor_lead|auditor')
    @if (!$model->isClosed())
        <a href="{{ $url_destroy }}" class="btn btn-danger btn-sm btn-delete" title="{{ $model->id }}"><i class="fas fa-trash"></i></a></a>
    @endif
@endhasanyrole

