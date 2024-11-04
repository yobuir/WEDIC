<x-guest-layout>
    
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 animate-gradient">
            </div>

            <!-- Animated particles background -->
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-[url('data:image/svg+xml,...')] opacity-30"></div>
                <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
                <div class="text-center space-y-8">
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-white/10 text-white backdrop-blur-sm">
                        📅 Browse Our Events
                    </span>
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                        Upcoming
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-purple-200">
                            Events
                        </span>
                    </h1>
                    <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                        Explore our upcoming events and join us for an unforgettable experience.
                    </p>
                </div>
            </div>
        </div>
        <section class="flex bg-white lg:min-h-screen w-full">
            <div class=" flex w-full flex-col ">
                @livewire('pages.website.event.event-view')
            </div>
        </section>
</x-guest-layout>
