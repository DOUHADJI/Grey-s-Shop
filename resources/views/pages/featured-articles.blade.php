<x-default-layout title="Articles en vedette">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> Articles en vedette </h2>
        <x-breadcrumb previous-page-label="Accueil" :previous-page-route="route('home')" current-page-label="Articles en vedette" />

        {{-- <x-article-search-form placeholder="Rechercher un article" label="Retrouver un article" /> --}}
        <div class="row mt-5 mb-5">
            @foreach ($articles as $article)
                <x-product-item-card :article="$article" />
            @endforeach
        </div>

        <x-pagination :items="$articles" />

    </x-page-content-container>
</x-default-layout>
