@props(['article'])

<!-- Colonne pour afficher un produit -->
<div class="col">
    <div class="product-item">
        <figure>
            <!-- Lien vers la page produit -->
            <a href="{{ route('article.show', ['categorySlug' => $article->category->slug, 'slug' => $article->slug]) }}"
                title="Product Title">
                <!-- Image du produit -->
                <img src="{{ Storage::url($article->image) }}" alt="Product Thumbnail"
                    class="tab-image home-product-sell-item-img">
            </a>
        </figure>

        <!-- Section du produit avec son titre, évaluations et prix -->
        <div class="d-flex flex-column text-center">
            <!-- Titre du produit -->
            <h3 class="fs-6 fw-normal ">
                <a class="article-title-link"
                    href="{{ route('article.show', ['categorySlug' => $article->category->slug, 'slug' => $article->slug]) }}">
                    {{ $article->title }}
                </a>
            </h3>

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
                @if ($article->old_price)
                    <del>{{ number_format($article->old_price, 0, ',', ' ') }} XOF</del>
                @endif
                <span class="text-dark fw-semibold">{{ number_format($article->price, 0, ',', ' ') }} XOF</span>
                @if ($article->discount)
                    <span class="badge border border-dark-subtle rounded-0 fw-normal px-1 fs-7 lh-1 text-body-tertiary">
                        -{{ $article->discount }}%
                    </span>
                @endif
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
                            </svg> + au panier
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
