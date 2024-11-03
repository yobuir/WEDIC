<x-guest-layout>
    <div>
        <div class="relative min-h-screen flex items-center justify-center overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="absolute inset-0 bg-cover bg-center opacity-20"
                    style="background-image: url('/api/placeholder/1920/1080')"></div>
            </div>
            <div class="relative z-10 text-center px-4 sm:px-6 lg:px-8">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6">
                    Empowering Through
                    <span class="block text-pink-300 mt-2">Inclusive Excellence</span>
                </h1>
                <p class="text-xl md:text-2xl text-gray-200 max-w-3xl mx-auto mb-12">
                    Creating sustainable impact through women empowerment and disability inclusion consultancy services.
                </p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('services') }}"
                        class="group px-8 py-4 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition-all transform hover:scale-105">
                        Explore Services
                        <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform"></i>
                    </a>
                    <button
                        class="px-8 py-4 bg-pink-500 text-white rounded-lg font-semibold hover:bg-pink-600 transition-all transform hover:scale-105">
                        Get Started
                    </button>
                </div>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-20">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ([['icon' => 'users', 'label' => 'Women Empowered', 'value' => '500+'], ['icon' => 'target', 'label' => 'Projects Completed', 'value' => '50+'], ['icon' => 'globe', 'label' => 'Partner Organizations', 'value' => '30+'], ['icon' => 'heart', 'label' => 'Client Satisfaction', 'value' => '100%']] as $stat)
                    <div
                        class="bg-white rounded-xl shadow-lg p-6 text-center transform hover:scale-105 transition-all duration-300 hover:shadow-xl">
                        <i class="fas fa-{{ $stat['icon'] }} text-blue-600 text-2xl mb-3"></i>
                        <div class="text-3xl font-bold text-blue-600 mb-2">{{ $stat['value'] }}</div>
                        <div class="text-gray-600">{{ $stat['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
        @livewire('pages.website.servicess.service-view')
        @livewire('pages.website.testimonials.testimonial-view')
        <div class="bg-gray-50 py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-4xl font-bold text-center mb-16">
                    Featured Projects
                    <div class="w-24 h-1 bg-pink-500 mx-auto mt-4"></div>
                </h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach ($projects as $project)
                        <div
                            class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-2xl transition-all duration-300">
                            <div class="relative h-48">
                                <img src="{{ $project['image'] }}" alt="{{ $project['title'] }}"
                                    class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-300">
                                <div class="absolute top-4 right-4">
                                    <span class="px-4 py-2 bg-blue-600 text-white text-sm rounded-full">
                                        {{ $project['category'] }}
                                    </span>
                                </div>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">{{ $project['title'] }}</h3>
                                <p class="text-gray-600 mb-4">{{ $project['description'] }}</p>
                                <div class="flex items-center justify-between">
                                    <span class="text-blue-600 font-medium">{{ $project['impact'] }}</span>
                                    <button class="text-pink-500 hover:text-pink-600 flex items-center gap-2 group">
                                        Learn more
                                        <i
                                            class="fas fa-arrow-right transform group-hover:translate-x-1 transition-transform"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>


        <div class="bg-gray-50 py-24">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div
                    class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-12 md:p-16 relative overflow-hidden">
                    <div class="absolute inset-0 bg-pattern opacity-10"></div>
                    <div class="relative z-10">
                        <div class="max-w-3xl mx-auto text-center">
                            <h2 class="text-3xl md:text-4xl font-bold text-white mb-6">Stay Updated</h2>
                            <p class="text-gray-200 mb-8">Get the latest news about our projects, events, and impact
                                stories.</p>

                            <form wire:submit.prevent="subscribeNewsletter"
                                class="flex flex-col sm:flex-row gap-4 justify-center">
                                <input type="email" wire:model.lazy="newsletterEmail"
                                    placeholder="Enter your email"
                                    class="px-6 py-3 rounded-lg border focus:ring-2 focus:ring-blue-500 outline-none flex-grow max-w-md">
                                <button type="submit"
                                    class="px-8 py-3 bg-pink-500 text-white rounded-lg font-semibold hover:bg-pink-600 transition-colors whitespace-nowrap">
                                    Subscribe
                                </button>
                            </form>

                            <p class="mt-4 text-sm text-gray-200">
                                We care about your data. Read our
                                <a href="#" class="underline hover:text-white">Privacy Policy</a>.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-guest-layout>
