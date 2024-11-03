<x-guest-layout>
    @if ($category) 
        <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 py-24">
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                        {{ $category?->name }}
                    </h1>
                    <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                        {{ $category->description }}
                    </p>
                </div>
            </div>
        </div>
        <!-- Articles Grid -->
        <div class="bg-black-50 py-24">
            <div class="container max-w-6xl mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($blogs as $blog)
                        @include('includes.news.card')
                    @empty
                        <div class="col-span-3 text-center py-12">
                            <p class="text-black-400 text-lg">No articles found in this category.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- Other Categories Section -->
        <div class="bg-white py-24">
            <div class="container max-w-6xl mx-auto px-4">
                <div class="text-center max-w-3xl mx-auto mb-12">
                    <div class="inline-block mb-4 px-4 py-2 bg-wedic-blue-100 rounded-full">
                        <span class="text-wedic-blue-500 font-semibold">Explore More</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-black-500 mb-4">Browse Other Categories</h2>
                    <p class="text-black-400">Discover more content across different topics</p>
                </div>

                <div class="flex flex-wrap gap-4 items-center justify-center">
                    @forelse ($categories as $cat)
                        <a wire:navigate href="{{ route('news.category', $cat->id) }}"
                            class="relative group overflow-hidden">
                            <div
                                class="rounded-full border-2 py-3 px-6 font-medium
                            {{ $cat->id === $category->id
                                ? 'bg-wedic-blue-500 text-black-500 border-wedic-blue-500'
                                : 'text-black-500 border-wedic-blue-200 hover:bg-wedic-blue-500 hover:text-black-500 hover:border-wedic-blue-500' }}
                            transition-all duration-300">
                                {{ $cat?->name }}
                            </div>
                        </a>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>

        <style>
            @keyframes patternMove {
                0% {
                    background-position: 0 0;
                }

                100% {
                    background-position: 40px 40px;
                }
            }
        </style>
    @endif
</x-guest-layout>
