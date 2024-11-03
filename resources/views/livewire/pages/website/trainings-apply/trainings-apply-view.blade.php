<div class="relative bg-gray-50  ">
    <div class="mx-auto mt-12 grid gap-5 lg:grid-cols-1 max-w-lg lg:max-w-full">
        @if ($item)
            <div class="flex flex-col gap-2">
                <div class="text-xs font-medium text-gray-900">
                    Created On. {{ $item->created_at?->format('Y-M-d') }}
                </div>
                <div class="text-xs font-medium text-gray-900">
                    Applicants. {{ $item?->applicants?->count() }}
                </div>
                <div class="text-xs font-medium text-gray-900">
                    <span
                        class="bg-green-100 text-green-800 text-xs font-semibold capitalize mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900">
                        {{ $item?->availability }}
                    </span>
                </div>
            </div>
            <div class="flex flex-col lg:flex-row ">
                <div class="flex flex-1 flex-col justify-between  p-6">
                    <div class="flex-1">
                        <label class="mt-2 block">
                            <p class="mt-3 text-base font-bold text-gray-900">{{ $item->title }}</p>
                            <div class="mt-3  prose">{!! $item->content !!}</div>
                        </label>
                    </div>
                    <div class="mt-4">
                        @if ($item->type == 'internal')
                            <a href="{{ route('trainings.apply', ['id'=>$item->id, 'slug'=>$item->slug]) }}" target="__blank"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Apply now
                            </a>
                        @else
                            <a href="{{ $item->link }}" target="__blank"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Apply now
                            </a>
                        @endif

                    </div>
                </div>
            </div>
        @else
            <div class="col-span-3">No training found</div>
        @endif
    </div>
</div>
