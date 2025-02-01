<x-default-layout title="{{ $category->name }}">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> {{ $category->name }} </h2>
        <x-breadcrumb previous-page-label="Catégories de produits" :previous-page-route="route('category.index')"
            current-page-label="{{ $category->name }}" />

        {{-- <x-article-search-form placeholder="Rechercher un article" label="Retrouver un article" /> --}}
        <div class="row mt-5 mb-5">
            @foreach ($articles as $article)
                <x-product-item-card :article="$article" />
            @endforeach
        </div>

        <x-pagination :items="$articles" />

        <div class="my-5 py-5">
            <!-- Section des autres catégories -->
            <section class="py-5 overflow-hidden">
                <div class="container-lg">
                    <!-- En-tête de la section avec le titre et les boutons de navigation -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                                <h2 class="section-title">Autres categories d'articles disponibles chez nous</h2>

                                <!-- Boutons d'action : Voir tout et Navigation Swiper -->
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('category.index') }}" class="btn btn-primary me-2">Tout voir</a>
                                    <div class="swiper-buttons">
                                        <!-- Boutons pour naviguer dans le carousel -->
                                        <button class="swiper-prev category-carousel-prev btn btn-yellow">❮</button>
                                        <button class="swiper-next category-carousel-next btn btn-yellow">❯</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Section du carousel des catégories -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="category-carousel swiper">
                                <div class="swiper-wrapper">
                                    <!-- Chaque catégorie est un lien avec une image et un titre -->
                                    @foreach ($otherCategories as $category)
                                        <!-- Boucle à travers les catégories -->
                                        <x-welcome-page.category-item :category="$category" />
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </x-page-content-container>
</x-default-layout>
