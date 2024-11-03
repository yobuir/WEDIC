<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Albums
                </h2>
                <p>Manage, create and edit all Albums</p>
            </div>
            <div class="flex flex-col   justify-between flex-wrap gap-3">
                @livewire('pages.dashboard.album.new-livewire')
            </div>
        </div>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto">
                <div class="flex flex-col">

                    @livewire('pages.dashboard.album.app-livewire')

                </div>
            </section>
        </div>
    </div>
    <script>
        // gallery-optimization.js
        document.addEventListener('livewire:init', () => {
            let imageCache = new Map();
            let observer;

            function initializeImageObserver() {
                observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            loadImage(img);
                        }
                    });
                }, {
                    root: null,
                    rootMargin: '50px',
                    threshold: 0.1
                });
            }

            function loadImage(img) {
                const src = img.dataset.src;
                if (!src) return;

                if (imageCache.has(src)) {
                    img.src = src;
                    img.classList.add('loaded');
                } else {
                    const newImage = new Image();
                    newImage.onload = () => {
                        img.src = src;
                        img.classList.add('loaded');
                        imageCache.set(src, true);
                    };
                    newImage.src = src;
                }
            }

            function preloadImage(url) {
                if (!imageCache.has(url)) {
                    const img = new Image();
                    img.onload = () => imageCache.set(url, true);
                    img.src = url;
                }
            }

            Livewire.on('initializeImageOptimization', () => {
                initializeImageObserver();

                document.querySelectorAll('.lazy-image').forEach(img => {
                    observer.observe(img);
                });
            });

            Livewire.on('preloadImage', ({
                url
            }) => {
                preloadImage(url);
            });

            window.addEventListener('beforeunload', () => {
                imageCache.clear();
                if (observer) {
                    observer.disconnect();
                }
            });
        });
    </script>
</x-app-layout>
