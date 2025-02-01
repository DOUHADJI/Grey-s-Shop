@props(["post"])

<div class="p-3 h-100">
    <article class="post-item card border-0 shadow-sm post-container">
        <div class="image-holder zoom-effect .home-post-item-img-container">
            <a href="{{ route('post.show', ['slug' => $post->slug]) }}">
                <img src="{{ $post->image ? Storage::url($post->image) : asset('images/phone.jpg') }}" alt="post"
                    class="card-img-top home-post-item-img">
            </a>
        </div>
        <div class="card-body">
            <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center text-primary">
                <div class="meta-categories">
                    <svg width="16" height="16">
                        <use xlink:href="#category"></use>
                    </svg>
                    {{ $post->category->name }}
                </div>
            </div>
            <div class="post-header mt-3">
                <h3 class="post-title">
                    <a href="{{ route('post.show', ['slug' => $post->slug]) }}"
                        class="text-decoration-none custom-post-title">
                        {{ \Str::limit($post->title, 50) }}
                    </a>
                </h3>
                <p class="text-justify">{{ \Str::limit($post->resume, 100) }}</p>

                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                    <div class="meta-date text-primary">
                        <svg width="16" height="16">
                            <use xlink:href="#calendar"></use>
                        </svg>
                        Publié {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
