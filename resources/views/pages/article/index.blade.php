<x-default-layout title="Notre Boutique">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> Notre Boutique </h2>
        <x-breadcrumb previous-page-label="Accueil" :previous-page-route="route('home')" current-page-label="Notre Boutique" />


        <livewire:shop-component />

    </x-page-content-container>
</x-default-layout>
