
<div class="row mt-5">
    <div class="col-md-6">
        <div class="article-image-container">
            <img src="{{ Storage::url($article->image) }}" alt="{{ $article->slug }}" class="article-image">
        </div>
    </div>

    <div class="col-md-6 mt-3">
        <h3> {{ $article->title }} @if ($isLikedByUser)
            <span class="my-2">
                <i class="fa fa-heart fs-4 text-primary"></i>
            </span>
        @endif </h3>
        <div class="d-flex align-items-center my-3">
            @for ($i = 0; $i < 8; $i++)
                <span class="rating">
                    <svg width="18" height="18" class="text-warning">
                        <use xlink:href="#star-full"></use>
                    </svg>
                </span>
            @endfor
            <div class="mx-2">  | Nombre de likes ({{$likes}}) </div>
        </div>
        <h3> {{ number_format($article->price, 0, ',', ' ') }} XOF </h3>
        <p> {{ $article->description }} </p>

        <hr class="my-4">

        <!-- Section pour la gestion de la quantité et des boutons d'action -->
        <div class="button-area p-3 pt-0">
            <div class="row g-1 mt-2">
                <!-- Champ pour la quantité -->
                <div class="col-3">
                    <input type="number" name="quantity" disabled
                        class="form-control h-full border-dark-subtle input-number quantity" value="1">
                </div>

                <!-- Bouton d'ajout au panier -->
                <div class="col-7">
                    <button disabled  class="btn btn-primary rounded-1 p-2 fs-7 btn-cart">
                        <svg width="18" height="18">
                            <use xlink:href="#cart"></use>
                        </svg> + au panier
                    </button>
                </div>

                <!-- Bouton pour ajouter aux favoris et commntaires -->
                <div class="col-2 d-flex gap-1">
                    <button wire:click="likeAnArticle" class="btn btn-outline-dark rounded-1 p-2 fs-6">
                        <svg width="18" height="18">
                            <use xlink:href="#heart"></use>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div class="border border-primary  rounded-2 mt-4">
            <div class="border-bottom border-primary p-3 d-flex justify-items-center">
                <div class="col-2 text-center">
                    <svg width="25" height="25" class="text-primary">
                        <use xlink:href="#fresh"></use>
                    </svg>
                </div>
                <div class="col-10">
                    <div class="">
                        <h5 class="product-details-service-title text-primary">Qualité Premium</h5>
                        <p class="product-details-service-description">Des accessoires de haute qualité pour vos
                            appareils, garantis.</p>
                    </div>
                </div>
            </div>

            <div class="border-bottom border-primary p-3 d-flex justify-items-center">
                <div class="col-2 text-center">
                    <svg width="25" height="25" class="text-primary">
                        <use xlink:href="#organic"></use>
                    </svg>
                </div>
                <div class="col-10">
                    <div class="">
                        <h5 class="product-details-service-title text-primary">Offres Exclusives</h5>
                        <p class="product-details-service-description">Profitez des meilleures offres sur nos
                            articles</p>
                    </div>
                </div>
            </div>

            <div class="p-3 d-flex justify-items-center">
                <div class="col-2 text-center">
                    <svg width="25" height="25" class="text-primary">
                        <use xlink:href="#delivery"></use>
                    </svg>
                </div>
                <div class="col-10">
                    <div class="">
                        <h5 class="product-details-service-title text-primary">Livraison Rapide</h5>
                        <p class="product-details-service-description">Recevez vos commandes rapidement et en
                            toute sécurité.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    @script
    <script>
        $wire.on("article-liked", (e) => {
            console.log(e)
            showToast("Article " + e[0].title + " liké")
        });
    </script>
    @endscript
</div>
