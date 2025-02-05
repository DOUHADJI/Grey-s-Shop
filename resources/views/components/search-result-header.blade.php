@props(['total', 'formActionRoute'])

<div class="d-flex gap-2 my-3">
    <h3> Résultats de la recherche ({{ $total }}) </h3>

    <button type="submit" onclick="window.location.href='{{ $formActionRoute }}'" href="{{ $formActionRoute }}"
        class="btn btn-sm btn-warning"> <i class="fa fa-close pr-2"></i> annuler</button>

</div>
