<x-guest-layout>
    @if ($project)
        <section class="">
            <div class="container px-4 md:px-0 max-w-6xl mx-auto ">
                <div class=' font-sans leading-normal tracking-normal py-6 pt-0'>
                    <div class="text-center mt-6">
                        <p class="text-sm md:text-base text-wedic-blue-500 font-bold">
                            {{ $project?->created_at?->format('M-D-Y') }}<span class="text-wedic-blue-500 "> / </span>
                            {{ $project?->category?->name }} </p>
                        <h1 class="font-bold break-normal text-3xl md:text-5xl">{{ $project?->title }}</h1>
                    </div>
                </div>
                <div class="container w-full max-w-6xl mx-auto bg-wedic-blue-500 bg-cover rounded h-[75vh] object-cover"
                    style="background-image: url({{ $project?->featured_image }})">
                </div>
                <div class="container max-w-5xl mx-auto -mt-32">
                    <div class="mx-0 sm:mx-6 bg-white flex flex-col w-full p-8 md:p-24 ">
                        <div class='flex flex-col gap-3 justify-center text-gray-600'>
                            <div class='flex gap-2 items-center'>
                                <span class='bg-wedic-blue-500 text-white py-1 px-6 '>{{ $project->event_status }}</span>
                            </div>
                            <div class='flex gap-2 items-center'>
                                <i class="fa-regular fa-calendar"></i>
                                <span>
                                    {{ $project?->start_date?->format('M-D-Y') }} -
                                    {{ $project?->end_date?->format('M-D-Y') }}</span>
                            </div>
                            <div class='flex gap-2 items-center'>
                                <i class="fa-solid fa-location-dot"></i>
                                <span>{{ $project?->location }}</span>
                            </div>

                        </div>
                        @if (count($project?->partner) > 0)
                            <div class='flex flex-wrap mt-3'>
                                @forelse ($project?->partner as $partner)
                                    <div class='w-20'>
                                        <img src={{ $partner?->logo }} alt={{ $partner?->name }} />
                                    </div>
                                @empty
                                @endforelse
                            </div>
                        @endif

                            <div class="flex-1">
                                 <div class='prose w-full dark:text-slate-100 prose-h1:text-wedic-blue-500 prose-headings:text-2xl prose-h2:text-wedic-blue-500 prose-h3:text-wedic-blue-500 prose-a:text-red-600 prose-a:underline sm:max-w-6xl mt-6 p-6   prose-img:rounded-xl prose-headings:underline prose-headings:text-wedic-blue-900 prose-figcaption:font-bold prose-figcaption:text-wedic-blue-900 prose-strong:text-wedic-blue-900 prose-strong:text-lg prose-ul:m-0 prose-ul:p-0  prose-li:text-primary-500 prose-list:text-primary-500 hover:prose-a:text-wedic-blue-900 prose-hr:p-0 prose-hr:m-0 prose-hr:mb-5 prose-table:border prose-thead:border prose-tr:border prose-th:border prose-td:border prose-td:py-3  prose-td:px-3  prose-th:py-3 prose-th:px-3 prose-th:text-bold   '>
                            {!! $project?->content !!}
                        </div>
                            </div>


                    </div>
                </div>
            </div>

        </section>

    @endif
</x-guest-layout>
