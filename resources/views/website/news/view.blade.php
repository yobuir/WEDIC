<x-guest-layout>
    <!-- Enhanced Hero Section -->
    <div class="relative min-h-[60vh] flex items-center overflow-hidden">
        <!-- Animated gradient background -->
        <div class="absolute inset-0 bg-gradient-to-br from-blue-600 via-purple-600 to-indigo-600 animate-gradient"></div>

        <!-- Pattern overlay -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-pattern opacity-20"></div>
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        </div>

        <!-- Floating elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500/30 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
            <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-purple-500/30 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24">
            <div class="flex flex-col items-center text-center space-y-8">
                <!-- Meta information -->
                <div class="flex items-center gap-4 animate-fade-in-down">
                    <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-pink-500/20 text-pink-300 backdrop-blur-sm">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $blog?->created_at?->format('M d, Y') }}
                    </span>
                    <span class="w-2 h-2 rounded-full bg-pink-400 animate-pulse"></span>
                    <a wire:navigate
                       href="{{ route('news.category', $blog?->category?->id) }}"
                       class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-pink-500/20 text-pink-300 backdrop-blur-sm hover:bg-pink-500/30 transition-all duration-300">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                        </svg>
                        {{ $blog?->category?->name }}
                    </a>
                </div>

                <!-- Title -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white max-w-4xl leading-tight animate-fade-in">
                    {{ $blog?->title }}
                </h1>

                <p class="text-xl text-gray-300 max-w-3xl animate-fade-in-up">
                    Discover our latest research findings, case studies, and policy papers
                </p>
            </div>
        </div>
    </div>

    <!-- Main Content Section -->
    <div class="relative -mt-40 z-10">
        <div class="container max-w-6xl mx-auto px-4">
            <!-- Featured Image -->
            <div class="relative rounded-3xl overflow-hidden shadow-2xl group">
                <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black/20"></div>
                <img
                    src="{{ $blog?->featured_image }}"
                    alt="{{ $blog?->title }}"
                    class="w-full h-[600px] object-cover mt-6 transform transition-transform duration-700 group-hover:scale-105"
                />
            </div>

            <!-- Article Content -->
            <div class="max-w-4xl mx-auto mt-16">
                <div class="bg-white rounded-3xl shadow-xl p-8 md:p-16">
                    <!-- Article Header -->
                    <div class="relative mb-12 animate-fade-in-up">
                        <div class="absolute top-0 left-0 w-1 h-full bg-gradient-to-b from-pink-500 to-orange-500 rounded-full"></div>
                        <p class="text-2xl text-gray-800 font-medium leading-relaxed pl-8">
                            {{ $blog?->header }}
                        </p>
                    </div>

                    <!-- Main Content -->
                    <div class="prose prose-lg max-w-none">
                        <div class="text-gray-700
                            prose-headings:text-gray-900
                            prose-headings:font-bold
                            prose-h1:text-3xl
                            prose-h2:text-2xl
                            prose-h3:text-xl
                            prose-a:text-pink-600
                            prose-a:no-underline
                            hover:prose-a:text-pink-700
                            prose-strong:text-gray-900
                            prose-blockquote:border-l-4
                            prose-blockquote:border-pink-500
                            prose-blockquote:bg-pink-50/50
                            prose-blockquote:rounded-r-xl
                            prose-blockquote:pl-6
                            prose-blockquote:py-2
                            prose-blockquote:italic
                            prose-img:rounded-2xl
                            prose-img:shadow-lg
                            prose-img:transition-transform
                            hover:prose-img:scale-105
                            prose-code:text-pink-600
                            prose-code:bg-pink-50
                            prose-code:rounded-md
                            prose-code:px-2
                            prose-code:py-0.5">
                            {!! $blog?->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Categories Section -->
    <div class="bg-gradient-to-b from-gray-50 to-white py-32">
        <div class="container max-w-6xl mx-auto px-4">
            <div class="text-center space-y-4 mb-16">
                <h2 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Explore Categories
                </h2>
                <p class="text-gray-600 text-lg">
                    Discover more content that interests you
                </p>
            </div>

            <div class="flex flex-wrap gap-4 items-center justify-center">
                @foreach($categories as $category)
                    <a wire:navigate
                       href="{{ route('news.category', $category->id) }}"
                       class="group relative px-8 py-3 rounded-full border-2 border-pink-200 font-medium text-gray-700
                              hover:border-pink-500 transform hover:-translate-y-1 transition-all duration-300">
                        <span class="relative z-10">{{ $category->name }}</span>
                        <div class="absolute inset-0 rounded-full bg-gradient-to-r from-pink-500 to-orange-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <span class="absolute inset-0 rounded-full bg-white group-hover:bg-opacity-0 transition-all duration-300"></span>
                        <span class="absolute inset-0 rounded-full border-2 border-transparent group-hover:border-pink-500 transition-all duration-300"></span>
                    </a>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Enhanced Related Posts Section -->
    <div class="py-32 bg-white">
        <div class="container max-w-6xl mx-auto px-4">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-16 flex items-center gap-3">
                <span class="w-8 h-1 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full"></span>
                Related Articles
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($Related_posts as $blog)
                    @include('includes.news.card')
                @empty
                    <div class="col-span-full text-center py-12 text-gray-500">
                        No related articles found
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    <!-- Add these styles -->
    <style>
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes blob {
            0% { transform: translate(0px, 0px) scale(1); }
            33% { transform: translate(30px, -50px) scale(1.1); }
            66% { transform: translate(-20px, 20px) scale(0.9); }
            100% { transform: translate(0px, 0px) scale(1); }
        }

        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-down {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fade-in-up {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animate-fade-in {
            animation: fade-in 0.6s ease-out forwards;
        }

        .animate-fade-in-down {
            animation: fade-in-down 0.6s ease-out forwards;
        }

        .animate-fade-in-up {
            animation: fade-in-up 0.6s ease-out forwards;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23fff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</x-guest-layout>
