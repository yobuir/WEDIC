<!-- resources/views/livewire/store.blade.php -->
<div class="min-h-screen bg-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Search and Filter Section (unchanged) -->
        <div class="mb-8 bg-white rounded-lg shadow p-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Search Input -->
                <div>
                    <input wire:model.debounce.300ms="search" type="text" placeholder="Search products..."
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                </div>
                <!-- Category Filter -->
                <div>
                    <select wire:model="category"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="">All Categories</option>
                        @forelse ($categories as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <!-- Sort Options -->
                <div>
                    <select wire:model="sorting"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        <option value="name">Name</option>
                        <option value="price">Price</option>
                        <option value="created_at">Newest</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Products Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse ($products as $product)
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="relative aspect-w-3 aspect-h-2 group cursor-pointer"
                        wire:click="showProductDetails({{ $product->id }})">
                        <img src="{{ $product->primaryImage?->image_url ?? $product->images->first()?->image_url }}"
                            alt="{{ $product->name }}"
                            class="object-cover w-full h-48 group-hover:opacity-75 transition">
                        <div
                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 transition-opacity flex items-center justify-center">
                            <span class="text-white opacity-0 group-hover:opacity-100 transition-opacity">
                                View Gallery
                            </span>
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $product->name }}</h3>
                        <p class="mt-1 text-sm text-gray-500">{{ Str::limit($product->description, 100) }}</p>
                        <div class="mt-4 flex items-center justify-between">
                            <span
                                class="text-lg font-bold text-indigo-600">${{ number_format($product->price, 2) }}</span>
                            <button
                                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">No products found.</p>
                </div>
            @endforelse
        </div>

        <!-- Image Gallery Modal -->
        <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="open = true"
            x-on:keydown.escape.window="open = false" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 overflow-y-auto" style="display: none;">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-black opacity-50"></div>

                <div class="relative bg-white rounded-lg max-w-3xl w-full">
                    <button @click="open = false" class="absolute top-4 right-4 text-gray-500 hover:text-gray-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    @if ($selectedProduct)
                        <div class="p-6">
                            <div class="relative aspect-w-16 aspect-h-9">
                                <img src="{{ $selectedProduct->images[$currentImageIndex]->image_url }}"
                                    alt="{{ $selectedProduct->name }}" class="object-contain w-full h-full">
                                <!-- Navigation Arrows -->
                                <button wire:click="previousImage"
                                    class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button wire:click="nextImage"
                                    class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black bg-opacity-50 text-white p-2 rounded-full hover:bg-opacity-75">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Thumbnail Navigation -->
                            <div class="mt-4 flex space-x-2 overflow-x-auto">
                                @foreach ($selectedProduct->images as $index => $image)
                                    <button wire:click="$set('currentImageIndex', {{ $index }})"
                                        class="flex-shrink-0 w-20 h-20 rounded-md overflow-hidden {{ $currentImageIndex === $index ? 'ring-2 ring-indigo-500' : '' }}">
                                        <img src="{{ $image->image_url }}" alt="{{ $selectedProduct->name }}"
                                            class="w-full h-full object-cover">
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="mt-8">
            {{ $products->links() }}
        </div>
    </div>
</div>
