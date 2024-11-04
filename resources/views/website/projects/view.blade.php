<x-guest-layout>
    @if ($project)
        <!-- Hero Section -->
        <section class="relative min-h-screen bg-gray-50">
            <!-- Header Content -->
            <div class="relative z-10 container px-4 mx-auto max-w-6xl pt-24 pb-48">
                <div class="text-center space-y-6">
                    <!-- Category and Date Badge -->
                    <div class="flex items-center justify-center gap-3 animate-fade-in-down">
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-wedic-blue-100 text-wedic-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            {{ $project?->created_at?->format('M d, Y') }}
                        </span>
                        <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-wedic-blue-100 text-wedic-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            {{ $project?->category?->name }}
                        </span>
                    </div>

                    <!-- Title -->
                    <h1 class="font-bold text-4xl md:text-6xl text-gray-900 max-w-4xl mx-auto leading-tight animate-fade-in">
                        {{ $project?->title }}
                    </h1>
                </div>
            </div>

            <!-- Featured Image -->
            <div class="relative">
                <div class="absolute inset-0 bg-gradient-to-b from-gray-50 to-transparent h-32 z-10"></div>
                <div class="container max-w-6xl mx-auto px-4">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl group">
                        <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-black/50"></div>
                        <img 
                            src="{{ $project?->featured_image }}" 
                            alt="{{ $project?->title }}"
                            class="w-full h-[75vh] object-cover transform transition-transform duration-700 group-hover:scale-105"
                        >
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="relative -mt-32 z-20">
                <div class="container max-w-5xl mx-auto px-4">
                    <div class="bg-white rounded-2xl shadow-xl p-8 md:p-16">
                        <!-- Project Meta -->
                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 mb-12">
                            <!-- Status -->
                            <div class="bg-gray-50 rounded-xl p-6 group hover:bg-wedic-blue-50 transition-colors duration-300">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-wedic-blue-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-wedic-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-500">Status</div>
                                        <div class="font-semibold text-gray-900">{{ $project->event_status }}</div>
                                    </div>
                                </div>
                            </div>

                            <!-- Date -->
                            <div class="bg-gray-50 rounded-xl p-6 group hover:bg-wedic-blue-50 transition-colors duration-300">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-wedic-blue-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-wedic-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-500">Duration</div>
                                        <div class="font-semibold text-gray-900">
                                            {{ $project?->start_date?->format('M d, Y') }} -
                                            {{ $project?->end_date?->format('M d, Y') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Location -->
                            <div class="bg-gray-50 rounded-xl p-6 group hover:bg-wedic-blue-50 transition-colors duration-300">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-wedic-blue-100 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-6 h-6 text-wedic-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm text-gray-500">Location</div>
                                        <div class="font-semibold text-gray-900">{{ $project?->location }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Partners Section -->
                        @if (count($project?->partner) > 0)
                            <div class="mb-12">
                                <h3 class="text-lg font-semibold text-gray-900 mb-6">Project Partners</h3>
                                <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
                                    @foreach ($project?->partner as $partner)
                                        <div class="bg-gray-50 p-4 rounded-xl group hover:bg-white hover:shadow-lg transition-all duration-300">
                                            <img 
                                                src="{{ $partner?->logo }}" 
                                                alt="{{ $partner?->name }}"
                                                class="w-full h-auto transform group-hover:scale-105 transition-transform duration-300"
                                            >
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Main Content -->
                        <div class="prose prose-lg max-w-none">
                            <div class="prose w-full prose-headings:text-wedic-blue-900 prose-headings:font-bold prose-h1:text-3xl prose-h2:text-2xl prose-h3:text-xl prose-a:text-wedic-blue-600 prose-a:no-underline hover:prose-a:text-wedic-blue-800 prose-img:rounded-xl prose-strong:text-wedic-blue-900">
                                {!! $project?->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Add these styles -->
        <style>
            @keyframes fade-in {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fade-in-down {
                from {
                    opacity: 0;
                    transform: translateY(-10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .animate-fade-in {
                animation: fade-in 0.6s ease-out forwards;
            }

            .animate-fade-in-down {
                animation: fade-in-down 0.6s ease-out forwards;
            }
        </style>
    @endif
</x-guest-layout>