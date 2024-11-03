<x-guest-layout>
    <div>
        <!-- Hero Section -->
        <div class="relative h-[70vh] min-h-[85vh] overflow-hidden">
            <div class="absolute inset-0">
                <img src="{{ ($event->featured_image) }}" alt="{{ $event->title }}"
                    class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-b from-black-900/60 via-black-900/70 to-black-900/90"></div>
            </div>

            <!-- Breadcrumb -->
            <div class="absolute top-0 w-full bg-black-900/20 backdrop-blur-sm">
                <div class="container mx-auto px-4 py-28">
                    <div class="flex items-center text-wedic-blue-200 text-sm">
                        <a href="{{ route('home') }}" class="hover:text-wedic-blue-500 transition-colors">Home</a>
                        <span class="mx-2">-</span>
                        <a href="{{ route('events') }}" class="hover:text-wedic-blue-500 transition-colors">Events</a>
                        <span class="mx-2">-</span>
                        <span class="text-wedic-blue-500">{{ $event->title }}</span>
                    </div>
                </div>
            </div>

            <!-- Hero Content -->
            <div class="absolute bottom-0 w-full">
                <div class="container mx-auto px-4 py-12">
                    <div class="max-w-4xl">
                        @if ($event->category)
                            <span class="inline-block px-6 py-2 bg-wedic-blue-500 text-black-500 text-sm font-medium rounded-full mb-6">
                                {{ $event->category->name }}
                            </span>
                        @endif
                        <h1 class="text-3xl md:text-5xl font-bold text-wedic-blue-500 mb-6">{{ $event->title }}</h1>
                        <p class="text-xl text-wedic-blue-200 mb-8">{{ $event->header }}</p>

                        <!-- Event Meta Info -->
                        <div class="flex flex-wrap gap-6">
                            <div class="flex items-center gap-3 bg-black-500/30 backdrop-blur-sm rounded-full px-4 py-2 text-wedic-blue-200">
                                <svg class="w-5 h-5 text-wedic-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}
                            </div>
                            @if ($event->location)
                                <div class="flex items-center gap-3 bg-black-500/30 backdrop-blur-sm rounded-full px-4 py-2 text-wedic-blue-200">
                                    <svg class="w-5 h-5 text-wedic-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    </svg>
                                    {{ $event->location }}
                                </div>
                            @endif
                            @if ($event->organizer)
                                <div class="flex items-center gap-3 bg-black-500/30 backdrop-blur-sm rounded-full px-4 py-2 text-wedic-blue-200">
                                    <svg class="w-5 h-5 text-wedic-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    {{ $event->organizer }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-black-50 py-16">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                    <!-- Content Area -->
                    <div class="lg:col-span-2">
                        <div class="bg-white rounded-2xl shadow-lg p-8">
                            <div class="prose prose-lg max-w-none prose-headings:text-black-500 prose-p:text-black-400">
                                {!! $event->content !!}
                            </div>

                            @if (count(json_decode($event->files)) > 0)
                                <div class="mt-12 p-8 bg-black-50 rounded-xl">
                                    <h3 class="text-xl font-semibold text-black-500 mb-6">Event Resources</h3>
                                    <div class="space-y-4">
                                        @foreach (json_decode($event->files) as $file)
                                            <a href="{{ ($file) }}" target="__blank"
                                                class="flex items-center gap-4 p-4 bg-white rounded-xl hover:shadow-md transition-all duration-300
                                                    border-2 border-transparent hover:border-wedic-blue-500">
                                                <div class="w-12 h-12 bg-wedic-blue-100 rounded-xl flex items-center justify-center">
                                                    <svg class="w-6 h-6 text-wedic-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                                    </svg>
                                                </div>
                                                <span class="text-black-500 font-medium">{{ basename($file) }}</span>
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
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                            <div class="p-8">
                                <h3 class="text-xl font-bold text-black-500 mb-6">Event Details</h3>
                                <div class="space-y-6">
                                    @if ($event->cost)
                                        <div class="flex items-center gap-4 p-4 bg-wedic-blue-50 rounded-xl">
                                            <div class="w-12 h-12 bg-wedic-blue-100 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-wedic-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <span class="block text-sm text-black-400">Event Cost</span>
                                                <span class="block text-lg font-semibold text-black-500">{{ $event->cost }}</span>
                                            </div>
                                        </div>
                                    @endif

                                    @if ($event->end_date)
                                        <div class="flex items-center gap-4 p-4 bg-wedic-blue-50 rounded-xl">
                                            <div class="w-12 h-12 bg-wedic-blue-100 rounded-xl flex items-center justify-center">
                                                <svg class="w-6 h-6 text-wedic-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                </svg>
                                            </div>
                                            <div>
                                                <span class="block text-sm text-black-400">Duration</span>
                                                <span class="block text-lg font-semibold text-black-500">
                                                    {{ \Carbon\Carbon::parse($event->date)->format('M j, Y') }} -
                                                    {{ \Carbon\Carbon::parse($event->end_date)->format('M j, Y') }}
                                                </span>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @if ($event->link)
                                    <a href="{{ $event->link }}" target="_blank"
                                        class="mt-8 w-full inline-flex items-center justify-center px-8 py-4
                                        bg-wedic-blue-500 text-black-500 rounded-full font-semibold
                                        hover:bg-wedic-blue-600 transform hover:scale-105 transition-all duration-300">
                                        Register Now
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Related Events -->
                        @if ($relatedEvents->count() > 0)
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden">
                                <div class="p-8">
                                    <h3 class="text-xl font-bold text-black-500 mb-6">Related Events</h3>
                                    <div class="space-y-6">
                                        @foreach ($relatedEvents as $relatedEvent)
                                            <a href="{{ route('event.show', $relatedEvent->slug) }}"
                                                class="group block hover:bg-wedic-blue-50 rounded-xl p-4 transition-all duration-300">
                                                <div class="flex gap-4">
                                                    <img src="{{ ($relatedEvent->featured_image) }}"
                                                        alt="{{ $relatedEvent->title }}"
                                                        class="w-24 h-24 rounded-xl object-cover">
                                                    <div>
                                                        <h4 class="font-semibold text-black-500 group-hover:text-wedic-blue-500
                                                            transition-colors duration-300">
                                                            {{ $relatedEvent->title }}
                                                        </h4>
                                                        <p class="text-sm text-black-400 mt-2">
                                                            {{ \Carbon\Carbon::parse($relatedEvent->date)->format('F j, Y') }}
                                                        </p>
                                                    </div>
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
    </div>
</x-guest-layout>
