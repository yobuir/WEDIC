<div class="relative bg-gray-50 px-6 pb-20 lg:px-8  lg:pb-28">
    <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-4">
        @forelse ($trainings as $item)
            <a href="{{ route('training.apply', ['id' => $item->id, 'slug' => $item->slug]) }}"
                class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                <div class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src=" {{ $item->featured_image }}" alt="">
                </div>

                <div class="flex flex-1 flex-col justify-between bg-white p-6">
                    <div class="flex-1">
                        <div class="mt-2 block hover:underline">
                            <div class="text-sm font-semibold text-gray-900">{{ $item->title }}</div>
                        </div>
                    </div>
                    <div class="mt-3 flex items-center">
                        <div class="flex flex-col gap-2">
                            <div class="text-xs font-medium text-gray-900">
                                Created On. {{ $item->created_at?->format('Y-M-d') }}
                            </div>

                            <div class="text-xs font-medium text-gray-900">
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-semibold capitalize mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                                    {{ $item?->availability }}
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
            </a>
        @empty
            <div class="col-span-3">No team member added yet</div>
        @endforelse
    </div>
</div>
