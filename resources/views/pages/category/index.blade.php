<x-default-layout title="Categories d'articles">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> Nos categories d'articles </h2>
        <x-breadcrumb previous-page-label="Accueil" :previous-page-route="route('home')" current-page-label="Nos categories d'article" />

        {{-- <x-article-search-form placeholder="Rechercher un article" label="Retrouver un article" /> --}}
        <div class="row mt-5 mb-5">
            @foreach ($categories as $category)
                <x-category-item :category="$category" />
            @endforeach
        </div>

    </x-page-content-container>
</x-default-layout>
