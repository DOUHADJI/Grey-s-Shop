<x-default-layout title="Blog">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> Blog </h2>
        <x-breadcrumb previous-page-label="Accueil" :previous-page-route="route('home')" current-page-label="Blog" />

        <div class="row mt-5 py-5 mb-5">
            <div class="col-md-9 px-4">
                <div class="container">
                    <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-lg-6 p-2">
                                <x-post-item-card :post="$post" />
                            </div>
                        @endforeach
                    </div>
                    <x-pagination :items="$posts" />
                </div>

            </div>

            <div class="col-md-3 blog-aside-section">
                <div class="">
                    <form action="" class="blog-search-post-form">
                        <h5 class="my-4 ">Rechercher un article</h5>
                        <div class="col-12">
                            <div class="form-group">
                                <input type="text" placeholder="Retrouver un article"
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
                    <form class="d-flex mt-3 gap-0" action="{{ route('home') }}">
                        <input class="form-control rounded-start rounded-0 bg-light contact-form-control" type="email"
                            placeholder="Email Address" aria-label="Email Address">
                        <button class="btn btn-dark rounded-end rounded-0" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>

        </div>

    </x-page-content-container>
</x-default-layout>
