<x-default-layout title="{{ $article->title }}">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> {{ $article->title }} </h2>
        <x-breadcrumb previous-page-label="{{ $article->category->name }}"
            previous-page-route="{{ route('category.show', ['slug' => $article->category->slug]) }}"
            current-page-label="{{ $article->title }}" />

        @livewire('product-details-component', ['article' => $article])


        {{-- <x-article-search-form placeholder="Rechercher un article" label="Retrouver un article" /> --}}
        <div class="row mt-5 mb-5">
            <div class="col-12">

                <h4 class="mb-4 related-articles-title px-4 py-3"> Découvrez d'autres articles similaires</h4>
                <div class="product-grid row">

                    @foreach ($relatedArticles as $relatedArticle)
                        <x-product-item-card :article="$relatedArticle" wire:key="article-{{ $relatedArticle->id }}" />
                    @endforeach
                </div>
            </div>

        </div>



    </x-page-content-container>
</x-default-layout>
