<x-guest-layout>
    <div>
        {{-- Hero Section --}}
        <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 py-24">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                        Our Services
                    </h1>
                    <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                        Comprehensive consultancy and project management solutions
                    </p>
                </div>
            </div>
        </div>
        @livewire('pages.website.servicess.service-view')
        {{-- Case Studies Section --}}
        <div class="bg-gray-50 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-gray-900 text-center mb-12">Success Stories</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    @foreach (range(1, 3) as $index)
                        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                            <img src="/api/placeholder/400/300" alt="Case Study" class="w-full h-48 object-cover">
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-2">Case Study {{ $index }}</h3>
                                <p class="text-gray-600 mb-4">Brief description of the successful project implementation
                                    and its impact.</p>
                                <a href="#"
                                    class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                                    Read More
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{-- CTA Section --}}
        <div class="bg-blue-600 py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h2 class="text-3xl font-bold text-white mb-6">Ready to Get Started?</h2>
                    <p class="text-xl text-gray-200 mb-8">
                        Let's discuss how we can help your organization achieve its goals
                    </p>
                    <a href="{{ route('contactUs') }}"
                        class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                        Contact Us Today
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
