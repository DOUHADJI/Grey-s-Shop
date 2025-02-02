@props(['article'])

<livewire:article-livewire-component :article="$article" :key="'product-item'.$article->slug" />
