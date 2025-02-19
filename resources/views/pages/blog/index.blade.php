<x-default-layout title="Blog">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> Blog </h2>
        <x-breadcrumb previous-page-label="Accueil" :previous-page-route="route('home')" current-page-label="Blog" />

        <div class="row mt-5 py-5 mb-5">
            <div class="col-md-9 px-4">
                @if (request()->input('search-term'))
                    <x-search-result-header :total="$posts->total()" :form-action-route="route('blog.index')" />
                @endif
                <div class="container">
                    <div class="row">
                        @forelse ($posts as $post)
                            <div class="col-lg-6 p-2">
                                <x-post-item-card :post="$post" />
                            </div>
                        @empty
                            <h3 class="text-center text-muted">Aucun résultat trouvé</h3>
                        @endforelse
                    </div>
                    <x-pagination :items="$posts" />
                </div>

            </div>

            <div class="col-md-3 blog-aside-section">
                <div class="">
                    <form action="" method="GET" class="blog-search-post-form">
                        <h5 class="my-4 ">Rechercher un article</h5>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" name="search-term" placeholder="Retrouver un article"
                                    value="@if (request()->input('search-term')) {{ request()->input('search-term') }} @endif"
                                    class="form-control contact-form-control">
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Rechercher
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <hr class="my-5">

                <div class="blog-categories-section">
                    <h5> Catégories </h5>
                    <ul>
                        @foreach ($categories as $category)
                            <li> <a class="blog-aside-section-category-link"
                                    href="{{ route('category.show', ['slug' => $category->slug]) }}">{{ $category->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <hr class="my-5">

                <div class="p-3 bg-white mt-5 blog-news-letter-section">
                    <h5 class=""> S'abonner à la newsletter</h5>
                    @livewire("subscribe-newsletter-component")
                </div>
            </div>

        </div>

    </x-page-content-container>
</x-default-layout>
