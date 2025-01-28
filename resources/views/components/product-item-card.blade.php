@props(['article'])
<!-- Colonne pour afficher un produit -->
<div class="col-md-3">
    <div class="product-item">
        <figure>
            <!-- Lien vers la page produit -->
            <a href="#" title="{{$article->title}}">
                <!-- Image du produit -->
                <img src="{{ isset($article->image) ? Storage::url($article->image) : asset('images/product-thumb-1.jpg') }}"
                    alt="Product Thumbnail" class="tab-image home-product-sell-item-img">
            </a>
        </figure>

        <!-- Section du produit avec son titre, évaluations et prix -->
        <div class="d-flex flex-column text-center">
            <!-- Titre du produit -->
            <h3 class="fs-6 fw-normal">{{$article->title}}</h3>

            <!-- Section des évaluations -->
            <div>
                <span class="rating">
                    <!-- Affichage des étoiles de la note du produit -->
                    <svg width="18" height="18" class="text-warning">
                        <use xlink:href="#star-full"></use>
                    </svg>
                    <svg width="18" height="18" class="text-warning">
                        <use xlink:href="#star-full"></use>
                    </svg>
                    <svg width="18" height="18" class="text-warning">
                        <use xlink:href="#star-full"></use>
                    </svg>
                    <svg width="18" height="18" class="text-warning">
                        <use xlink:href="#star-full"></use>
                    </svg>
                    <svg width="18" height="18" class="text-warning">
                        <use xlink:href="#star-half"></use>
                    </svg>
                </span>
                <span>(222)</span>
            </div>

            <!-- Section des prix -->
            <div class="d-flex justify-content-center align-items-center gap-2">
                <!-- Ancien prix barré -->
                <del>{{ $article->price - 1000 }}XOF</del>
                <!-- Nouveau prix -->
                <span class="text-dark fw-semibold">{{ $article->price - 0}}XOF </span>
                <!-- Badge de promotion -->
                <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">10%
                    OFF</span>
            </div>

            <!-- Section pour la gestion de la quantité et des boutons d'action -->
            <div class="button-area p-3 pt-0">
                <div class="row g-1 mt-2">
                    <!-- Champ pour la quantité -->
                    <div class="col-3">
                        <input type="number" name="quantity"
                            class="form-control border-dark-subtle input-number quantity" value="1">
                    </div>
                    <!-- Bouton d'ajout au panier -->
                    <div class="col-7">
                        <a href="#" class="btn btn-primary rounded-1 p-2 fs-7 btn-cart">
                            <svg width="18" height="18">
                                <use xlink:href="#cart"></use>
                            </svg> Add to Cart
                        </a>
                    </div>
                    <!-- Bouton pour ajouter aux favoris -->
                    <div class="col-2">
                        <a href="#" class="btn btn-outline-dark rounded-1 p-2 fs-6">
                            <svg width="18" height="18">
                                <use xlink:href="#heart"></use>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
