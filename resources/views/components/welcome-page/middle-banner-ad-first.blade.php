<!-- Composant de Bannière -->
@props(['image', 'title', 'description', 'buttonText', 'bgColor'])
<div class="banner-ad d-flex align-items-center large {{ $bgColor }} block-1" style="background: url('{{ $image }}') no-repeat; background-size: cover;">
  <div class="banner-content p-5">
    <div class="content-wrapper text-light">
      <h3 class="banner-title text-light">{{ $title }}</h3>
      <p>{{ $description }}</p>
      <a href="#" class="btn-link text-white">{{ $buttonText }}</a>
    </div>
  </div>
</div>
