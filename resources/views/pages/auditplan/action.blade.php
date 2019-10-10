@if ($model->approval_kadept == 0)
    <a href="{{ $url_send }}" class="btn btn-sm btn-primary send" title="Send Approval: {{ $model->id }}"><i class="fas fa-paper-plane"></i></a></a>
@endif
<a href="{{ $url_edit }}" class="btn btn-sm btn-primary edit" title="Edit: {{ $model->id }}"><i class="fas fa-pencil-alt"></i></a></a>
<a href="{{ $url_destroy }}" class="btn btn-danger btn-sm btn-delete" title="{{ $model->id }}"><i class="fas fa-trash"></i></a></a>

