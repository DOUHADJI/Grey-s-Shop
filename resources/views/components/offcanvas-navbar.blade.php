<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
    <div class="offcanvas-header justify-content-between">
        <h4 class="fw-normal text-uppercase fs-6">Menu</h4>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
            <x-nav-item href="index.html" icon="#fruits" label="Fruits and vegetables" />
            <x-nav-item href="index.html" icon="#dairy" label="Dairy and Eggs" />
            <x-dropdown-nav-item
                icon="#beverages"
                label="Beverages"
                :sub-items="[
                    ['href' => 'index.html', 'label' => 'Water'],
                    ['href' => 'index.html', 'label' => 'Juice'],
                    ['href' => 'index.html', 'label' => 'Soda'],
                    ['href' => 'index.html', 'label' => 'Tea']
                ]"
            />
        </ul>
    </div>
</div>
