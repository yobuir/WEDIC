<div class="flex flex-col gap-6">
    <!-- Header -->
    <div class="flex justify-between items-center">
        <h2 class="text-xl font-semibold dark:text-white">Gallery Albums</h2>

    </div>

    <!-- Filters -->
    <div class="bg-white dark:bg-wedic-blue-800 rounded-lg shadow p-4">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1">
                <input type="text" wire:model.live="search" placeholder="Search albums..."
                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
            </div>
            <div class="w-full md:w-48">
                <select wire:model.live="status"
                    class="w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                    <option value="">All Status</option>
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Albums Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($albums as $album)
            <div class="bg-white dark:bg-wedic-blue-800 rounded-lg shadow overflow-hidden">
                <div class="aspect-w-16  aspect-h-9 max-h-[200px] min-h-[200px]">
                    @if ($album->cover_image)
                        <img src="{{ ($album->cover_image) }}" alt="{{ $album->name }}"
                            class="w-full h-[100%] object-cover">
                    @else
                        <div class="w-full h-[100%] bg-gray-200 dark:bg-wedic-blue-700 flex items-center justify-center">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    @endif
                </div>
                <div class="p-4">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-lg font-semibold dark:text-white truncate">{{ $album->name }}</h3>
                        <span
                            class="px-2 py-1 text-xs rounded-full {{ $album->status === 'published' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800' }}">
                            {{ ucfirst($album->status) }}
                        </span>
                    </div>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-4 line-clamp-2">
                        {{ $album->description ?? 'No description' }}
                    </p>
                    <div class="flex justify-between items-center">
                        <span class="text-sm text-gray-500 dark:text-gray-400">
                            {{ $album->images_count }} {{ Str::plural('image', $album->images_count) }}
                        </span>
                        <div class="flex gap-2">
                            <a href="{{ route('dashboard.albums.edit', $album->id) }}"
                                class="text-blue-600 hover:text-blue-800 dark:text-blue-400">
                                Edit
                            </a>
                            <button wire:click="deleteAlbum({{ $album->id }})"
                                wire:confirm="Are you sure you want to delete this album and all its images?"
                                class="text-red-600 hover:text-red-800 dark:text-red-400">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12 bg-white dark:bg-wedic-blue-800 rounded-lg">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No albums found</h3>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">Get started by creating a new album.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $albums->links() }}
    </div>
</div>
