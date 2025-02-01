@props(['category'])

<!-- Composant de catégorie -->
<div class="col-md-4 p-4 d-flex justify-items-center align-items-center">
    <a href="{{ route('category.show', ['slug' => $category->slug]) }}" class="nav-link swiper-slide text-center">
        <img src="{{ isset($category->image) ? Storage::url($category->image) : '/images/phone.jpg' }}"
            class="rounded-circle home-category-item-avatar" alt="Category Thumbnail">
        <h4 class="fs-6 mt-3 fw-normal category-title">{{ $category->name }}</h4>
    </a>
</div>
