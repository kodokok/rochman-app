@if ($url_show)
    <a href="{{ $url_show }}" class="btn btn-primary btn-sm btn-show" title="Detail: {{ $departemen->kode }}"><i class="fas fa-folder"></i></a></a>
@endif
@if ($url_edit)
    <a href="{{ $url_edit }}" class="btn btn-info btn-sm modal-show edit" title="Edit: {{ $departemen->kode }}"><i class="fas fa-pencil-alt"></i></a></a>
@endif
@if ($url_destroy)
    <a href="{{ $url_destroy }}" class="btn btn-danger btn-sm btn-delete" title="{{ $departemen->kode }}"><i class="fas fa-trash"></i></a></a>
@endif
