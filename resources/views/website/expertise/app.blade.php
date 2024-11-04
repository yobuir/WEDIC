<x-guest-layout>
    <!-- Enhanced Hero Section -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 animate-gradient"></div>
        
        <!-- Animated background pattern -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-pattern opacity-20"></div>
            <div class="absolute inset-0 bg-black/40 backdrop-blur-[1px]"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
            <div class="text-center space-y-8">
                <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-white/10 text-white backdrop-blur-sm">
                    🎯 Our Specializations
                </span>
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                    Areas of 
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-purple-200">
                        Expertise
                    </span>
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                    Specialized knowledge and experience in key development areas
                </p>
            </div>
        </div>
 
    </div>

    <!-- Expertise Areas Grid -->
    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                @foreach($areas as $index => $area)
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500 overflow-hidden"
                         style="animation: fadeInUp 0.5s ease-out {{ $index * 0.1 }}s both;">
                        <div class="p-8">
                            <div class="flex items-center mb-6">
                                <div class="relative">
                                    <div class="absolute inset-0 bg-blue-500/20 rounded-2xl blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                                    <div class="relative w-14 h-14 bg-gradient-to-br from-blue-500 to-purple-500 rounded-2xl flex items-center justify-center text-white transform group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                        <i class="fas fa-{{ $area['icon'] }} text-2xl"></i>
                                    </div>
                                </div>
                                <h3 class="ml-4 text-xl font-bold text-gray-900 group-hover:text-blue-600 transition-colors duration-300">
                                    {{ $area['title'] }}
                                </h3>
                            </div>
                            <p class="text-gray-600 mb-8 leading-relaxed">{{ $area['description'] }}</p>
                            <ul class="space-y-4">
                                @foreach($area['key_points'] as $point)
                                    <li class="flex items-start space-x-3 group">
                                        <span class="flex-shrink-0 w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center transform group-hover:scale-110 transition-transform duration-300">
                                            <i class="fas fa-check text-sm text-blue-600"></i>
                                        </span>
                                        <span class="text-gray-600">{{ $point }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Enhanced Success Metrics -->
    <div class="relative bg-gray-50 py-24 overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute inset-0">
            <div class="absolute -right-32 top-0 w-96 h-96 rounded-full bg-blue-100 mix-blend-multiply blur-3xl opacity-70"></div>
            <div class="absolute -left-32 bottom-0 w-96 h-96 rounded-full bg-purple-100 mix-blend-multiply blur-3xl opacity-70"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-16">Our Impact</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach([
                    ['number' => '500+', 'label' => 'Projects Completed'],
                    ['number' => '1000+', 'label' => 'People Trained'],
                    ['number' => '50+', 'label' => 'Partner Organizations'],
                    ['number' => '25+', 'label' => 'Countries Reached']
                ] as $metric)
                    <div class="group relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-2xl transform group-hover:scale-105 transition-transform duration-300"></div>
                        <div class="relative">
                            <div class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-4">
                                {{ $metric['number'] }}
                            </div>
                            <div class="text-gray-600 font-medium">{{ $metric['label'] }}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Enhanced Methodology Section -->
    <div class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="text-blue-600 font-medium">Our Process</span>
                <h2 class="text-3xl font-bold mt-2 mb-4">Our Approach</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    We combine academic rigor with real-world experience to deliver practical solutions
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-12">
                @foreach([
                    [
                        'title' => 'Research-Based',
                        'icon' => 'microscope',
                        'description' => 'Thorough analysis and evidence-based solutions'
                    ],
                    [
                        'title' => 'Practical Implementation',
                        'icon' => 'cogs',
                        'description' => 'Real-world application of theoretical knowledge'
                    ],
                    [
                        'title' => 'Continuous Innovation',
                        'icon' => 'lightbulb',
                        'description' => 'Staying ahead with latest methodologies'
                    ]
                ] as $index => $approach)
                    <div class="relative group" style="animation: fadeInUp 0.5s ease-out {{ $index * 0.2 }}s both;">
                        <div class="absolute inset-0 bg-gradient-to-br from-blue-500/5 to-purple-500/5 rounded-2xl transform group-hover:scale-105 opacity-0 group-hover:opacity-100 transition-all duration-300"></div>
                        <div class="relative text-center p-8">
                            <div class="relative w-20 h-20 mx-auto mb-6">
                                <div class="absolute inset-0 bg-blue-500/20 rounded-full blur-xl group-hover:blur-2xl transition-all duration-300"></div>
                                <div class="relative w-full h-full bg-gradient-to-br from-blue-500 to-purple-500 rounded-full flex items-center justify-center transform group-hover:rotate-12 transition-all duration-300">
                                    <i class="fas fa-{{ $approach['icon'] }} text-3xl text-white"></i>
                                </div>
                            </div>
                            <h3 class="text-xl font-bold mb-4 text-gray-900">{{ $approach['title'] }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $approach['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Enhanced Call to Action -->
    <div class="relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 animate-gradient"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-center">
            <h2 class="text-3xl font-bold text-white mb-8">Ready to Work Together?</h2>
            <p class="text-xl text-gray-200 mb-12 max-w-2xl mx-auto">
                Let's discuss how our expertise can help address your organization's challenges
            </p>
            <a href="{{ route('contactUs') }}"
               class="group relative inline-flex items-center px-8 py-4 bg-white text-blue-600 rounded-xl font-semibold overflow-hidden">
                <span class="relative z-10">Get in Touch</span>
                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                </svg>
                <div class="absolute inset-0 bg-gray-100 transform -translate-x-full group-hover:translate-x-0 transition-transform duration-300"></div>
            </a>
        </div>
    </div>

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

        .animate-gradient {
            background-size: 200% 200%;
            animation: gradient 15s ease infinite;
        }

        .bg-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23fff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</x-guest-layout>