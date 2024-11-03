<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="{{ asset('logo/fav_logo.png') }}" type="image/x-icon" />

    <title>{{ config('app.name', 'WEDIC') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />
    @include('layouts.dashboard.sidebar')
    <div class="sm:ml-60 min-h-screen bg-gray-100 dark:bg-gray-900">
        @livewire('navigation-menu')
        <!-- Page Heading -->
        @if (isset($header))
            <header class=" dark:text-gray-400">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')
    @livewireScripts
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('editors/build/ckeditor.js') }}"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {
                allowedContent: true
            })
            .then(editor => {})
            .catch(error => {});
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
    <script>
        // resources/js/photo-album.js
        document.addEventListener('DOMContentLoaded', () => {
            // Image lazy loading optimization
            if ('loading' in HTMLImageElement.prototype) {
                const images = document.querySelectorAll('img[loading="lazy"]');
                images.forEach(img => {
                    img.src = img.dataset.src;
                });
            } else {
                // Fallback to Intersection Observer
                const script = document.createElement('script');
                script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
                document.body.appendChild(script);
            }

            // Image preloading for modal view
            const preloadImage = (url) => {
                const img = new Image();
                img.src = url;
            };

            document.querySelectorAll('[data-full]').forEach(img => {
                img.addEventListener('mouseenter', () => {
                    preloadImage(img.dataset.full);
                });
            });
        });
    </script>
</body>

</html>
