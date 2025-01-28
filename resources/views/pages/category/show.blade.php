<x-default-layout title="{{ $category->name }}">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> {{ $category->name }} </h2>
        <x-breadcrumb previous-page-label="Catégories de produits" :previous-page-route="route('category.index')" current-page-label="Produits" />

        {{-- <x-article-search-form placeholder="Rechercher un article" label="Retrouver un article" /> --}}
        <div class="row mt-5 mb-5">
            @foreach ($articles as $article)
                <x-product-item-card :article="$article" />
            @endforeach
        </div>

        <x-pagination :items="$articles" />

    </x-page-content-container>
</x-default-layout>
