<x-default-layout title="Rechercher un article">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> Rechercher un article </h2>
        <x-breadcrumb previous-page-label="Accueil" :previous-page-route="route('home')" current-page-label="Nous contacter" />

        <div class="container my-5 py-5 ">
            <div class="row">
                <div class="col-md-12">
                    <x-search-result-header :total="$articles->total()" :form-action-route="route('home')" />
                    <br>
                    <h3 class="text-primary text-underline"> Articles </h3>
                    <div class="row mt-5">
                        @forelse ($articles as $article)
                            <x-product-item-card :article="$article" />
                        @empty
                            <x-not-found-result />
                        @endforelse
                    </div>
                    <x-pagination :items="$articles" />
                </div>

                <div class="col-md-12">
                    <x-search-result-header :total="$posts->total()" :form-action-route="route('home')" />
                    <br>
                    <h3 class="text-primary text-underline"> Posts </h3>
                    <div class="row mt-5">
                        @forelse ($posts as $post)
                            <x-post-item-card :post="$post" />
                        @empty
                            <x-not-found-result />
                        @endforelse
                    </div>
                    <x-pagination :items="$posts" />
                </div>
            </div>
        </div>
    </x-page-content-container>
</x-default-layout>
