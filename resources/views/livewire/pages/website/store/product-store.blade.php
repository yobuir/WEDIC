 <div class="min-h-screen ">
     <div class="relative overflow-hidden  to-white py-12">
         <div class="absolute inset-0">
             <div class="absolute inset-0 bg-gradient-to-br from-wedic-blue-500/10 to-transparent"></div>
             <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-50 to-transparent"></div>
         </div>
         <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 lg:py-20">
             <div class="lg:grid lg:grid-cols-2 gap-12 items-center hidden">
                 <!-- Hero Content -->
                 <div class="space-y-8">
                     <div class="space-y-4">
                         <span
                             class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-wedic-blue-100 text-wedic-blue-800">
                             🌟 Welcome to Our Store
                         </span>
                         <h1 class="text-4xl lg:text-5xl font-bold text-gray-900">
                             Discover Our products !
                         </h1>
                     </div>
                     <!-- Stats -->
                     <div class="grid grid-cols-3 gap-6">
                         <div class="text-center">
                             <div class="text-3xl font-bold text-wedic-blue-600">{{ $productsAvailableCount }}+
                             </div>
                             <div class="text-sm text-gray-600">Available Products</div>
                         </div>
                         <div class="text-center">
                             <div class="text-3xl font-bold text-wedic-blue-600">{{ $productsSoldCount }}+</div>
                             <div class="text-sm text-gray-600">Sold Products</div>

                         </div>
                         <div class="text-center">
                             <div class="text-3xl font-bold text-wedic-blue-600">{{ $categoriesCount }}+</div>
                             <div class="text-sm text-gray-600">Categories</div>
                         </div>
                     </div>
                 </div>
             </div>
             <div
                 class="mb-8 lg:absolute w-full lg:-bottom-20 bg-white rounded-2xl border p-6 transform transition-all duration-300 ">
                 <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                     <!-- Search Input -->
                     <div class="relative group">
                         <div class="absolute inset-y-0 left-3 flex items-center pointer-events-none">
                             <svg class="h-5 w-5 text-gray-400 group-focus-within:text-wedic-blue-500 transition-colors duration-200"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                     clip-rule="evenodd" />
                             </svg>
                         </div>
                         <input wire:model.live.debounce.300ms="search" type="text" placeholder="Search products..."
                             class="w-full pl-10 pr-4 py-3 rounded-xl border-2 border-gray-200 focus:border-wedic-blue-500 focus:ring-0 transition-all duration-200">
                     </div>

                     <!-- Category Filter -->
                     <div class="relative group">
                         <select wire:model.live="category"
                             class="w-full py-3 px-4 rounded-xl border-2 border-gray-200 focus:border-wedic-blue-500 focus:ring-0 appearance-none bg-white transition-all duration-200">
                             <option value="">All Categories</option>
                             @forelse ($categories as $item)
                                 <option value="{{ $item->id }}">{{ $item->name }}</option>
                             @empty
                             @endforelse
                         </select>
                         <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                             <svg class="h-5 w-5 text-gray-400 group-focus-within:text-wedic-blue-500 transition-colors duration-200"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                     clip-rule="evenodd" />
                             </svg>
                         </div>
                     </div>

                     <!-- Sort Options -->
                     <div class="relative group">
                         <select wire:model.live="sorting"
                             class="w-full py-3 px-4 rounded-xl border-2 border-gray-200 focus:border-wedic-blue-500 focus:ring-0 appearance-none bg-white transition-all duration-200">
                             <option value="name">Name</option>
                             <option value="price">Price</option>
                             <option value="created_at">Newest</option>
                         </select>
                         <div class="absolute inset-y-0 right-3 flex items-center pointer-events-none">
                             <svg class="h-5 w-5 text-gray-400 group-focus-within:text-wedic-blue-500 transition-colors duration-200"
                                 xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                 <path fill-rule="evenodd"
                                     d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                     clip-rule="evenodd" />
                             </svg>
                         </div>
                     </div>
                 </div>
             </div>

         </div>
     </div>
     <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-transparent">
         <!-- Products Grid with Animation -->
         <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
             @forelse ($products as $index => $product)
                 <div class="bg-white rounded-2xl shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-xl hover:-translate-y-1 cursor-pointer"
                     wire:click="showProductDetails({{ $product->id }})"
                     style="animation: fadeIn 0.5s ease-out {{ $index * 0.1 }}s both;">
                     <div class="relative aspect-w-3 aspect-h-2 group">
                         <img src="{{ $product->featured_image ?? $product->images->first()?->image_url }}"
                             alt="{{ $product->name }}"
                             class="object-cover w-full h-48 transform transition-transform duration-500 group-hover:scale-110">
                         <div
                             class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-300 flex items-center justify-center">
                             <span
                                 class="text-white text-lg font-semibold translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                                 View details
                             </span>
                         </div>
                         <span
                             class="absolute top-4 right-4 bg-wedic-blue-500/90 backdrop-blur-sm text-white px-4 py-1.5 rounded-full text-sm font-medium transform -translate-y-2 opacity-0 group-hover:translate-y-0 group-hover:opacity-100 transition-all duration-300">
                             {{ $product?->category?->name }}
                         </span>
                     </div>
                     <div class="p-6">
                         <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ $product->name }}</h3>
                         <div class="text-sm text-gray-500 mb-4">
                             Available: <span class="font-medium">{{ $product->quantity }}
                                 {{ $product->measurement_unit }}</span>
                         </div>
                         <div class="flex items-center justify-between">
                             <span
                                 class="text-xl font-bold bg-gradient-to-r from-wedic-blue-600 to-wedic-blue-500 bg-clip-text text-transparent">
                                 {{ $product->formatted_price }}
                             </span>
                         </div>
                     </div>
                 </div>
             @empty
                 <div class="col-span-full flex flex-col items-center justify-center py-16">
                     <svg class="w-16 h-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                     </svg>
                     <p class="text-xl text-gray-500 font-medium">No products found</p>
                 </div>
             @endforelse
         </div>

         <!-- Enhanced Modal -->
         <div x-data="{ open: false }" x-show="open" x-on:open-modal.window="open = true"
             x-on:keydown.escape.window="open = false" class="fixed inset-0 z-50 overflow-hidden"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 transform translate-x-full"
             x-transition:enter-end="opacity-100 transform translate-x-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 transform translate-x-0"
             x-transition:leave-end="opacity-0 transform translate-x-full" style="display: none;">
             <div class="flex items-center justify-center min-h-screen">
                 <div class="fixed inset-0  backdrop-blur-sm"
                     x-transition:enter="transition-opacity ease-out duration-300"
                     x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                     x-transition:leave="transition-opacity ease-in duration-200"
                     x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" @click="open = false">
                 </div>

                 <div
                     class="fixed right-0 bg-white rounded-l-2xl shadow-2xl max-w-4xl w-full overflow-y-auto h-screen">
                     @if ($selectedProduct)
                         <div class="sticky top-0 z-50 bg-white/80 backdrop-blur-sm p-6 border-b">
                             <div class="flex flex-col gap-3">
                                 <h2
                                     class="text-3xl font-bold bg-gradient-to-r from-wedic-blue-600 to-wedic-blue-500 bg-clip-text text-transparent">
                                     {{ $selectedProduct->name }}
                                 </h2>
                                 <div class="flex">
                                     <span
                                         class="bg-wedic-blue-500/20 text-wedic-blue-500 px-4 py-1.5 rounded-full font-medium">
                                         {{ $selectedProduct?->category?->name }}
                                     </span>
                                 </div>
                             </div>

                             <button @click="open = false"
                                 class="absolute top-6 right-6 bg-wedic-blue-500 text-white p-2 rounded-full hover:bg-wedic-blue-600 transform hover:scale-110 transition-all duration-200">
                                 <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                         d="M6 18L18 6M6 6l12 12" />
                                 </svg>
                             </button>
                         </div>

                         <div class="p-6">
                             <!-- Product Content -->
                             <div class="prose max-w-none mb-8">
                                 <p class="text-gray-600">{!! $selectedProduct->description !!}</p>
                             </div>
                             @if (count($selectedProduct?->images) > 0)
                                 <!-- Image Gallery -->
                                 <div class="relative aspect-w-16 aspect-h-9 rounded-2xl overflow-hidden">
                                
                                     @if ($selectedProduct?->images)
                                         <img src="{{ $selectedProduct?->images[$currentImageIndex]?->image_url }}"
                                             alt="{{ $selectedProduct?->name }}"
                                             class="object-fill w-full h-full transform transition-transform duration-500 hover:scale-105">
                                     @endif

                                     <!-- Navigation Arrows -->
                                     <button wire:click="previousImage"
                                         class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black/75 transform hover:scale-110 transition-all duration-200">
                                         <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 d="M15 19l-7-7 7-7" />
                                         </svg>
                                     </button>
                                     <button wire:click="nextImage"
                                         class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/50 text-white p-3 rounded-full hover:bg-black/75 transform hover:scale-110 transition-all duration-200">
                                         <svg class="h-6 w-6" fill="none" stroke="currentColor"
                                             viewBox="0 0 24 24">
                                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                 d="M9 5l7 7-7 7" />
                                         </svg>
                                     </button>
                                 </div>

                                 <!-- Thumbnails -->
                                 <div class="mt-6 flex space-x-3 overflow-x-auto pb-2">
                                     @foreach ($selectedProduct?->images as $index => $image)
                                         <button wire:click="$set('currentImageIndex', {{ $index }})"
                                             class="flex-shrink-0 w-24 h-24 rounded-lg overflow-hidden transition-all duration-200 {{ $currentImageIndex === $index ? 'ring-2 ring-wedic-blue-500 ring-offset-2' : 'opacity-60 hover:opacity-100' }}">
                                             <img src="{{ $image?->image_url }}" alt="{{ $selectedProduct?->name }}"
                                                 class="w-full h-full object-cover">
                                         </button>
                                     @endforeach
                                 </div>
                             @endif
                             <!-- Product Details -->
                             <div class="mt-8 space-y-4">
                                 <div class="grid grid-cols-2 gap-4">
                                     <div class="bg-gray-50 p-4 rounded-xl">
                                         <div class="text-sm text-gray-500">Price</div>
                                         <div class="text-lg font-semibold text-wedic-blue-600">
                                             {{ $selectedProduct->formatted_price }}</div>
                                     </div>
                                     <div class="bg-gray-50 p-4 rounded-xl">
                                         <div class="text-sm text-gray-500">Category</div>
                                         <div class="text-lg font-semibold text-gray-900">
                                             {{ $selectedProduct->category->name }}</div>
                                     </div>
                                     <div class="bg-gray-50 p-4 rounded-xl">
                                         <div class="text-sm text-gray-500">Available Quantity</div>
                                         <div class="text-lg font-semibold text-gray-900">
                                             {{ $selectedProduct->quantity }} {{ $selectedProduct->measurement_unit }}
                                         </div>
                                     </div>
                                     <div class="bg-gray-50 p-4 rounded-xl">
                                         <div class="text-sm text-gray-500">Status</div>
                                         <div class="text-lg font-semibold">
                                             <span
                                                 class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                {{ $selectedProduct->status === 'active' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                 {{ ucfirst($selectedProduct->status) }}
                                             </span>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="bg-gray-50 p-4 rounded-xl space-y-2">
                                     <div class="text-sm text-gray-500">Timeline</div>
                                     <div class="flex items-center space-x-4">
                                         <div class="flex-1">
                                             <div class="text-sm text-gray-500">Created</div>
                                             <div class="text-gray-900">
                                                 {{ $selectedProduct->created_at->format('M d, Y') }}</div>
                                         </div>
                                         <div class="flex-1">
                                             <div class="text-sm text-gray-500">Last Updated</div>
                                             <div class="text-gray-900">
                                                 {{ $selectedProduct->updated_at->format('M d, Y') }}</div>
                                         </div>
                                     </div>
                                 </div>
                             </div>

                             @php

                                 $message = urlencode(
                                     "New Product Inquiry\n\n" .
                                         "Product Details:\n" .
                                         "Name: {$selectedProduct->name}\n" .
                                         "Price: {$selectedProduct->formatted_price}\n" .
                                         "Category: {$selectedProduct->category->name}\n" .
                                         "Available: {$selectedProduct->quantity} {$selectedProduct->measurement_unit}\n\n" .
                                         "I would like to know more about this product.\n" .
                                         "Reference: #{$selectedProduct->id}",
                                 );

                                 // Replace with your actual WhatsApp number (include country code without '+')
                                 $whatsappNumber = '250722999305'; // Example: Kenya number

                                 // Create WhatsApp link
                                 $whatsappLink = "https://wa.me/{$whatsappNumber}?text={$message}";
                             @endphp
                             <a href="{{ $whatsappLink }}" target="_blank"
                                 class="fixed bottom-6 right-6 z-50 group flex items-center gap-2 px-8 py-4 bg-wedic-blue-500 text-white rounded-xl hover:bg-wedic-blue-600 transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                                 <!-- WhatsApp Icon -->
                                 <svg xmlns="http://www.w3.org/2000/svg"
                                     class="w-5 h-5 transform transition-transform group-hover:scale-110 duration-300"
                                     fill="currentColor" viewBox="0 0 24 24">
                                     <path
                                         d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z" />
                                 </svg>

                                 <!-- Text -->
                                 <span class="font-medium">Purchase via WhatsApp</span>

                                 <!-- Hover effect overlay -->
                                 <div
                                     class="absolute inset-0 rounded-xl bg-white opacity-0 group-hover:opacity-20 transition-opacity duration-300">
                                 </div>
                             </a>
                         </div>
                     @endif
                 </div>
             </div>
         </div>

         <!-- Enhanced Pagination -->
         <div class="mt-12">
             {{ $products->links() }}
         </div>
     </div>
 </div>
