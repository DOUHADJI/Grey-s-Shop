<!-- Section des catégories -->
<section class="py-5 overflow-hidden">
    <div class="container-lg">
        <!-- En-tête de la section avec le titre et les boutons de navigation -->
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                    <h2 class="section-title">Ce que vous trouverez chez nous</h2>

                    <!-- Boutons d'action : Voir tout et Navigation Swiper -->
                    <div class="d-flex align-items-center">
                        <a href="{{ route("category.index") }}" class="btn btn-primary me-2">Tout voir</a>
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
                        @foreach ($categories as $category)
                            <!-- Boucle à travers les catégories -->
                            <x-welcome-page.category-item :category="$category" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
