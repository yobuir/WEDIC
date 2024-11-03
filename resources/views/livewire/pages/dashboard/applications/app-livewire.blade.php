<div>
    <div class="mt-5">
        <div class="flex flex-col w-[100%] gap-3">
            <div class="grid lg:grid-cols-3 grid-cols-1">
                @forelse ($applications as $item)
                    <a href="{{ route('dashboard.payment.', $item->id) }}"
                        class="block max-w-sm  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-wedic-blue-800 dark:border-gray-700 dark:hover:bg-wedic-blue-700">
                        <div class="">
                            <img class="w-[100%] max-h-[250px] min-h-[250px]  object-cover"
                                src="https://via.placeholder.com/640x480.png/A41916?text={{ $item?->training?->title }}" />
                        </div>
                        <div class="p-6 flex flex-col gap-2">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                {{ $item?->training?->title }}</h5>
                            <div>
                                Application Date: {{ $item?->created_at?->format('Y-M-d ') ?? ' 2015-03-12' }}
                            </div>
                            <div class="capitalize">
                                Admission fee:
                                {{ $item->training?->pricing?->where('status', 'published')?->first()?->type }}

                            </div>
                            <div>
                                Status: <span
                                    class="dark:bg-yellow-900 dark:text-yellow-500 bg-yellow-100 text-yellow-900 px-2 uppercase rounded-lg py-1">
                                    {{  $item->application_status }}
                                </span>
                            </div>
                            <div class="mt-3">
                                <x-secondary-button>View Detials</x-secondary-button>
                            </div>
                        </div>

                    </a>
                @empty
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                        </svg>
                        <h1 class="">No recent application found</h1>
                    </div>
                @endforelse
            </div>


        </div>
    </div>
</div>
