        <!-- Section des produits les plus vendus -->

        <section class="pb-5">
            <div class="container-lg">
                <div class="row">
                    <div class="col-md-12">
                        <!-- En-tête de la section avec le titre et le bouton pour voir tous les produits -->
                        <div class="section-header d-flex flex-wrap justify-content-between my-4">
                            <!-- Titre de la section -->
                            <h2 class="section-title">Best selling products</h2>

                            <!-- Bouton pour voir tous les produits -->
                            <div class="d-flex align-items-center">
                                <a href="{{ route('best-selling') }}" class="btn btn-primary rounded-1">Voir tout</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Products -->
                <div class="row">
                    <div class="col-md-12">

                        <div
                            class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-5">
                            @foreach ($bestSellings as $article)
                                <x-product-item-card :article="$article"  wire:key="article-{{ $article->id }}" />
                            @endforeach
                        </div>


                    </div>
                </div>
            </div>

            </div>
        </section>
