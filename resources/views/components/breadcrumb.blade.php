@props(['previousPageLabel', 'previousPageRoute', 'currentPageLabel'])

<div class="mt-2 mb-2">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ $previousPageRoute }}">{{ $previousPageLabel }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $currentPageLabel }}
            </li>
        </ol>
    </nav>
</div>
