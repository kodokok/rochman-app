{{-- <a href="{{ $url_show }}" class="btn btn-primary btn-sm btn-show" title="Detail: {{ $model->name }}"><i class="fas fa-folder"></i></a></a> --}}
<a href="{{ $url_edit }}" class="btn btn-info btn-sm modal-show edit" title="Edit: {{ $model->name }}"><i class="fas fa-pencil-alt"></i></a></a>
<a href="{{ $url_destroy }}" class="btn btn-danger btn-sm btn-delete" title="{{ $model->name }}"><i class="fas fa-trash"></i></a></a>
