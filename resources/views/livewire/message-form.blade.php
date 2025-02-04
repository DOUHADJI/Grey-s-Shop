<div class="col-md-9">
    <form class="contact-us-form" wire:submit.prevent="submitForm" method="POST">
        <h3 class="contact-us-form-title"> Formulaire de contact </h3>
        <div class="row">

            <div class="col-lg-4">
                <div class="form-group contact-form-group">
                    <label for="name">Votre nom <span class="text-danger fw-bold">*</span> </label>
                    <input wire:model="name" type="text" required class="form-control contact-form-control"
                        placeholder="Votre nom" name="name">
                    @error('name')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group contact-form-group">
                    <label for="email">Votre e-mail <span class="text-danger fw-bold">*</span>
                    </label>
                    <input wire:model="email" type="email" required class="form-control contact-form-control"
                        placeholder="votre adresse e-mail" name="email">
                    @error('email')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-lg-4">
                <div class="form-group contact-form-group">
                    <label for="contact">Votre contact</label>
                    <input wire:model="contact" type="text" class="form-control contact-form-control"
                        placeholder="votre numero de téléphone" name="contact">
                    @error('contact')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <br>
            <br>
            <div class="col-md-12">
                <div class="form-group contact-form-group">
                    <label for="name">Votre message</label>
                    <textarea wire:model="content" name="content" type="text" class="form-control contact-form-control" placeholder="Ecrivez ici"></textarea>
                    @error('message')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group contact-form-group">
                    <button type="submit" class="btn btn-primary contact-btn-block"> Envoyer le message </button>
                </div>
            </div>

        </div>
    </form>
    @script
        <script>
            $wire.on("message-send", () => {
                showToast("Votre message a été bien envoyée");
            });
        </script>
    @endscript

</div>
