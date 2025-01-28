<header>
    <div class="container-fluid">
        <div class="row py-3 border-bottom">

            <!-- Logo and Mobile Menu Button Section -->
            <div
                class="col-sm-4 col-lg-2 text-center text-sm-start d-flex gap-3 justify-content-center justify-content-md-start">
                <!-- App Logo -->
                <div class="d-flex align-items-center my-3 my-sm-0">
                    <a href="{{ route("home") }}">
                        <img src="{{asset('images/logo.svg')}}" alt="logo" class="img-fluid">
                    </a>
                </div>
                <!-- End App Logo -->

                <!-- App Mobile Menu Button -->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                    aria-controls="offcanvasNavbar">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <use xlink:href="#menu"></use>
                    </svg>
                </button>
                <!-- End App Mobile Menu Button -->
            </div>
            <!-- End Logo and Mobile Menu Button Section -->

            <!-- Search Bar Section -->
            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-4">
                <div class="search-bar row bg-light p-2 rounded-4">
                    <!-- Search Categories Select -->
                    <div class="col-md-4 d-none d-md-block">
                        <select class="form-select border-0 bg-transparent">
                            <option value="all">Toutes les catégories</option>
                            @foreach ($categories as $category )
                                <option value="{{ $category->slug}}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- End Search Categories Select -->

                    <!-- Search Input -->
                    <div class="col-11 col-md-7">
                        <form id="search-form" class="text-center" action="{{ route("home") }}" method="post">
                            <input type="text" class="form-control border-0 bg-transparent"
                                placeholder="Retrouver des produits">
                        </form>
                    </div>
                    <!-- End Search Input -->

                    <!-- Search Button -->
                    <div class="col-1">
                        <button style="border:none;background-color:transparent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                            </svg>
                        </button>
                    </div>
                    <!-- End Search Button -->
                </div>
            </div>
            <!-- End Search Bar Section -->

            <!-- Navigation Links Section -->
            <div class="col-lg-4">
                <ul
                    class="navbar-nav list-unstyled d-flex flex-row gap-3 gap-lg-5 justify-content-center flex-wrap align-items-center mb-0 fw-bold text-uppercase text-dark">
                    <!-- Home Link -->
                    <li class="nav-item active">
                        <a href="{{ route("home") }}" class="nav-link">Home</a>
                    </li>
                    <!-- End Home Link -->

                    <!-- Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle pe-3" role="button" id="pages" data-bs-toggle="dropdown"
                            aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu border-0 p-3 rounded-0 shadow" aria-labelledby="pages">
                            <li><a href="{{ route("home") }}" class="dropdown-item">About Us </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Shop </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Single Product </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Cart </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Checkout </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Blog </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Single Post </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Styles </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Contact </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">Thank You </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">My Account </a></li>
                            <li><a href="{{ route("home") }}" class="dropdown-item">404 Error </a></li>
                        </ul>
                    </li>
                    <!-- End Dropdown Menu -->
                </ul>
            </div>
            <!-- End Navigation Links Section -->

            <!-- Action Icons Section -->
            <div
                class="col-sm-8 col-lg-2 d-flex gap-5 align-items-center justify-content-center justify-content-sm-end">
                <ul class="d-flex justify-content-end list-unstyled m-0">
                    <!-- User Icon -->
                    <li>
                        <a href="#" class="p-2 mx-1">
                            <svg width="24" height="24">
                                <use xlink:href="#user"></use>
                            </svg>
                        </a>
                    </li>
                    <!-- End User Icon -->

                    <!-- Wishlist Icon -->
                    <li>
                        <a href="#" class="p-2 mx-1">
                            <svg width="24" height="24">
                                <use xlink:href="#wishlist"></use>
                            </svg>
                        </a>
                    </li>
                    <!-- End Wishlist Icon -->

                    <!-- Cart Icon -->
                    <li>
                        <a href="#" class="p-2 mx-1" data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart"
                            aria-controls="offcanvasCart">
                            <svg width="24" height="24">
                                <use xlink:href="#shopping-bag"></use>
                            </svg>
                        </a>
                    </li>
                    <!-- End Cart Icon -->
                </ul>
            </div>
            <!-- End Action Icons Section -->

        </div>
    </div>
</header>
