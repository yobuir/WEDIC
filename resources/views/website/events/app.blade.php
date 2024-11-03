<x-guest-layout>
    <div>
        <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 py-24">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                        Events
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
