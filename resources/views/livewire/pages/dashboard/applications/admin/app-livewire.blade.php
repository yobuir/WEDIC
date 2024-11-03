<div class="mb-12 p-4">
    <div class="mb-3">
        <h3>Recent active recruiting trainings</h3>
    </div>
    <div class="">
        <x-input type="text" wire:model.live.debounce.300ms="search" placeholder="Search..." class="w-full" />
    </div>
    <div class="grid lg:grid-cols-1 grid-cols-1 mt-3">
        @forelse ($trainings as $item)
            <a href="{{ route('dashboard.training.applicants.view', $item->id) }}"
                class="relative flex flex-col mt-6  bg-clip-border  text-gray-900 dark:text-white w-full  bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-wedic-blue-800 dark:border-gray-700 dark:hover:bg-wedic-blue-800">
                <div class="p-6">
                    <h5 class="block mb-2 font-sans text-sm  font-semibold  dark:text-blue-400 text-blue-600">
                        {{ $item->title }}
                    </h5>
                    <p class="block font-sans text-sm  font-light  text-inherit">
                        {{ $item?->applicants?->count() }} Applicants
                    </p>
                    <p class="block font-sans text-sm font-light  text-inherit">
                        Created: {{ $item->created_at?->format('Y-M-d ') }}
                    </p>
                    <p class="block font-sans text-sm font-light  text-inherit">
                        Pricing: {{ $item->pricing?->where('status', 'published')->first()?->type }}
                    </p>
                </div>
                <div class="p-6 pt-0">
                    <x-secondary-button>View Detials</x-secondary-button>
                </div>
            </a>
        @empty

        Nothing to show
        @endforelse
    </div>
</div>
