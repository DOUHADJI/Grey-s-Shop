<div class="">
    <form wire:submit.prevent="submitForm" class="d-flex mt-3 gap-0" method="POST">
        @csrf
        <input class="form-control rounded-start rounded-0 bg-light contact-form-control" type="email"
            placeholder="Adresse email" wire:model='email' aria-label="Adresse email" name="email" required>
        <button class="btn btn-dark rounded-end rounded-0" type="submit">S'abonner</button>
    </form>

    @error('email')
        <span class="text-danger">
            {{ $message }}
        </span>
    @enderror
</div>

@script
    <script>
        $wire.on('new-subscriber', () => {
            showToast("Merci de vous être abonné à notre newsletter")
        })
    </script>
@endscript
