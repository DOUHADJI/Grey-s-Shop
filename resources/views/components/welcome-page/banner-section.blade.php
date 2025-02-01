<section style="background-image: url('{{ $bgImage }}'); background-repeat: no-repeat; background-size: cover;">
    <div class="container-lg home-banner">
        <div class="row">
            <div class="col-lg-6 pt-5 mt-5">
                <h2 class="display-1 ls-1 text-white">
                    <span class="fw-bold text-primary">{{ config("app.name") }},</span> La Tech à portée de <span class="fw-bold">main</span>
                </h2>
                <p class="fs-4">{{ $subheading }}</p>
                <div class="d-flex gap-3">
                    <a href="{{ route("shop") }}" class="btn btn-primary text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Commander maintenant</a>
                    {{-- <a href="{{ $joinLink }}" class="btn btn-dark text-uppercase fs-6 rounded-pill px-4 py-3 mt-3">Devenir partenaire</a> --}}
                </div>
                <div class="row my-5">
                    <x-welcome-page.info-card value="{{$articlesCount}}+" label="Accessoires Tech" />
                    <x-welcome-page.info-card value="20k+" label="Clients satisfaits" />
                    <x-welcome-page.info-card value="15+" label="Points de vente" />
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-3 g-0 justify-content-center">
            <x-welcome-page.feature-card
                bgColor="bg-primary"
                icon="#fresh"
                title="Qualité Premium"
                description="Des accessoires de haute qualité pour vos appareils, garantis."
            />
            <x-welcome-page.feature-card
                bgColor="bg-secondary"
                icon="#organic"
                title="Offres Exclusives"
                description="Profitez des meilleures offres sur nos articles"
            />
            <x-welcome-page.feature-card
                bgColor="bg-danger"
                icon="#delivery"
                title="Livraison Rapide"
                description="Recevez vos commandes rapidement et en toute sécurité."
            />
        </div>
    </div>
</section>
