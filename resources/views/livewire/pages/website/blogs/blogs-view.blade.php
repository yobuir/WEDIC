<div class="relative  px-6   pb-20 lg:px-8  lg:pb-28">
    <div class="mx-auto mt-12 grid max-w-lg gap-5 lg:max-w-none lg:grid-cols-4">
        @forelse ($blogs as $item)
            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                <a href="{{ route('blog.view', ['slug' => $item->slug, 'id' => $item->id]) }}" class="flex-shrink-0">
                    <img class="h-48 w-full object-cover" src="{{ $item->featured_image }}" alt="{{ $item->title }}">
                </a>

                <div class="flex flex-1 flex-col justify-between bg-white p-6">
                    <div class="flex-1">
                        <a href="{{ route('blog.view', ['slug' => $item->slug, 'id' => $item->id]) }}"
                            class="mt-2 block">
                            <h2 class="text-sm font-semibold hover:underline text-gray-900">{{ $item->title }}</h2>
                        </a>
                    </div>

                    <div class="mt-3 flex items-center">
                        <a href="{{ route('blog.view', ['slug' => $item->slug, 'id' => $item->id]) }}" class="ml-1">
                            <div class="text-xs font-medium text-gray-900">
                                Created On. {{ $item->created_at?->format('Y-M-d') }}
                            </div>

                            <div class="text-xs font-medium text-gray-900">
                                Created By. {{ $item?->createdBy?->name }}
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center text-gray-500">No blog posts available yet</div>
        @endforelse
    </div>
</div>
