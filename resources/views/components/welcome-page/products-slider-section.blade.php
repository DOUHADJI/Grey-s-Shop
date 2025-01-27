<section id="{{ $id }}" class="products-carousel">
    <div class="container-lg overflow-hidden py-5">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex flex-wrap justify-content-between my-4">

                    <h2 class="section-title">{{ $title }}</h2>

                    <!-- Button Voir tout -et bouton de défilement -->
                    <div class="d-flex align-items-center">
                        <a href="#" class="btn btn-primary me-2">View All</a>
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
                        @for ($i = 0; $i < 10; $i++)
                            <!-- Featured product item -->
                            <x-welcome-page.featured-product-item />
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
