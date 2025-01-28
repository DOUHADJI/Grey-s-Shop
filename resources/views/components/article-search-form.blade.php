@props(['placeholder', 'label'])

<div class="mt-5 mb-5">
    <form action="" method="GET">
        <div class="form-group">
            <label for=""> {{ $label }} </label>
            <input type="text" class="form-control" placeholder="{{ $placeholder }}">
        </div>

    </form>
</div>
