@props(['pages'])

<footer class="py-5">
    <div class="container-lg">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-menu">
                    <img src="{{ $configs->logo ? Storage::url($configs->logo) : asset('images/logo.svg') }}"
                        width="240" height="70" alt="logo">
                    <div class="social-links mt-3">
                        <ul class="d-flex list-unstyled gap-2">
                            @if (!empty($configs->facebook_page_link))
                                <li>
                                    <a href="{{ $configs->facebook_page_link }}" target="_blank" class="btn btn-outline-light">
                                        <svg width="16" height="16">
                                            <use xlink:href="#facebook"></use>
                                        </svg>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($configs->twitter_page_link))
                                <li>
                                    <a href="{{ $configs->twitter_page_link }}" target="_blank" class="btn btn-outline-light">
                                        <svg width="16" height="16">
                                            <use xlink:href="#twitter"></use>
                                        </svg>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($configs->youtube_page_link))
                                <li>
                                    <a href="{{ $configs->youtube_page_link }}" target="_blank" class="btn btn-outline-light">
                                        <svg width="16" height="16">
                                            <use xlink:href="#youtube"></use>
                                        </svg>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($configs->instagram_page_link))
                                <li>
                                    <a href="{{ $configs->instagram_page_link }}" target="_blank" class="btn btn-outline-light">
                                        <svg width="16" height="16">
                                            <use xlink:href="#instagram"></use>
                                        </svg>
                                    </a>
                                </li>
                            @endif

                            @if (!empty($configs->amazon_page_link))
                                <li>
                                    <a href="{{ $configs->amazon_page_link }}" target="_blank" class="btn btn-outline-light">
                                        <svg width="16" height="16">
                                            <use xlink:href="#amazon"></use>
                                        </svg>
                                    </a>
                                </li>
                            @endif
                        </ul>

                    </div>
                </div>
            </div>

            <!-- Catégories  -->
            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Catégories</h5>
                    <ul class="menu-list list-unstyled">
                        @foreach ($categories as $category)
                            <li class="menu-item">
                                <a href="{{ route('category.index', ['slug' => $category->slug ]) }}"
                                    class="nav-link">{{ $category->name }} </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Liens rapides -->
            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Lien rapides</h5>
                    <ul class="menu-list list-unstyled">
                        @foreach ($pages as $page)
                            <li class="menu-item">
                                <a href="{{ $page['route'] }}" class="nav-link">{{ $page['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Service Client -->
            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Service Client</h5>
                    <ul class="menu-list list-unstyled">
                        <li class="menu-item">
                            <a href="{{ route("faq") }}" class="nav-link">FAQ</a>
                        </li>
                        <li class="menu-item">
                            <a href="{{ route("contact")}}" class="nav-link">Nous contacter</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Subscribe to newsletter -->
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer-menu">
                    <h5 class="widget-title">Abonnez-vous</h5>
                    <p>Restez informé(e) de nos offres et publications à travers notre newsletter.</p>
                    @livewire('subscribe-newsletter-component')
                </div>
            </div>

        </div>
    </div>
</footer>
<div id="footer-bottom" hidden>
    <div class="container-lg">
        <div class="row">
            <div class="col-md-6 copyright">
                <p>© 2024 Organic. All rights reserved.</p>
            </div>
            <div class="col-md-6 credit-link text-start text-md-end">
                <p>HTML Template by <a href="https://templatesjungle.com/">TemplatesJungle</a> Distributed By <a
                        href="https://themewagon.com">ThemeWagon</a> </p>
            </div>
        </div>
    </div>
</div>
