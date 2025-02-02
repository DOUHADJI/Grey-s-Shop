<head>
    <title> {{ config('app.name', 'Accessoires Electroniques') . '-' . $title }} </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="author" content="DOUHADJI">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="{{ asset('template/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('build/assets/css/custom.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet">

    <!-- FontAwesome -->
    <link href="{{ asset('fonts/fontawesome/css/fontawesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/fontawesome/css/brands.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/fontawesome/css/solid.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/fontawesome/css/sharp-thin.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/fontawesome/css/duotone-thin.css') }}" rel="stylesheet" />
    <link href="{{ asset('fonts/fontawesome/css/sharp-duotone-thin.css') }}" rel="stylesheet" />

    <script src="{{ asset('js/toaster.js') }}"></script>


    @livewireStyles()
</head>
