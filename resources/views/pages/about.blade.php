<x-default-layout title="A propos de nous">
    <x-page-content-container>

        <h2 class="mt-5 text-primary"> A propos de nous </h2>
        <x-breadcrumb previous-page-label="Accueil" :previous-page-route="route('home')" current-page-label="A propos de nous" />

        <div class="mt-5 py-5">
            <div class="row">
                <div class="col-md-6">
                    <h2>Notre histoire.</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Non modi molestiae id totam odio hic enim expedita, unde quos
                        perspiciatis aut voluptate quasi repellat vero laudantium
                        obcaecati itaque porro aperiam.

                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Non modi molestiae id totam odio hic enim expedita, unde quos
                        perspiciatis aut voluptate quasi repellat vero laudantium
                        obcaecati itaque porro aperiam.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="about-image-container">
                        <img src="{{asset("images/about.jpg")}}" alt="Notre historie" class="about-image">
                    </div>
                </div>
                <div class="col-md-12 mt-4">
                    <x-welcome-page.services />
                </div>
            </div>
        </div>

    </x-page-content-container>
</x-default-layout>
