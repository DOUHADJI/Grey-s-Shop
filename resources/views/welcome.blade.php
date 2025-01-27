<x-default-layout title="Accueil">
    <x-welcome-page.banner-section bgImage="images/banner-2.jpg" subheading="Dignissim massa diam elementum." shoppingLink="#"
        joinLink="#" />
    <x-welcome-page.categories-section  :categories="$categories" />

</x-default-layout>
