<section id="latest-blog" class="pb-4">
    <div class="container-lg">
        <div class="row">
            <div class="section-header d-flex align-items-center justify-content-between my-4">
                <h2 class="section-title">Post récents</h2>
                <a href="{{ route("blog.index") }}" class="btn btn-primary">Voir tout</a>
            </div>
        </div>
        <div class="row">
            @foreach ($recentPosts as $post)
     c           <div class="col-md-4">
                    <x-post-item-card :post="$post" />
                </div>
            @endforeach

        </div>
    </div>
</section>
