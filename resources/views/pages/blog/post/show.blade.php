<x-default-layout title="Blog">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> {{ $post->title }} </h2>
        <x-breadcrumb previous-page-label="Blog" :previous-page-route="route('blog.index')" current-page-label="{{ $post->title }}" />

        <div class="mt-5 py-5 row">
            <div class="post-img-container">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->slug }}" class="post-img">
            </div>
            <div class="mt-5">
                <h2 class="my-3"> {{ $post->title }} </h2>
                <div class="d-flex gap-3 fw-bold">
                    Tags : @foreach ($post->tags as $tag)
                        <span class="d-flex gap-1 align-items-center"> <svg width="16" height="16">
                                <use xlink:href="#tags"></use>
                            </svg> {{ $tag->name }} </span>
                    @endforeach
                </div>
                <div class="p-3">
                    <p class="">
                        {!! $post->content !!}
                    </p>
                    <div class="d-flex gap-5 items-center text-primary">
                        <div class="fw-bold">
                            <div class="meta-date">
                                <svg width="20" height="20">
                                    <use xlink:href="#calendar"></use>
                                </svg>
                                Publié
                                {{ \Carbon\Carbon::parse($post->created_at)->locale('fr')->diffForHumans() }}
                            </div>
                        </div>

                        <div class="fw-bold d-flex align-items-center gap-2">
                            <svg width="20" height="20">
                                <use xlink:href="#user"></use>
                            </svg>
                            <span>
                                par {{ config('app.name') }}
                            </span>
                        </div>
                    </div>
                </div>




            </div>
        </div>

    </x-page-content-container>
</x-default-layout>
