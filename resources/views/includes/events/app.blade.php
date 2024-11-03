@if (count($events) > 0)
    <div class="bg-white min-h-screen flex items-center">
        <div class="container mx-auto py-8 max-w-screen-xl flex flex-wrap items-center justify-between p-4">
            <div class="flex flex-col  w-full">
                <div class=" w-full">
                    <h2 class="text-3xl md:text-4xl font-semibold text-wedic-blue-500 mb-6 text-center">Upcoming Events
                    </h2>
                </div>
                <div class="flex flex-wrap  gap-5">
                    @forelse ($events as $event)
                        <div class="w-full shadow border  mb-6 md:w-1/2 lg:w-1/3  min-w-[400px]" key={event.id}>
                            <a wire:navigate class="mb-0 overflow-hidden bg-white rounded-lg shadow "
                                href={{ route('event', $event?->slug) }}>
                                <div class="relative overflow-hidden h-72 w-full">
                                    <img class="object-cover w-full h-full transition-all rounded-lg hover:scale-110"
                                        src={{ $event->featured_image }}  alt="" />
                                </div>
                                <div class="px-4 py-8">
                                    <span
                                        class="block mb-2 text-xs font-semibold text-secondary-700 uppercase dark:text-secondary-300">
                                        {{ $event?->created_at?->format('M-D-Y') }}

                                    </span>
                                    <h2
                                        class="mb-3 text-2xl hover:underline font-bold leading-9 text-secondary-800 dark:text-white">
                                        {{ $event?->title }}
                                    </h2>
                                    <p class="text-base leading-7 text-gray-400">
                                        {{ $event?->header }}
                                        {{ Str::limit($event?->header, 10) }}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @empty
                    @endforelse

                </div>
                <div>
                    <a wire:navigate href={{ route('events') }}
                        class="mt-10 inline-block bg-wedic-blue-500 text-white  font-semibold py-3 px-6 rounded-full transition duration-300 hover:bg-secondary-600">
                        View All Events
                    </a>
                </div>
                </.div>

            </div>
        </div>
@endif
