<div class="min-h-screen bg-gradient-to-b from-black-50 to-white">
    <!-- Hero Section -->
    <div x-data="{ shown: false }" x-init="setTimeout(() => shown = true, 100)" class="relative min-h-screen">
        <!-- Background Image -->
        <div class="absolute inset-0 z-0">
            <!-- Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-black-900/90 via-black-900/70 to-black-900/90 z-10"></div>
            <img src="{{ $featuredAlbum->cover_image }}" alt="{{ $featuredAlbum->name }}"
                class="w-full h-full object-cover">
        </div>

        <!-- Content -->
        <div class="relative z-10 min-h-screen flex flex-col">
            <!-- Main Content -->
            <div class="flex-1 flex items-center lg:mt-6 mt-20 ">
                <div class="container mx-auto px-4">
                    <div class="max-w-4xl">
                        <!-- Title -->
                        <h1 class="mb-8" x-show="shown"
                            x-transition:enter="transition ease-out duration-700 delay-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0">
                            <span class="block lg:text-lg text-wedic-blue-200 mb-2">Photo Gallery</span>
                            <span class="lg:text-5xl text-2xl md:text-7xl font-bold text-wedic-blue-500">Beautiful Moments</span>
                        </h1>

                        <p class="text-xl md:text-2xl text-wedic-blue-200 mb-12 max-w-2xl" x-show="shown"
                            x-transition:enter="transition ease-out duration-700 delay-500"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                            Explore our collection of stunning photos across {{ $totalAlbums }} curated albums.
                        </p>

                        <!-- Stats -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12" x-show="shown"
                            x-transition:enter="transition ease-out duration-700 delay-700"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0">
                            <div class="text-wedic-blue-200">
                                <div class="text-3xl font-bold text-wedic-blue-500">{{ $totalAlbums }}</div>
                                <div class="text-sm">Photo Albums</div>
                            </div>
                            <div class="text-wedic-blue-200">
                                <div class="text-3xl font-bold text-wedic-blue-500">{{ $featuredCount }}</div>
                                <div class="text-sm">Featured Albums</div>
                            </div>
                            <div class="text-wedic-blue-200">
                                <div class="text-3xl font-bold text-wedic-blue-500">{{ $latestYear }}</div>
                                <div class="text-sm">Latest Updates</div>
                            </div>
                        </div>

                        <!-- Featured Album Preview -->
                        <div class="bg-black-500/30 backdrop-blur-md rounded-2xl p-8 max-w-xl" x-show="shown"
                            x-transition:enter="transition ease-out duration-700 delay-900"
                            x-transition:enter-start="opacity-0 transform translate-y-4"
                            x-transition:enter-end="opacity-100 transform translate-y-0">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-xl font-semibold text-wedic-blue-500">{{ $featuredAlbum->name }}</h3>

                            </div>
                            <p class="text-wedic-blue-200 mb-6">{{ $featuredAlbum->description }}</p>
                            <div class="flex items-center gap-4">
                                <button wire:click="viewAlbum({{ $featuredAlbum->id }})"
                                    class="px-6 py-3 bg-wedic-blue-500 text-black-500 rounded-full transition-all duration-300
                                    transform hover:scale-105 hover:bg-wedic-blue-600 inline-flex items-center gap-2 font-medium">
                                    <span>View Album</span>
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                                <span class="text-wedic-blue-200">
                                    {{ $featuredAlbum->images_count }} Photos
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 text-wedic-blue-500" x-show="shown"
                x-transition:enter="transition ease-out duration-700 delay-1000" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100">
                <div class="animate-bounce">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="container mx-auto max-w-7xl px-4 py-16 flex flex-col w-full flex-1">
        {{-- Main Gallery Grid --}}
        <div x-data="{ shown: false }" x-init="() => { shown = true }">


            {{-- Albums Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($albums as $index => $album)
                    <div wire:key="album-{{ $album->id }}" x-show="shown"
                        x-transition:enter="transition ease-out duration-500"
                        x-transition:enter-start="opacity-0 transform translate-y-4"
                        x-transition:enter-end="opacity-100 transform translate-y-0"
                        style="transition-delay: {{ $index * 100 }}ms"
                        class="group bg-white rounded-xl shadow-sm hover:shadow-xl transition-all duration-300">
                        {{-- Album Cover --}}
                        <div class="relative aspect-w-3 aspect-h-2 min-h-[200px] max-h-[200px] rounded-t-xl overflow-hidden">
                            <img src="{{ $album->cover_image }}" alt="{{ $album->name }}"
                                class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500"
                                loading="lazy">
                            {{-- Hover Overlay --}}
                            <div
                                class="absolute inset-0 bg-black/50 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                <button wire:click="viewAlbum({{ $album->id }})"
                                    class="absolute inset-0 w-full h-full flex items-center justify-center">
                                    <span
                                        class="px-6 py-3 bg-white/90 rounded-full flex items-center gap-2 transform translate-y-4 group-hover:translate-y-0 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 8v.01M8 4h.01M19 4h.01M19 8h.01M19 12h.01M19 16h.01M19 20h.01M4 12v.01M4 16v.01M4 20v.01M8 20h.01M12 20h.01M16 20h.01M12 4h.01M16 4h.01M12 16v.01" />
                                        </svg>
                                        View Album
                                    </span>
                                </button>
                            </div>
                        </div>
                        {{-- Album Info --}}
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-gray-900">{{ $album->name }}</h3>
                            <p class="mt-1 text-sm text-gray-500 line-clamp-2">{{ $album->description }}</p>
                            <div class="mt-3 flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $album->images_count }} {{ Str::plural('photo', $album->images_count) }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Pagination --}}
            <div class="mt-12">
                {{ $albums->links() }}
            </div>
        </div>

        {{-- Album Modal --}}
        @if ($selectedAlbum)
            <div x-data="{ show: false }" x-init="show = true" x-show="show"
                @keydown.escape.window="$wire.closeAlbum()" class="fixed inset-0 z-50 overflow-y-auto" role="dialog"
                aria-modal="true">

                {{-- Backdrop --}}
                <div class="fixed inset-0 bg-black-900/90 backdrop-blur-sm" x-show="show"
                    x-transition:enter="transition-opacity ease-out duration-300" x-transition:enter-start="opacity-0"
                    x-transition:enter-end="opacity-100" x-transition:leave="transition-opacity ease-in duration-200"
                    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                </div>

                {{-- Modal Panel --}}
                <div class="relative min-h-screen flex items-center justify-center p-4">
                    <div class="relative w-full max-w-6xl bg-black-50 rounded-2xl shadow-2xl overflow-hidden"
                        x-show="show" x-transition:enter="transition ease-out duration-300 delay-100"
                        x-transition:enter-start="opacity-0 translate-y-4"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-4">

                        {{-- Modal Header --}}
                        <div class="px-8 py-6 border-b border-black-200/10 bg-white/50 backdrop-blur-sm">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h2 class="text-2xl font-bold text-black-500 mb-2">{{ $selectedAlbum->name }}</h2>
                                    <p class="text-black-400">{{ $selectedAlbum->description }}</p>
                                </div>
                                <button wire:click="closeAlbum"
                                    class="p-3 rounded-full text-black-400 hover:text-wedic-blue-500 hover:bg-wedic-blue-100
                            transition-all duration-300 transform hover:scale-105 group">
                                    <svg class="w-6 h-6 transform group-hover:rotate-90 transition-transform duration-300"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Images Grid --}}
                        <div class="p-8">
                            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                                @foreach ($selectedAlbum->images as $image)
                                    <div wire:key="image-{{ $image->id }}"
                                        wire:click="viewImage({{ $image->id }})"
                                        class="group relative aspect-square rounded-xl overflow-hidden cursor-pointer
                                    shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-[1.02]">

                                        {{-- Image --}}
                                        <img src="{{ $image->image_path }}" alt="{{ $image->title }}"
                                            class="w-full h-full object-cover transition duration-500" loading="lazy">

                                        {{-- Hover Overlay --}}
                                        <div
                                            class="absolute inset-0 bg-gradient-to-t from-black-900/80 via-black-900/20 to-transparent
                                    opacity-0 group-hover:opacity-100 transition-all duration-300">

                                            {{-- Zoom Icon --}}
                                            <div class="absolute inset-0 flex items-center justify-center">
                                                <div
                                                    class="p-3 bg-wedic-blue-500 rounded-full transform -translate-y-4
                                            group-hover:translate-y-0 opacity-0 group-hover:opacity-100
                                            transition-all duration-300 shadow-lg">
                                                    <svg class="w-6 h-6 text-black-500" fill="none"
                                                        stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7" />
                                                    </svg>
                                                </div>
                                            </div>

                                            {{-- Image Title (if available) --}}
                                            @if ($image->title)
                                                <div class="absolute bottom-0 left-0 right-0 p-4">
                                                    <p
                                                        class="text-wedic-blue-200 text-sm transform translate-y-4
                                                group-hover:translate-y-0 opacity-0 group-hover:opacity-100
                                                transition-all duration-300">
                                                        {{ $image->title }}
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Footer with Total Count --}}
                        <div class="px-8 py-4 bg-white/50 backdrop-blur-sm border-t border-black-200/10">
                            <p class="text-black-400">
                                <span class="text-wedic-blue-500 font-medium">{{ count($selectedAlbum->images) }}</span>
                                {{ Str::plural('photo', count($selectedAlbum->images)) }} in this album
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        {{-- Fullscreen Image View --}}
        @if ($selectedImage)
            <div x-data="{
                show: false,
                loading: false
            }" x-init="show = true" x-show="show"
                class="fixed inset-0 z-50 flex items-center justify-center bg-black-900"
                @keydown.escape.window="$wire.closeImage()" @keydown.arrow-left.window="$wire.previousImage()"
                @keydown.arrow-right.window="$wire.nextImage()">

                {{-- Close Button --}}
                <button @click="$wire.closeImage()"
                    class="absolute top-6 right-6 text-wedic-blue-200 hover:text-wedic-blue-500 p-3
            rounded-full hover:bg-black-500/30 backdrop-blur-sm transition-all duration-300 z-50
            transform hover:scale-105 group">
                    <svg class="w-6 h-6 transform group-hover:rotate-90 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                {{-- Previous Button --}}
                <button @click="$wire.previousImage()"
                    class="absolute left-6 top-1/2 -translate-y-1/2 text-wedic-blue-200 hover:text-wedic-blue-500
            p-4 rounded-full hover:bg-black-500/30 backdrop-blur-sm transition-all duration-300
            group z-50 transform hover:scale-105">
                    <svg class="w-8 h-8 transform group-hover:-translate-x-1 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>

                {{-- Next Button --}}
                <button @click="$wire.nextImage()"
                    class="absolute right-6 top-1/2 -translate-y-1/2 text-wedic-blue-200 hover:text-wedic-blue-500
            p-4 rounded-full hover:bg-black-500/30 backdrop-blur-sm transition-all duration-300
            group z-50 transform hover:scale-105">
                    <svg class="w-8 h-8 transform group-hover:translate-x-1 transition-transform duration-300"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>

                {{-- Image Information --}}
                <div class="absolute bottom-6 left-0 right-0 flex justify-center items-center gap-6">
                    {{-- Image Counter --}}
                    <div
                        class="px-6 py-3 bg-black-500/30 backdrop-blur-sm rounded-full
                flex items-center gap-4 text-wedic-blue-200">
                        <span class="text-wedic-blue-500 font-medium">
                            {{ $currentImageIndex + 1 }}
                        </span>
                        <span class="w-8 h-0.5 bg-wedic-blue-500/20 rounded-full"></span>
                        <span class="text-wedic-blue-200">
                            {{ $totalImages }}
                        </span>
                    </div>

                    {{-- Image Title (if available) --}}
                    @if ($selectedImage->title)
                        <div class="px-6 py-3 bg-black-500/30 backdrop-blur-sm rounded-full text-wedic-blue-200">
                            {{ $selectedImage->title }}
                        </div>
                    @endif
                </div>

                {{-- Main Image --}}
                <img src="{{ $selectedImage->image_path }}" alt="{{ $selectedImage->title }}"
                    class="max-h-[90vh] max-w-[90vw] object-contain rounded-lg shadow-2xl" x-show="show"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-200"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95">

                {{-- Loading Indicator --}}
                <div x-show="loading" class="absolute inset-0 flex items-center justify-center bg-black-900/80">
                    <div
                        class="w-16 h-16 border-4 border-wedic-blue-500/20 border-t-wedic-blue-500
                rounded-full animate-spin">
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
