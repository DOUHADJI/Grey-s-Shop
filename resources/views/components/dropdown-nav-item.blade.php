<li class="nav-item border-dashed">
    <button
        class="btn btn-toggle dropdown-toggle position-relative w-100 d-flex justify-content-between align-items-center text-dark p-2"
        data-bs-toggle="collapse"
        data-bs-target="#{{ Str::slug($label) }}-collapse"
        aria-expanded="false"
    >
        <div class="d-flex gap-3">
            <svg width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="{{ $icon }}"></use>
            </svg>
            <span>{{ $label }}</span>
        </div>
    </button>
    <div class="collapse" id="{{ Str::slug($label) }}-collapse">
        <ul class="btn-toggle-nav list-unstyled fw-normal ps-5 pb-1">
            @foreach ($subItems as $item)
                <li class="border-bottom py-2">
                    <a href="{{ $item['href'] }}" class="dropdown-item">{{ $item['label'] }}</a>
                </li>
            @endforeach
        </ul>
    </div>
</li>
