@if (isset($breadcrumbs))
    @if (count($breadcrumbs))
        <ol class="breadcrumb breadcrumb-right-arrow">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->url && !$loop->last)
                    <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ strtoupper($breadcrumb->title) }}</a></li>
                @else
                    <li class="breadcrumb-item active">{{ strtoupper($breadcrumb->title) }}</li>
                @endif

            @endforeach
        </ol>
    @endif
@endif
