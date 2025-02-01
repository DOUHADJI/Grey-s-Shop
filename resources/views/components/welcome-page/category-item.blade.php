@props(["category"])

<!-- Composant de catégorie -->
<a href="{{ route("category.show",[ "slug" => $category->slug]) }}" class="nav-link swiper-slide text-center">
    <img src="{{ isset($category->image) ?  Storage::url($category->image) : '/images/phone.jpg' }}"
        class="rounded-circle home-category-item-avatar" alt="Category Thumbnail">
    <h4 class="fs-6 mt-3 fw-normal category-title">{{ $category->name }}</h4>
</a>
