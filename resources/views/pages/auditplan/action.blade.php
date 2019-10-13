@if ($model->approval_kadept == 1)
    @hasanyrole('admin|auditor_lead|auditor')
    <a href="{{ $url_temuanaudit }}" class="btn btn-sm btn-success modal-show" title="Create Temuan"><i class="fas fa-check-double"></i></a></a>
    @endhasanyrole
@endif
<a href="{{ $url_show }}" class="btn btn-sm btn-info" title="Show: {{ $model->id }}"><i class="fas fa-eye"></i></a></a>
<a href="{{ $url_approve }}" class="btn btn-sm btn-warning" title="Approved: {{ $model->id }}"><i class="fas fa-thumbs-up"></i></a></a>
@hasanyrole('admin|auditor_lead|auditor')
<a href="{{ $url_edit }}" class="btn btn-sm btn-primary edit" title="Edit: {{ $model->id }}"><i class="fas fa-pencil-alt"></i></a></a>
<a href="{{ $url_destroy }}" class="btn btn-danger btn-sm btn-delete" title="Delete: {{ $model->id }}"><i class="fas fa-trash"></i></a></a>
@endhasanyrole
