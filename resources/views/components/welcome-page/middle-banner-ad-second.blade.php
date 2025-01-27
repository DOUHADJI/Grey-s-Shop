<!-- Composant de Bannière 2 -->
@props(['image', 'title', 'description', 'buttonText', 'bgColor'])
<div class="banner-ad {{ $bgColor }} block-2" style="background: url('{{ $image }}') no-repeat; background-size: cover;">
    <div class="banner-content align-items-center p-5">
        <div class="content-wrapper text-light">
            <h3 class="banner-title text-light">{{ $title }}</h3>
            <p>{{ $description }}</p>
            <a href="#" class="btn-link text-white">{{ $buttonText }}</a>
        </div>
    </div>
</div>

