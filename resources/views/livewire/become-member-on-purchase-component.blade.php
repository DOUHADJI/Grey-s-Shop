<section>
    <div class="container-lg">
        <!-- Section de la newsletter avec un arrière-plan d'image -->
        <div class="bg-secondary text-light py-5 my-5"
            style="background: url('images/banner-newsletter.jpg') no-repeat; background-size: cover;">
            <div class="container">
                <div class="row justify-content-center">

                    <!-- Colonne pour le titre et la description de la section -->
                    <div class="col-md-5 p-3">
                        <div class="section-header">
                            <!-- Titre principal de la section -->
                            <h2 class="section-title display-5 text-light">25% de réduction <br> sur votre première
                                commande</h2>
                        </div>
                        <!-- Description sous le titre -->
                        <p>Abonnez vous pour rester informé sur nos offres promotionnelles.</p>
                    </div>

                    <!-- Colonne pour le formulaire d'inscription à la newsletter -->
                    <div class="col-md-5 p-3">
                        <form wire:submit.prevent="submitForm" method="POST">
                            @csrf
                            <!-- Champ de saisie pour le nom -->
                            <div class="mb-3">
                                <label for="name" class="form-label d-none">Votre nom</label>
                                <input type="text" wire:model="name" class="form-control form-control-md rounded-0" name="name"
                                    id="name" placeholder="Votre nom (optionnel) ">
                            </div>
                            <!-- Champ de saisie pour l'adresse email -->
                            <div class="mb-3">
                                <label for="email" class="form-label d-none">Email</label>
                                <input type="email" wire:model="email" class="form-control form-control-md rounded-0" name="email"
                                    id="email" placeholder="Adresse Email">
                                    @error("email")
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
                            </div>
                            <!-- Bouton de soumission du formulaire -->
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-dark btn-md rounded-0">S'abonner</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</section>
@script
    <script>
        $wire.on('new-subscriber', () => {
            showToast("Merci de vous être abonné à notre newsletter")
        })
    </script>
@endscript
