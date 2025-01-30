<x-default-layout title="Nous contacter">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> Nous contacter </h2>
        <x-breadcrumb previous-page-label="Accueil" :previous-page-route="route('home')" current-page-label="Nous contacter" />

        <div class="container my-5 py-5 ">
            <div class="row">
                <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-12 px-2">
                            <div class="d-flex align-items-center gap-2 text-primary ">
                                <svg width="30" height="30">
                                    <use href="#phone"></use>
                                </svg>
                                <span class="fs-6">Nous appeler</span>
                            </div>
                            <div class="pt-3">
                                <p> Nous sommes disponibles 24/7, 7 jours de la semaine </p>
                            </div>

                            <div class="pt-1 fw-semidbold">
                                <p class="text-primary"> Contact : {{ $configs->contact }} </p>
                            </div>
                        </div>

                        <div class="col-md-12 px-2 mt-5 border-t-2 border-primary">
                            <div class="d-flex align-items-center gap-2 text-primary ">
                                <svg width="30" height="30">
                                    <use href="#email"></use>
                                </svg>
                                <span class="fs-6">Nous écrire</span>
                            </div>
                            <div class="pt-3">
                                <p> Remplissez notre formulaire et nous vous contacterons sous 24 heures. </p>
                            </div>

                            <div class="pt-1 fw-semidbold">
                                <p class="text-primary"> Email : {{ $configs->email }} </p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-9">
                    <form action="" class="contact-us-form">
                        <h3 class="contact-us-form-title"> Formulaire de contact </h3>
                        <div class="row">

                            <div class="col-lg-4">
                                <div class="form-group contact-form-group">
                                    <label for="name">Votre nom <span class="text-danger fw-bold">*</span> </label>
                                    <input type="text" required class="form-control contact-form-control"
                                        placeholder="Votre nom">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group contact-form-group">
                                    <label for="email">Votre e-mail <span class="text-danger fw-bold">*</span>
                                    </label>
                                    <input type="email" required class="form-control contact-form-control"
                                        placeholder="votre adresse e-mail">
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group contact-form-group">
                                    <label for="contact">Votre contact</label>
                                    <input type="text" class="form-control contact-form-control"
                                        placeholder="votre numero de téléphone">
                                </div>
                            </div>

                            <br>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group contact-form-group">
                                    <label for="name">Votre message</label>
                                    <textarea type="text" class="form-control contact-form-control" placeholder="Ecrivez ici"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group contact-form-group">
                                    <button class="btn btn-primary contact-btn-block"> Envoyer le message </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </x-page-content-container>
</x-default-layout>
