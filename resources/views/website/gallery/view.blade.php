<x-guest-layout>
    @if ($event)
    @endif
    <section class="">
        <div class="container px-4 md:px-0 max-w-6xl mx-auto ">
            <div class=' font-sans leading-normal tracking-normal py-6 pt-0'>
                <div class="text-center mt-6">
                    <p class="text-sm md:text-base text-wedic-blue-500 font-bold">
                        {{ $event?->created_at?->format('M-D-Y') }}
                        <span class="text-wedic-blue-500 "> / </span>
                        {{ $event?->category?->name }}
                    </p>
                    <h1 class="font-bold break-normal text-3xl md:text-5xl"> {{ $event?->title }}</h1>
                </div>
            </div>
            <div class="container w-full max-w-6xl mx-auto bg-wedic-blue-500 bg-cover rounded h-[75vh] object-cover"
                style="background-image: url({{ $event?->featured_image }})">
            </div>
            <div class="container max-w-5xl mx-auto -mt-32">

                <div class="mx-0 sm:mx-6 bg-white p-8 md:p-24 ">
                    <div class=" w-full text-xl md:text-2xl text-gray-800 leading-normal break-all">
                        <p class="text-2xl md:text-3xl mb-5">
                            {{ $event?->header }}
                        </p>
                    </div>
                    <div class='flex flex-col gap-3 justify-center text-gray-600'>

                        <div class='flex gap-2 items-center'>
                            <i class="fa-regular fa-calendar"></i>
                            <span>{{ $event?->created_at?->format('M-D-Y') }}</span>
                        </div>
                        @if ($event?->cost)
                            <div class='flex gap-2 items-center'>
                                <i class="fa-solid fa-money-bill"></i>
                                <span> {{ Number::currency($event?->cost ?? '0', in: $event->currency ?? 'RWF') }}
                                </span>
                            </div>
                        @endif

                        @if ($event?->cost)
                            <div class='flex gap-2 items-center'>
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $event?->location }}</span>
                            </div>
                        @endif
                        @if ($event?->organizer)
                            <div class='flex gap-2 items-center'>
                                <i class="fa-solid fa-users"></i>
                                <span>{{ $event?->organizer }}</span>
                            </div>
                        @endif

                    </div>
                    <div class='mt-6 prose'>
                        {!! $event?->content !!}
                    </div>

                </div>
            </div>
        </div>

    </section>
</x-guest-layout>
