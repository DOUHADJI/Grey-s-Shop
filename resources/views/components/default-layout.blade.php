<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-header :title="$title" />

<body>
    <x-template-svg-icons-defs />
    <x-offcanvas-navbar />
    <x-navigation />
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>
    <x-footer />
    <x-template-scripts />
</body>

</html>
