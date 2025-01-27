<div class="col">
    <div class="card border-0 {{ $bgColor }} rounded-0 p-4 text-light">
        <div class="row">
            <div class="col-md-3 text-center">
                <svg width="60" height="60">
                    <use xlink:href="{{ $icon }}"></use>
                </svg>
            </div>
            <div class="col-md-9">
                <div class="card-body p-0">
                    <h5 class="text-light">{{ $title }}</h5>
                    <p class="card-text">{{ $description }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
