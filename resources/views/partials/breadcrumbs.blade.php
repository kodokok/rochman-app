@if (isset($breadcrumbs))
    @if (count($breadcrumbs))
        <ol class="breadcrumb breadcrumb-right-arrow">
        {{-- <li class="nav-item"> --}}
            @foreach ($breadcrumbs as $breadcrumb)

                @if ($breadcrumb->url && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                    {{-- <a class="nav-link" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a> --}}
                @else
                    <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
                    {{-- <li class="nav-link disabled">{{ $breadcrumb->title }}</li> --}}
                @endif

            @endforeach
        {{-- </li> --}}
        </ol>
    @endif
@endif
