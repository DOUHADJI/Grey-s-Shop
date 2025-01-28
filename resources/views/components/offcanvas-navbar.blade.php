<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header justify-content-between">
        <h4 class="fw-normal text-uppercase fs-6">Catégories d'articles</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
            @foreach ($categories as $category)
                <x-nav-item href="{{ route('category.show', ['slug' => $category->slug]) }}" icon="#categories"
                    label="{{ $category->name }}" />
            @endforeach

            {{-- <x-dropdown-nav-item icon="#beverages" label="Beverages" :sub-items="[
                ['href' => '{{ route("home") }}', 'label' => 'Water'],
                ['href' => '{{ route("home") }}', 'label' => 'Juice'],
                ['href' => '{{ route("home") }}', 'label' => 'Soda'],
                ['href' => '{{ route("home") }}', 'label' => 'Tea'],
            ]" /> --}}
        </ul>
    </div>
</div>
