<x-default-layout title="Accueil">
    <x-welcome-page.banner-section bgImage="images/banner-2.jpg"
        subheading="Des accessoires tech de qualité, pensés pour vous." shoppingLink="#" joinLink="#" />
    <x-welcome-page.categories-section :categories="$categories" />
    <x-welcome-page.best-selling />
    <x-welcome-page.middle-banner />
    <x-welcome-page.featured-products />
    <x-welcome-page.become-member-on-purchase />
    <x-welcome-page.products-slider-section id="popular-products" title="Most popular products" />
    <x-welcome-page.products-slider-section id="latest-products" title="Just arrived" />
    <x-welcome-page.latest-blog />
    <x-welcome-page.bottom-banner />
    <x-welcome-page.people-looking-for />
    <x-welcome-page.services />


</x-default-layout>
