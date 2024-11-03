<x-guest-layout>
    <!-- Hero Banner -->
    <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 py-24">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                    Research & Publications
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                    Discover our latest research findings, case studies, and policy papers
                </p>
            </div>
        </div>
    </div>

    <div class="bg-white shadow-sm sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-4 overflow-x-auto py-4">
                @foreach ($categories as $key => $category)
                    <a href="{{ route('news.category', $category->id) }}" class="px-4 py-2  rounded-lg whitespace-nowrap text-gray-600 hover:text-blue-600    ">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Featured Article -->
    <div class="container max-w-6xl mx-auto px-4 py-16">
        <!-- Recent Articles Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 ">
            @forelse ($blogs as $blog)
              @include('includes.news.card')
            @empty
                <div class="col-span-3 text-center py-12">
                    <p class="text-black-400 text-lg">No more articles found.</p>
                </div>
            @endforelse
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
    <div class="bg-white py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl p-12 relative overflow-hidden">
                <div class="relative z-10 text-center">
                    <h2 class="text-3xl font-bold text-white mb-6">Stay Updated</h2>
                    <p class="text-gray-200 mb-8 max-w-2xl mx-auto">
                        Subscribe to our newsletter to receive the latest research papers and publications
                    </p>
                    <form class="flex flex-col sm:flex-row gap-4 justify-center max-w-lg mx-auto">
                        <input type="email" placeholder="Enter your email" class="px-6 py-3 rounded-lg flex-grow">
                        <button
                            class="px-8 py-3 bg-white text-blue-600 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
