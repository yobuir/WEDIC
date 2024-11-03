<x-guest-layout>
    <!-- Hero Section -->


        <div class="relative h-[40vh] bg-gradient-to-r from-black-900 via-black-800 to-black-900 overflow-hidden">
        <!-- Animated Pattern -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0"
                style="background-image: linear-gradient(45deg, rgba(255,215,0,0.1) 25%, transparent 25%),
                    linear-gradient(-45deg, rgba(255,215,0,0.1) 25%, transparent 25%),
                    linear-gradient(45deg, transparent 75%, rgba(255,215,0,0.1) 75%),
                    linear-gradient(-45deg, transparent 75%, rgba(255,215,0,0.1) 75%);
                background-size: 20px 20px;
                animation: patternMove 20s linear infinite;">
            </div>
        </div>
        <!-- Content -->
        <div class="relative max-w-7xl mx-auto px-4 h-full flex items-center">
            <div class="max-w-3xl">
                <h1 class="text-5xl font-bold mb-4 text-wedic-blue-500">What People are Saying</h1>
                <p class="text-xl text-wedic-blue-200">Hear from our clients about their experiences working with us</p>
            </div>
        </div>
    </div>

    @if (count($testimonials) > 0)
    <section class="py-24 bg-black-50">
        <div class="container max-w-6xl mx-auto px-4">
            <div class="grid gap-8 lg:grid-cols-2">
                @forelse ($testimonials as $testimonial)
                <div class="group bg-white rounded-2xl p-8 md:p-10 shadow-lg hover:shadow-xl transition-all duration-300">
                    <!-- Quote Icon -->
                    <div class="w-12 h-12 bg-wedic-blue-100 rounded-full flex items-center justify-center mb-6
                        group-hover:bg-wedic-blue-500 transition-all duration-300">
                        <svg class="w-6 h-6 text-wedic-blue-500 group-hover:text-black-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10.5h-.13C6.4 10.5 5 9.1 5 7.375S6.4 4.25 7.87 4.25c1.48 0 2.67 1.19 2.67 2.667M17 10.5h-.13c-1.47 0-2.87-1.4-2.87-3.125S15.4 4.25 16.87 4.25c1.48 0 2.67 1.19 2.67 2.667">
                            </path>
                        </svg>
                    </div>

                    <!-- Testimonial Content -->
                    <blockquote class="mb-8">
                        <p class="text-lg text-black-400 leading-relaxed italic">
                            "{{ $testimonial?->message }}"
                        </p>
                    </blockquote>

                    <!-- Author Info -->
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-full overflow-hidden ring-2 ring-wedic-blue-500 ring-offset-2">
                            <img class="w-full h-full object-cover"
                                src="{{ $testimonial->profile }}"
                                alt="{{ $testimonial?->name }}" />
                        </div>
                        <div>
                            <div class="font-bold text-black-500 capitalize">{{ $testimonial?->name }}</div>
                            <div class="text-sm text-wedic-blue-500">{{ $testimonial?->role }}</div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-2 text-center py-12">
                    <p class="text-black-400 text-lg">No testimonials available at the moment.</p>
                </div>
                @endforelse
            </div>
        </div>
    </section>
    @endif

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-black-900 via-black-800 to-black-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0"
                style="background-image: linear-gradient(45deg, rgba(255,215,0,0.1) 25%, transparent 25%),
                    linear-gradient(-45deg, rgba(255,215,0,0.1) 25%, transparent 25%),
                    linear-gradient(45deg, transparent 75%, rgba(255,215,0,0.1) 75%),
                    linear-gradient(-45deg, transparent 75%, rgba(255,215,0,0.1) 75%);
                background-size: 20px 20px;
                animation: patternMove 20s linear infinite;">
            </div>
        </div>
        <div class="relative container max-w-6xl mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-wedic-blue-500 mb-6">Ready to Start Your Journey?</h2>
            <p class="text-xl text-wedic-blue-200 mb-10 max-w-2xl mx-auto">
                Join our community of successful entrepreneurs and experience the difference for yourself.
            </p>
            <a href="{{ route('contactUs') }}" class="inline-flex items-center px-8 py-4 bg-wedic-blue-500 text-black-500 rounded-full font-semibold
                hover:bg-wedic-blue-600 transform hover:scale-105 transition-all duration-300">
                Get Started
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </section>

    <style>
        @keyframes patternMove {
            0% { background-position: 0 0; }
            100% { background-position: 40px 40px; }
        }
    </style>
</x-guest-layout>
