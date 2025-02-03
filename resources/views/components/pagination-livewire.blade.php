@props(['items'])

<div class="d-flex justify-content-center mt-5 mb-5">
    <nav aria-label="Pagination">
        <ul class="pagination">
            <!-- Bouton Précédent -->
            @if ($items->onFirstPage())
                <li class="page-item disabled">
                    <button class="page-link" disabled>Previous</button>
                </li>
            @else
                <li class="page-item">
                    <button class="page-link" wire:click="previousPage" wire:loading.attr="disabled">Previous</button>
                </li>
            @endif

            <!-- Numéros de page -->
            @foreach (range(1, $items->lastPage()) as $page)
                <li class="page-item {{ $page == $items->currentPage() ? 'active' : '' }}">
                    <button class="page-link" wire:click="gotoPage({{ $page }})" wire:loading.attr="disabled">
                        {{ $page }}
                    </button>
                </li>
            @endforeach

            <!-- Bouton Suivant -->
            @if ($items->hasMorePages())
                <li class="page-item">
                    <button class="page-link" wire:click="nextPage" wire:loading.attr="disabled">Next</button>
                </li>
            @else
                <li class="page-item disabled">
                    <button class="page-link" disabled>Next</button>
                </li>
            @endif
        </ul>
    </nav>
</div>
