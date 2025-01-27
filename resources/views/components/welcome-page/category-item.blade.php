
<!-- Composant de catégorie -->
<a href="{{ route("category.show",[ "slug" => $slug]) }}" class="nav-link swiper-slide text-center">
    <img src="{{ isset($image) ?  Storage::url($image) : '/images/phone.jpg' }}"
        class="rounded-circle home-category-item-avatar" alt="Category Thumbnail">
    <h4 class="fs-6 mt-3 fw-normal category-title">{{ $title }}</h4>
</a>
