<div class="row">
    <div class="col-md-3 p-3 filters-container">
        <h4 class="mb-3">Filtres</h4>
        <div class="col-12">
            <div class="form-group">
                <label for="category" class="">Categorie</label>
                <select name="category" id="" class="form-control" form="shop-search-form">
                    <option value=""> -- Filtrer par catégorie -- </option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->slug }}" @if (request()->input('category') == $category->slug) selected @endif>
                            {{ $category->name }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <x-ranger-slider />
                <div class="mt-5 d-flex justify-content-center">
                    <button onclick="window.location.href='{{ route('shop') }}'" href="{{ route('shop') }}"
                        class="btn btn-warning btn-block mx-1">
                        Réinitialiser
                    </button>
                    <button class="btn btn-primary btn-block mx-1" type="submit" form="shop-search-form">
                        Appliquer
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-9 p-4 h-100">
        <div class="d-flex align-items-center bg-primary h-100">
            <form action="{{ route('shop') }}" method="GET" class="shop-search-container col-6" id="shop-search-form">

                <div class="form-group">
                    <label for="Rechercher un article">Rechercher un article</label>
                    <input type="text" class="form-control contact-form-control" name="title"
                        placeholder="Rechercher ici"
                        value="@if (request()->input('title')) {{ request()->input('title') }} @endif">
                </div>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" form="shop-search-form">
                        Rechercher
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-12 p-4">
        <h3 class="text-primary my-2">Articles en vente (+{{ $articleCount }}) </h3>

        @if (request('min-price') || request('max-price') || request('category') || request('title'))
            <div class="my-3">
                <x-search-result-header :total="$articles->count()" :form-action-route="route('shop')" />
            </div>
        @endif

        <div class="row">
            @forelse ($this->articles as $article)
                <x-product-item-card :article="$article" wire:key="article-{{ $article->id }}" />
            @empty
                <h3 class="my-5 text-center"> Aucun élément retrouvé... </h3>
            @endforelse
        </div>
        <x-pagination-livewire :items="$this->articles" />
    </div>

</div>
