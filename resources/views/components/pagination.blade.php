@props(['items'])
<div class="d-flex justify-content-center mt-5 mb-5 ">
    <nav aria-label="...">
        <ul class="pagination">
            <!-- Previous Button -->
            @if ($items->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $items->previousPageUrl() }}" tabindex="-1">Previous</a>
                </li>
            @endif

            <!-- Pagination Numbers -->
            @foreach ($items->getUrlRange(1, $items->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $items->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Next Button -->
            @if ($items->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $items->nextPageUrl() }}">Next</a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                </li>
            @endif
        </ul>
    </nav>
</div>
