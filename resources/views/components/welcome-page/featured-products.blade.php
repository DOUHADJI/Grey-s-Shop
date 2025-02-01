<section id="featured-products" class="products-carousel">
    <div class="container-lg overflow-hidden py-5">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex flex-wrap justify-content-between my-4">

                    <h2 class="section-title">Featured products</h2>

                    <!-- Button Voir tout -et bouton de défilement -->
                    <div class="d-flex align-items-center">
                        <a href="{{ route("featured-articles")}} " class="btn btn-primary me-2">Voir tout</a>
                        <div class="swiper-buttons">
                            <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                            <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <!-- Products -->
                <div class="swiper">
                    <div class="swiper-wrapper">
                        @foreach($featuredProducts as $article)
                            <!-- Featured product item -->
                            <x-product-item-card :article="$article" />
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
