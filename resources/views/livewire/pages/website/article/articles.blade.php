<main class="pt-8 pb-16 lg:pt-16 lg:pb-24   antialiased">
    @if ($item)
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">

                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $item->title }}
                    </h1>
                    <p class="text-xs text-gray-500 dark:text-gray-400">
                        <time pubdate datetime="2022-02-08" title="{{ $item->created_at?->format('Y-M-d') }}"> Created On.
                            {{ $item->created_at?->format('Y-M-d') }}</time>

                        <div class="text-xs text-gray-500 dark:text-gray-400">
                            Created By. {{ $item?->createdBy?->name }}
                        </div>
                    </p>
                </header>
                <p class="lead">{{ $item->header }}</p>
                <figure class="my-6">
                    <img src="{{ $item->featured_image }}" alt=" {{ $item->title }}" class="w-full rounded-lg">
                    <figcaption class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                        {{ $item->title }}
                    </figcaption>
                </figure>
                <div class="prose">
                    {!! $item->content !!}
                </div>
                <!-- Add more content here -->
            </article>
        </div>
    @else
        <div class="col-span-3 text-center text-gray-500 dark:text-gray-400">No training found</div>
    @endif


</main>
