<x-guest-layout>
    <!-- Enhanced Hero Section -->
    <div class="relative overflow-hidden">
        <!-- Animated background gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 animate-gradient"></div>
        
        <!-- Overlay patterns -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-grid-white/[0.2] bg-grid-pattern"></div>
            <div class="absolute inset-0 bg-black/50 backdrop-blur-[2px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="text-center space-y-8">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-white/10 text-white backdrop-blur-sm">
                    🚀 Explore Our Work
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                    Projects and 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-purple-200">
                        Initiatives
                    </span>
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200 leading-relaxed">
                    Discover our latest projects and initiatives that are making a difference in the community
                </p>
                
                <!-- Stats Section -->
                <div class="grid grid-cols-2 md:grid-cols-3 gap-8 max-w-3xl mx-auto mt-12">
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white">{{ count($projects) }}+</div>
                        <div class="text-gray-300 mt-1">Projects</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white">100%</div>
                        <div class="text-gray-300 mt-1">Success Rate</div>
                    </div>
                    <div class="text-center">
                        <div class="text-4xl font-bold text-white">24/7</div>
                        <div class="text-gray-300 mt-1">Support</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if (count($projects) > 0)
        <section class="relative bg-gray-50 py-24 dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($projects as $index => $project)
                        <div class="group" 
                             wire:key="{{ $project?->id }}"
                             style="animation: fadeInUp 0.5s ease-out {{ $index * 0.1 }}s both;">
                            <a wire:navigate 
                               href="{{ route('project', $project?->slug) }}"
                               class="block h-full bg-white rounded-2xl shadow-lg dark:bg-gray-700 transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl overflow-hidden">
                                <div class="relative overflow-hidden aspect-w-16 aspect-h-12">
                                    <img 
                                        class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110"
                                        src="{{ $project->featured_image }}" 
                                        alt="{{ $project->title }}"
                                    />
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    <span class="absolute bottom-4 left-1/2 -translate-x-1/2 px-6 py-2 text-sm font-medium text-white bg-secondary-500 rounded-full backdrop-blur-sm">
                                        {{ $project?->category?->name }}
                                    </span>
                                </div>
                                <div class="p-8">
                                    <div class="flex items-center gap-2 mb-4">
                                        <svg class="w-5 h-5 text-secondary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-sm font-medium text-secondary-700 dark:text-secondary-300">
                                            {{ $project?->start_date?->format('M d, Y') }} - {{ $project?->end_date?->format('M d, Y') }}
                                        </span>
                                    </div>
                                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white group-hover:text-secondary-500 transition-colors duration-300">
                                        {{ $project?->title }}
                                    </h2>
                                    <p class="mt-4 text-gray-600 dark:text-gray-400 line-clamp-2">
                                        {{ $project?->header }}
                                    </p>
                                    <div class="mt-6 flex items-center text-secondary-500 font-medium">
                                        <span>Learn more</span>
                                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <div class="col-span-full flex flex-col items-center justify-center py-16">
                            <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                            </svg>
                            <p class="text-xl text-gray-500 font-medium">No projects found</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    @endif

    @if (count($testimonials) > 0)
        <section class="relative bg-white py-24 dark:bg-gray-900 overflow-hidden">
            <!-- Decorative elements -->
            <div class="absolute inset-0">
                <div class="absolute -right-32 -top-32 w-96 h-96 rounded-full bg-secondary-100 blur-3xl opacity-50"></div>
                <div class="absolute -left-32 bottom-0 w-96 h-96 rounded-full bg-blue-100 blur-3xl opacity-50"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="text-secondary-500 font-medium">Testimonials</span>
                    <h2 class="mt-4 text-4xl font-extrabold text-gray-900 dark:text-white">
                        What People are Saying
                    </h2>
                </div>

                <div class="grid gap-8 lg:grid-cols-2">
                    @forelse ($testimonials as $index => $testimonial)
                        <div class="relative"
                             style="animation: fadeIn 0.5s ease-out {{ $index * 0.2 }}s both;">
                            <div class="p-8 bg-gray-50 dark:bg-gray-800 rounded-2xl">
                                <!-- Quote icon -->
                                <svg class="w-10 h-10 text-secondary-500/20 absolute top-6 right-6" fill="currentColor" viewBox="0 0 32 32">
                                    <path d="M10 8c-3.3 0-6 2.7-6 6v10h10V14H6c0-2.2 1.8-4 4-4V8zm18 0c-3.3 0-6 2.7-6 6v10h10V14h-8c0-2.2 1.8-4 4-4V8z"/>
                                </svg>

                                <blockquote class="relative">
                                    <p class="text-lg text-gray-600 dark:text-gray-400 leading-relaxed">
                                        {{ $testimonial?->message }}
                                    </p>
                                </blockquote>

                                <div class="mt-8 flex items-center gap-4">
                                    <img 
                                        class="w-12 h-12 rounded-full object-cover ring-4 ring-white dark:ring-gray-700" 
                                        src="{{ $testimonial->profile }}" 
                                        alt="{{ $testimonial?->name }}"
                                    />
                                    <div>
                                        <div class="font-medium text-gray-900 dark:text-white">
                                            {{ $testimonial?->name }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">
                                            {{ $testimonial?->role }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>
        </section>
    @endif

    <!-- Add these styles to your CSS -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }

        .bg-grid-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23fff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</x-guest-layout>