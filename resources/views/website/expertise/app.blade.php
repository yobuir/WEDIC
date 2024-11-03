<x-guest-layout>
 {{-- resources/views/livewire/expertise.blade.php --}}
<div>
    {{-- Hero Section --}}
    <div class="relative bg-gradient-to-r from-blue-600 to-purple-600 py-24">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                    Areas of Expertise
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                    Specialized knowledge and experience in key development areas
                </p>
            </div>
        </div>
    </div>

    {{-- Expertise Areas Grid --}}
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-3">
                @foreach($areas as $area)
                    <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-6">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600">
                                <i class="fas fa-{{ $area['icon'] }} text-xl"></i>
                            </div>
                            <h3 class="ml-4 text-xl font-semibold text-gray-900">{{ $area['title'] }}</h3>
                        </div>
                        <p class="text-gray-600 mb-6">{{ $area['description'] }}</p>
                        <ul class="space-y-3">
                            @foreach($area['key_points'] as $point)
                                <li class="flex items-center text-gray-600">
                                    <i class="fas fa-check-circle text-green-500 mr-3"></i>
                                    {{ $point }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Success Metrics --}}
    <div class="bg-gray-50 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12">Our Impact</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                @foreach([
                    ['number' => '500+', 'label' => 'Projects Completed'],
                    ['number' => '1000+', 'label' => 'People Trained'],
                    ['number' => '50+', 'label' => 'Partner Organizations'],
                    ['number' => '25+', 'label' => 'Countries Reached']
                ] as $metric)
                    <div class="text-center">
                        <div class="text-4xl font-bold text-blue-600 mb-2">{{ $metric['number'] }}</div>
                        <div class="text-gray-600">{{ $metric['label'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Methodology Section --}}
    <div class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Our Approach</h2>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    We combine academic rigor with real-world experience to deliver practical solutions
                </p>
            </div>
            <div class="grid md:grid-cols-3 gap-8">
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
                ] as $approach)
                    <div class="text-center p-6">
                        <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <i class="fas fa-{{ $approach['icon'] }} text-blue-600 text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">{{ $approach['title'] }}</h3>
                        <p class="text-gray-600">{{ $approach['description'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- Call to Action --}}
    <div class="bg-gradient-to-r from-blue-600 to-purple-600 py-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold text-white mb-6">Ready to Work Together?</h2>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl mx-auto">
                Let's discuss how our expertise can help address your organization's challenges
            </p>
            <a href="{{ route('contactUs') }}"
               class="inline-block bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors">
                Get in Touch
            </a>
        </div>
    </div>
</div>
</x-guest-layout>
