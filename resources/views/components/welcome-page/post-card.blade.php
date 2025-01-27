@props([
    'image' => asset('images/phone.jpg'),
    'date' => '22 Aug 2021',
    'category' => 'tips & tricks',
    'title' => 'Top 10 casual look ideas to dress up your kids',
    'excerpt' =>
        'Lorem ipsum dolor sit amet, consectetur adipi elit. Aliquet eleifend viverra enim tincidunt donec quam. A in arcu, hendrerit neque dolor morbi...',
    'url' => '#',
])
<div class="col-md-4">
    <article class="post-item card border-0 shadow-sm p-3">
        <div class="image-holder zoom-effect">
            <a href="{{ $url }}">
                <img src="{{ $image }}" alt="post" class="card-img-top home-post-item-img">
            </a>
        </div>
        <div class="card-body">
            <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                <div class="meta-date">
                    <svg width="16" height="16">
                        <use xlink:href="#calendar"></use>
                    </svg>
                    {{ $date }}
                </div>
                <div class="meta-categories">
                    <svg width="16" height="16">
                        <use xlink:href="#category"></use>
                    </svg>
                    {{ $category }}
                </div>
            </div>
            <div class="post-header">
                <h3 class="post-title">
                    <a href="{{ $url }}" class="text-decoration-none">{{ $title }}</a>
                </h3>
                <p>{{ $excerpt }}</p>
            </div>
        </div>
    </article>
</div>
