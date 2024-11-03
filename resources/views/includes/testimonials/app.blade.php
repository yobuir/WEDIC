
    @if (count($testimonials) > 0)
        <section class="bg-white dark:bg-gray-900">
            <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-6">
                <div class="mx-auto max-w-screen-sm">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-wedic-blue-500 dark:text-white">What People
                        are Saying</h2>
                </div>
                <div class="grid mb-8 lg:mb-12 lg:grid-cols-2">
                    @forelse ($testimonials as $testimonial)
                        <figure
                            class="flex flex-col justify-center items-center p-8 text-center bg-gray-50 border-b border-gray-200 md:p-12 lg:border-r dark:bg-wedic-blue-800 dark:border-gray-700"
                            key={testimonial.id}>
                            <blockquote class="mx-auto mb-8 max-w-2xl text-gray-500 dark:text-gray-400">
                                <p class="my-4">{{ $testimonial?->message }}</p>
                            </blockquote>
                            <figcaption class="flex justify-center items-center space-x-3">
                                <img class="w-9 h-9 rounded-full" src={{ $testimonial->profile }}
                                    alt="{{ $testimonial?->name }}" />
                                <div class="space-y-0.5 font-medium dark:text-white text-left">
                                    <div class="capitalize">{{ $testimonial?->name }}</div>
                                    <div class="text-sm font-light text-gray-500 dark:text-gray-400">
                                        {{ $testimonial?->role }}</div>
                                </div>
                            </figcaption>
                        </figure>
                    @empty
                    @endforelse

                </div>
            </div>
        </section>
    @endif
