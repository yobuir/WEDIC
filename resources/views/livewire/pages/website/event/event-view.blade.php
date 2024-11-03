<div
    class="min-h-screen bg-gradient-to-b min-w-full w-full from-black-50 to-white dark:from-black-900 dark:to-black-800">

    <div class="container mx-auto max-w-7xl px-4 py-16 flex flex-col w-full flex-1">

        <!-- Events Grid -->
        <div class="grid gap-6 w-full min-w-full">
            @if ($hasFilters)
                @foreach ($filteredEvents as $event)
                    @include('includes.events.card')
                @endforeach
            @else
                @foreach ($groupedEvents as $date => $events)
                    <div class="space-y-4">
                        <h2
                            class="text-xl font-semibold text-gray-900 dark:text-white sticky top-0 bg-white/80 dark:bg-wedic-blue-800/80 backdrop-blur-sm p-4 rounded-lg z-10">
                            {{ Carbon\Carbon::parse($date)->format('l, F j, Y') }}
                        </h2>
                        <div class="space-y-4">
                            @foreach ($events as $event)
                                @include('includes.events.card')
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        @if ($hasFilters)
            @if (count($filteredEvents)<= 0)
                <div class="w-full bg-white dark:bg-wedic-blue-800 rounded-2xl shadow-sm p-12">
                    <div class="flex flex-col items-center justify-center">
                        <div
                            class="flex items-center justify-center w-20 h-20 rounded-full bg-wedic-blue-50 dark:bg-wedic-blue-900/50 mb-6">
                            <svg class="w-10 h-10 text-wedic-blue-600 dark:text-wedic-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                            No Events Found
                        </h3>

                        <p class="text-gray-600 dark:text-gray-400 text-center max-w-md mb-8">
                            Try adjusting your search or date range to find more events.
                        </p>

                        <div class="flex gap-4">
                            <button wire:click="resetFilters"
                                class="inline-flex items-center gap-2 px-6 py-3 bg-wedic-blue-600 text-white rounded-full
                                       hover:bg-wedic-blue-700 transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                Reset Filters
                            </button>

                            <button wire:click="setToday"
                                class="inline-flex items-center gap-2 px-6 py-3 border-2 border-wedic-blue-600 text-wedic-blue-600
                                       dark:border-wedic-blue-400 dark:text-wedic-blue-400 rounded-full hover:bg-wedic-blue-50
                                       dark:hover:bg-wedic-blue-900/20 transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                View Today's Events
                            </button>
                        </div>
                    </div>
                </div>
            @endif
        @else
            @if (count($groupedEvents) <= 0)
                <div class="w-full bg-white dark:bg-wedic-blue-800 rounded-2xl shadow-sm p-12">
                    <div class="flex flex-col items-center justify-center">
                        <div
                            class="flex items-center justify-center w-20 h-20 rounded-full bg-wedic-blue-50 dark:bg-wedic-blue-900/50 mb-6">
                            <svg class="w-10 h-10 text-wedic-blue-600 dark:text-wedic-blue-400" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>

                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                            No Events Found
                        </h3>

                        <p class="text-gray-600 dark:text-gray-400 text-center max-w-md mb-8">
                            No events found yet
                        </p>
                    </div>
                </div>
            @endif
        @endif


        <!-- Loading State -->
        <div wire:loading.flex wire:target="selectedStartDate, selectedEndDate"
            class="fixed inset-0 bg-black/20 backdrop-blur-sm z-50 items-center justify-center">
            <div class="bg-white dark:bg-wedic-blue-800 rounded-lg p-6 shadow-xl">
                <div class="flex items-center gap-4">
                    <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-wedic-blue-600"></div>
                    <span class="text-gray-700 dark:text-gray-300">Loading events...</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('dates', {
                generateCalendarDays(month, year) {
                    // Add calendar generation logic here
                }
            })
        })
    </script>
</div>
