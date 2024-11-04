<x-guest-layout>
    <!-- Enhanced Hero Section with Parallax -->
    <div class="relative min-h-[80vh] flex items-center justify-center overflow-hidden">
        <!-- Animated background gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 animate-gradient"></div>
        
        <!-- Overlay pattern -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-pattern opacity-20"></div>
            <div class="absolute inset-0 bg-black/50 backdrop-blur-sm"></div>
        </div>

        <!-- Floating shapes -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-blue-500/30 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
            <div class="absolute top-1/3 right-1/4 w-64 h-64 bg-purple-500/30 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
            <div class="absolute bottom-1/4 left-1/2 w-64 h-64 bg-pink-500/30 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <div class="space-y-8">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-white/10 text-white backdrop-blur-sm">
                    Welcome to {{ config('app.name') }}
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-7xl animate-fade-in">
                    About <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-purple-200">Us</span>
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                    Empowering communities through inclusive excellence and sustainable development
                </p>
                <div class="mt-8">
                    <a href="#story" 
                       class="group inline-flex items-center justify-center px-6 py-3 text-white bg-white/10 backdrop-blur-sm rounded-full hover:bg-white/20 transition-all duration-300">
                        <span>Discover Our Story</span>
                        <svg class="w-5 h-5 ml-2 animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Story Section -->
    <div id="story" class="relative py-32 bg-white overflow-hidden scroll-mt-16">
        <!-- Decorative elements -->
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute right-0 top-0 w-1/3 h-1/3 bg-gradient-to-br from-blue-50 to-purple-50 rounded-full blur-3xl opacity-70 transform translate-x-1/2 -translate-y-1/2"></div>
            <div class="absolute left-0 bottom-0 w-1/3 h-1/3 bg-gradient-to-tr from-purple-50 to-pink-50 rounded-full blur-3xl opacity-70 transform -translate-x-1/2 translate-y-1/2"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-24">
                <span class="text-blue-600 font-medium">Our Journey</span>
                <h2 class="mt-2 text-4xl font-extrabold text-gray-900">Our Story</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="prose prose-lg prose-blue">
                    <p class="text-lg leading-relaxed text-gray-700">
                        Women Empowerment & Disability Inclusion Consultancy "{{ config('app.name') }}" is a Social Enterprise consulting firm and Projects manager, registered and domiciled in Rwanda.
                    </p>
                    <div class="my-8 p-6 bg-gradient-to-br from-blue-50 to-purple-50 rounded-2xl">
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">Our Specializations</h3>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Research & Surveys</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Monitoring & Evaluation</span>
                            </li>
                            <li class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Training & Capacity Development</span>
                            </li>
                        </ul>
                    </div>
                    <p class="text-lg leading-relaxed text-gray-700">
                        Our promoters and strategic leaders are highly qualified, experienced professionals with deep understanding of gender equality and disability rights and inclusion.
                    </p>
                </div>

                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-r from-blue-600 to-purple-600 rounded-2xl transform rotate-6 group-hover:rotate-4 transition-transform duration-300"></div>
                    <img
                        src="/api/placeholder/600/400"
                        alt="WEDIC Team"
                        class="relative rounded-2xl shadow-xl transform group-hover:-translate-y-2 transition-all duration-300"
                    >
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Vision & Mission Section -->
    <div class="bg-gradient-to-b from-white to-gray-50 py-32">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <!-- Vision Card -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-100 to-purple-100 rounded-2xl transform rotate-1 group-hover:rotate-2 transition-transform duration-300"></div>
                    <div class="relative bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300 overflow-hidden">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-blue-500/10 to-purple-500/10 rounded-full transform translate-x-20 -translate-y-20 group-hover:scale-150 transition-transform duration-500"></div>
                        <div class="relative">
                            <div class="flex items-center mb-8">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-blue-500/20 rounded-xl blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-500 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-all duration-300">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="ml-6 text-3xl font-bold text-gray-900">Our Vision</h3>
                            </div>
                            <p class="text-lg text-gray-600 leading-relaxed">
                                To be the most respected and leading assurance and advisory services provider in the Region.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Mission Card -->
                <div class="relative group">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-100 to-pink-100 rounded-2xl transform -rotate-1 group-hover:-rotate-2 transition-transform duration-300"></div>
                    <div class="relative bg-white rounded-2xl shadow-xl p-8 hover:shadow-2xl transition-all duration-300 overflow-hidden">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-gradient-to-br from-purple-500/10 to-pink-500/10 rounded-full transform translate-x-20 -translate-y-20 group-hover:scale-150 transition-transform duration-500"></div>
                        <div class="relative">
                            <div class="flex items-center mb-8">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-purple-500/20 rounded-xl blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                                    <div class="relative w-16 h-16 bg-gradient-to-br from-purple-500 to-pink-500 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-all duration-300">
                                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"/>
                                        </svg>
                                    </div>
                                </div>
                                <h3 class="ml-6 text-3xl font-bold text-gray-900">Our Mission</h3>
                            </div>
                            <p class="text-lg text-gray-600 leading-relaxed">
                                To provide high quality, innovative assurance and advisory services based on latest professional knowledge and ethical values.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Values Section -->
    <div class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-20">
                <span class="text-blue-600 font-medium">What Drives Us</span>
                <h2 class="mt-2 text-4xl font-bold text-gray-900">Our Values</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-blue-600 to-purple-600 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Value Cards -->
                @foreach([
                    ['title' => 'Excellence', 'icon' => 'star', 'color' => 'blue', 'description' => 'Striving for the highest quality in all our services and deliverables.'],
                    ['title' => 'Innovation', 'icon' => 'lightbulb', 'color' => 'purple', 'description' => 'Embracing creative solutions and cutting-edge approaches to challenges.'],
                    ['title' => 'Transparency', 'icon' => 'eye', 'color' => 'indigo', 'description' => 'Maintaining clear and honest communication in all our dealings.'],
                    ['title' => 'Passion', 'icon' => 'heart', 'color' => 'pink', 'description' => 'Bringing enthusiasm and dedication to every project we undertake.'],
                    ['title' => 'Inclusion', 'icon' => 'users', 'color' => 'green', 'description' => 'Ensuring accessibility and representation for all stakeholders.'],
                    ['title' => 'Accountability', 'icon' => 'check-circle', 'color' => 'yellow', 'description' => 'Taking responsibility for our actions and delivering on our promises.']
                ] as $index => $value)
                    <div class="group relative" style="animation: fadeInUp 0.5s ease-out {{ $index * 0.1 }}s both;">
                        <div class="absolute inset-0 bg-gradient-to-br from-{{ $value['color'] }}-50 to-{{ $value['color'] }}-100/20 rounded-2xl transform  rotate-1 group-hover:rotate-3 transition-transform duration-300"></div>
                        <div class="relative bg-white rounded-2xl shadow-lg p-8 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center mb-6">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-{{ $value['color'] }}-500/20 rounded-xl blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-{{ $value['color'] }}-500 to-{{ $value['color'] }}-600 rounded-xl flex items-center justify-center transform group-hover:scale-110 transition-all duration-300">
                                        <i class="fas fa-{{ $value['icon'] }} text-white text-xl"></i>
                                    </div>
                                </div>
                                <h3 class="ml-4 text-xl font-bold text-gray-900 group-hover:text-{{ $value['color'] }}-600 transition-colors duration-300">
                                    {{ $value['title'] }}
                                </h3>
                            </div>
                            <p class="text-gray-600 leading-relaxed">{{ $value['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Enhanced Purpose Section -->
    <div class="relative py-32 overflow-hidden">
        <!-- Animated background -->
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 animate-gradient"></div>
        
        <!-- Pattern overlay -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-pattern opacity-10"></div>
            <div class="absolute inset-0 bg-black/20 backdrop-blur-sm"></div>
        </div>

        <!-- Floating elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-white/10 rounded-full mix-blend-overlay filter blur-3xl animate-blob"></div>
            <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-white/10 rounded-full mix-blend-overlay filter blur-3xl animate-blob animation-delay-2000"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-white/10 text-white backdrop-blur-sm">
                    Why We Exist
                </span>
                <h2 class="mt-6 text-4xl font-bold text-white mb-8">Our Purpose</h2>
                <div class="max-w-3xl mx-auto bg-white/10 backdrop-blur-md rounded-2xl p-8 transform hover:scale-105 transition-all duration-300">
                    <p class="text-xl text-white leading-relaxed">
                        WEDI Consultancy aims to create inclusive businesses that empower women, youth, and girls with and without disabilities by purposefully integrating them into their value chains. We work to identify barriers and opportunities in addressing disability issues, focusing on progressive advancement in the coming years.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Call to Action -->
    @include('includes.callToAction.app')

    <!-- Add these styles to your CSS -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

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

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }

        .animate-blob {
            animation: blob 7s infinite;
        }

        .animation-delay-2000 {
            animation-delay: 2s;
        }

        .animation-delay-4000 {
            animation-delay: 4s;
        }

        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23fff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</x-guest-layout>