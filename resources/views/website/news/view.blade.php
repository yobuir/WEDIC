<x-guest-layout>


    <!-- Hero Banner -->
    <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 py-24">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-center gap-4 mb-8">
                <span class="px-4 py-1 bg-yellow-500/10 rounded-full text-yellow-500 font-medium">
                    {{ $blog?->created_at?->format('M d, Y') }}
                </span>
                <span class="w-1.5 h-1.5 rounded-full bg-yellow-500"></span>
                <a wire:navigate href="{{ route('news.category', $blog?->category?->id) }}"
                    class="px-4 py-1 bg-yellow-500/10 rounded-full text-yellow-500 font-medium hover:bg-yellow-500/20 transition-colors">
                    {{ $blog?->category?->name }}
                </a>
            </div>
            <div class="text-center">

                <h1 class="font-bold text-4xl md:text-5xl lg:text-6xl text-white mb-12 leading-tight"
                    style="opacity: 0; animation: fadeUp 1s ease-out forwards;">
                    {{ $blog?->title }}
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                    Discover our latest research findings, case studies, and policy papers
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content with Enhanced Design -->
    <div class="relative -mt-40 container max-w-6xl mx-auto px-4">
        <!-- Featured Image with Enhanced Shadow -->
        <div class="rounded-3xl overflow-hidden shadow-2xl mb-16 ring-1 ring-black/5">
            <img src="{{ $blog?->featured_image }}" alt="{{ $blog?->title }}"
                class="w-full h-[600px] object-cover transform hover:scale-105 transition-transform duration-700" />
        </div>

        <!-- Article Content with Enhanced Typography -->
        <div class="max-w-4xl mx-auto">
            <div class="bg-white rounded-3xl shadow-xl p-8 md:p-16 ring-1 ring-black/5">
                <!-- Article Header -->
                <p class="text-2xl text-gray-800 font-medium mb-12 leading-relaxed border-l-4 border-yellow-500 pl-6">
                    {{ $blog?->header }}
                </p>

                <!-- Main Content -->
                <div class="prose prose-lg max-w-none">
                    <div
                        class="text-gray-700 prose-headings:text-gray-900 prose-a:text-yellow-600 prose-a:no-underline hover:prose-a:text-yellow-700
                        prose-strong:text-gray-900 prose-blockquote:border-yellow-500 prose-blockquote:bg-yellow-50 prose-blockquote:py-1
                        prose-img:rounded-xl prose-img:shadow-lg">
                        {!! $blog?->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Categories Section with Enhanced Design -->
    <div class="bg-gray-50 py-32 mt-24">
        <div class="container max-w-6xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Explore Categories</h2>
                <p class="text-gray-600 text-lg">Discover more content that interests you</p>
            </div>
            <div class="flex flex-wrap gap-4 items-center justify-center">
                @forelse ($categories as $category)
                    <a wire:navigate href="{{ route('news.category', $category->id) }}"
                        class="rounded-full border-2 py-3 px-8 font-medium text-gray-700 border-yellow-200
                        hover:bg-yellow-500 hover:border-yellow-500 hover:text-white transform hover:-translate-y-1
                        transition-all duration-300 shadow-sm hover:shadow-md">
                        {{ $category?->name }}
                    </a>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <!-- Related Posts with Enhanced Cards -->
    <div class="py-32 bg-white">
        <div class="container max-w-6xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-16">Related Articles</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($Related_posts as $blog)
                    @include('includes.news.card')

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

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .prose blockquote {
            border-radius: 0.5rem;
            margin: 2rem 0;
            padding: 1.5rem 2rem;
        }

        .prose img {
            border-radius: 1rem;
            margin: 2rem 0;
        }
    </style>
</x-guest-layout>
