<x-guest-layout>
    <!-- Hero Section with Parallax -->
    <div class="relative min-h-[85vh] flex items-end overflow-hidden">
        <!-- Background Image with Overlay -->
        <div class="absolute inset-0">
            <img src="{{ $event->featured_image }}" alt="{{ $event->title }}"
                class="w-full h-full object-cover transform scale-105 hover:scale-100 transition-transform duration-700">
            <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/70 to-black/90"></div>
        </div>

        <!-- Animated Breadcrumb -->
        <div class="absolute top-20 w-full bg-gradient-to-b from-black/80 to-transparent backdrop-blur-sm">
            <div class="container mx-auto px-4 py-8">
                <nav class="flex items-center space-x-3 text-sm text-white/80 animate-fade-in-down">
                    <a href="{{ route('home') }}" 
                       class="hover:text-blue-400 transition-colors duration-300 flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Home
                    </a>
                    <span class="text-white/40">/</span>
                    <a href="{{ route('events') }}" 
                       class="hover:text-blue-400 transition-colors duration-300">Events</a>
                    <span class="text-white/40">/</span>
                    <span class="text-blue-400">{{ $event->title }}</span>
                </nav>
            </div>
        </div>

        <!-- Hero Content -->
        <div class="relative container mx-auto px-4 pb-16">
            <div class="max-w-4xl animate-fade-in-up">
                @if ($event->category)
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-blue-500/20 text-blue-300 backdrop-blur-sm mb-6">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        {{ $event->category->name }}
                    </span>
                @endif

                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                    {{ $event->title }}
                </h1>
                
                <p class="text-xl text-gray-300 mb-8 leading-relaxed">
                    {{ $event->header }}
                </p>

                <!-- Event Meta Info -->
                <div class="flex flex-wrap gap-4">
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-5 py-3 text-white group hover:bg-white/20 transition-colors duration-300">
                        <div class="w-10 h-10 bg-blue-500/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-5 h-5 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="block text-sm text-gray-300">Date</span>
                            <span class="font-medium">{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</span>
                        </div>
                    </div>

                    @if ($event->location)
                        <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-5 py-3 text-white group hover:bg-white/20 transition-colors duration-300">
                            <div class="w-10 h-10 bg-purple-500/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-sm text-gray-300">Location</span>
                                <span class="font-medium">{{ $event->location }}</span>
                            </div>
                        </div>
                    @endif

                    @if ($event->organizer)
                        <div class="flex items-center gap-3 bg-white/10 backdrop-blur-sm rounded-xl px-5 py-3 text-white group hover:bg-white/20 transition-colors duration-300">
                            <div class="w-10 h-10 bg-pink-500/20 rounded-lg flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-5 h-5 text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                            <div>
                                <span class="block text-sm text-gray-300">Organizer</span>
                                <span class="font-medium">{{ $event->organizer }}</span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="bg-gray-50 py-16">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Content Area -->
                <div class="lg:col-span-2 space-y-12">
                    <!-- Event Description -->
                    <div class="bg-white rounded-2xl shadow-xl p-8 animate-fade-in-up">
                        <div class="prose prose-lg max-w-none">
                            {!! $event->content !!}
                        </div>

                        @if (count(json_decode($event->files)) > 0)
                            <div class="mt-12 p-8 bg-gray-50 rounded-2xl border border-gray-100">
                                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                    <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Event Resources
                                </h3>
                                <div class="space-y-4">
                                    @foreach (json_decode($event->files) as $file)
                                        <a href="{{ $file }}" target="_blank"
                                            class="group flex items-center gap-4 p-4 bg-white rounded-xl hover:shadow-lg transition-all duration-300 border-2 border-transparent hover:border-blue-500">
                                            <div class="w-12 h-12 bg-blue-50 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                                <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                                </svg>
                                            </div>
                                            <span class="text-gray-700 font-medium group-hover:text-blue-500 transition-colors duration-300">
                                                {{ basename($file) }}
                                            </span>
                                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-500 transform group-hover:translate-x-1 transition-all duration-300 ml-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                                            </svg>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1 space-y-8">
                    <!-- Event Details Card -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden sticky top-8">
                        <div class="p-8">
                            <h3 class="text-xl font-bold text-gray-900 mb-6">Event Details</h3>
                            
                            @if ($event->cost)
                                <div class="p-6 bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl mb-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-blue-500/10 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="block text-sm text-gray-500">Event Cost</span>
                                            <span class="block text-2xl font-bold text-gray-900">{{ $event->cost }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($event->end_date)
                                <div class="p-6 bg-gradient-to-br from-purple-50 to-pink-50 rounded-2xl mb-6">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-purple-500/10 rounded-xl flex items-center justify-center">
                                            <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <span class="block text-sm text-gray-500">Duration</span>
                                            <span class="block text-lg font-semibold text-gray-900">
                                                {{ \Carbon\Carbon::parse($event->date)->format('M j, Y') }} -
                                                {{ \Carbon\Carbon::parse($event->end_date)->format('M j, Y') }}
                                            </span>
                                        </div>
                                   </div>
                            @endif

                            @if ($event->link)
                                <a href="{{ $event->link }}" target="_blank"
                                    class="group relative w-full inline-flex items-center justify-center px-8 py-4 bg-gradient-to-r from-blue-600 to-purple-600 text-white rounded-xl font-semibold hover:from-blue-700 hover:to-purple-700 transform hover:scale-105 transition-all duration-300 overflow-hidden">
                                    <span class="relative z-10 flex items-center">
                                        Register Now
                                        <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </span>
                                    <div class="absolute inset-0 bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                </a>

                                <!-- Share Event -->
                                <div class="mt-8 pt-8 border-t border-gray-100">
                                    <h4 class="text-sm font-semibold text-gray-500 mb-4">Share this event</h4>
                                    <div class="flex space-x-4">
                                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($event->title) }}"
                                           target="_blank"
                                           class="group flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-blue-100 transition-colors duration-300">
                                            <svg class="w-5 h-5 text-gray-500 group-hover:text-blue-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"/>
                                            </svg>
                                        </a>
                                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                           target="_blank"
                                           class="group flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-indigo-100 transition-colors duration-300">
                                            <svg class="w-5 h-5 text-gray-500 group-hover:text-indigo-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/>
                                            </svg>
                                        </a>
                                        <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(request()->url()) }}&title={{ urlencode($event->title) }}"
                                           target="_blank"
                                           class="group flex items-center justify-center w-10 h-10 rounded-full bg-gray-100 hover:bg-blue-100 transition-colors duration-300">
                                            <svg class="w-5 h-5 text-gray-500 group-hover:text-blue-500 transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                                <path d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Related Events -->
                    @if ($relatedEvents->count() > 0)
                        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                            <div class="p-8">
                                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                    <svg class="w-6 h-6 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Related Events
                                </h3>
                                <div class="space-y-6">
                                    @foreach ($relatedEvents as $relatedEvent)
                                        <a href="{{ route('event.show', $relatedEvent->slug) }}"
                                            class="group block hover:bg-gray-50 rounded-xl transition-all duration-300">
                                            <div class="flex gap-4 items-center p-4">
                                                <div class="relative flex-shrink-0 w-24 h-24 overflow-hidden rounded-xl">
                                                    <img src="{{ $relatedEvent->featured_image }}"
                                                        alt="{{ $relatedEvent->title }}"
                                                        class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500">
                                                </div>
                                                <div class="flex-1 min-w-0">
                                                    <h4 class="font-semibold text-gray-900 group-hover:text-blue-600 transition-colors duration-300 truncate">
                                                        {{ $relatedEvent->title }}
                                                    </h4>
                                                    <div class="flex items-center mt-2 text-sm text-gray-500">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                        </svg>
                                                        {{ \Carbon\Carbon::parse($relatedEvent->date)->format('F j, Y') }}
                                                    </div>
                                                </div>
                                                <svg class="w-5 h-5 text-gray-400 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Add these styles to your CSS -->
    <style>
        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.5s ease-out forwards;
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.5s ease-out forwards;
        }
    </style>
</x-guest-layout>