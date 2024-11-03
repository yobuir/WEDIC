<x-guest-layout>
{{-- resources/views/livewire/about.blade.php --}}
<div>
    {{-- Hero Section with Parallax Effect --}}
    <div class="relative min-h-[60vh] flex items-center bg-gradient-to-r from-blue-600 to-purple-600 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div
            class="absolute inset-0 opacity-20"
            style="background-image: url('/api/placeholder/1920/1080'); background-position: center; background-size: cover;"
        ></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl animate-fade-in">
                    About {{ config('app.name') }}
                </h1>
                <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                    Empowering communities through inclusive excellence and sustainable development
                </p>
                <div class="mt-8">
                    <a href="#story" class="inline-flex items-center justify-center text-white hover:text-gray-200 transition-colors">
                        <span>Discover Our Story</span>
                        <i class="fas fa-arrow-down ml-2 animate-bounce"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- History Section with Timeline --}}
    <div id="story" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center mb-16">
                <h2 class="text-4xl font-extrabold text-gray-900">Our Story</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="prose prose-lg prose-blue">
                    <p class="text-lg leading-relaxed text-gray-700">
                        Women Empowerment & Disability Inclusion Consultancy "{{ config('app.name') }}" is a Social Enterprise consulting firm and Projects manager, registered and domiciled in Rwanda. We specialize in Research, Survey, Assessment, Monitoring and Evaluation, Trainings, institutional Capacity development, Event Management, and other Consultancy services.
                    </p>
                    <p class="text-lg leading-relaxed text-gray-700">
                        Our promoters and strategic leaders are highly qualified, experienced professionals with deep understanding of gender equality and disability rights and inclusion. We're dedicated to shaping the direction of our clients' businesses while promoting social justice, equity, diversity, and inclusion for all.
                    </p>
                </div>
                <div class="relative">
                    <img
                        src="/api/placeholder/600/400"
                        alt="WEDIC Team"
                        class="rounded-xl shadow-2xl transform hover:scale-105 transition-transform duration-300"
                    >
                    <div class="absolute -bottom-6 -right-6 w-32 h-32 bg-blue-600 rounded-full opacity-20"></div>
                    <div class="absolute -top-6 -left-6 w-24 h-24 bg-pink-600 rounded-full opacity-20"></div>
                </div>
            </div>
        </div>
    </div>

    {{-- Vision & Mission Section with Cards --}}
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-12">
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-blue-100 rounded-full transform translate-x-20 -translate-y-20 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-eye text-blue-600 text-2xl"></i>
                            </div>
                            <h3 class="ml-4 text-3xl font-bold text-gray-900">Our Vision</h3>
                        </div>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            To be the most respected and leading assurance and advisory services provider in the Region.
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 relative overflow-hidden group">
                    <div class="absolute top-0 right-0 w-40 h-40 bg-pink-100 rounded-full transform translate-x-20 -translate-y-20 group-hover:scale-150 transition-transform duration-500"></div>
                    <div class="relative">
                        <div class="flex items-center mb-6">
                            <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center">
                                <i class="fas fa-bullseye text-pink-600 text-2xl"></i>
                            </div>
                            <h3 class="ml-4 text-3xl font-bold text-gray-900">Our Mission</h3>
                        </div>
                        <p class="text-lg text-gray-600 leading-relaxed">
                            To provide high quality, innovative assurance and advisory services based on latest professional knowledge and ethical values, working towards development needs in urban and rural areas while supporting corporate social and economic initiatives.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Values Section with Fixed Content --}}
    <div class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900">Our Values</h2>
                <div class="w-24 h-1 bg-blue-600 mx-auto mt-4"></div>
                <p class="mt-4 text-xl text-gray-500">
                    The principles that guide our work and relationships
                </p>
            </div>

            <div class="grid gap-8 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center group-hover:bg-blue-600 transition-colors duration-300">
                            <i class="fas fa-star text-blue-600 text-xl group-hover:text-white"></i>
                        </div>
                        <h3 class="ml-4 text-xl font-bold text-gray-900">Excellence</h3>
                    </div>
                    <p class="text-gray-600">Striving for the highest quality in all our services and deliverables.</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-pink-100 rounded-full flex items-center justify-center group-hover:bg-pink-600 transition-colors duration-300">
                            <i class="fas fa-lightbulb text-pink-600 text-xl group-hover:text-white"></i>
                        </div>
                        <h3 class="ml-4 text-xl font-bold text-gray-900">Innovation</h3>
                    </div>
                    <p class="text-gray-600">Embracing creative solutions and cutting-edge approaches to challenges.</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center group-hover:bg-purple-600 transition-colors duration-300">
                            <i class="fas fa-eye text-purple-600 text-xl group-hover:text-white"></i>
                        </div>
                        <h3 class="ml-4 text-xl font-bold text-gray-900">Transparency</h3>
                    </div>
                    <p class="text-gray-600">Maintaining clear and honest communication in all our dealings.</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-red-100 rounded-full flex items-center justify-center group-hover:bg-red-600 transition-colors duration-300">
                            <i class="fas fa-heart text-red-600 text-xl group-hover:text-white"></i>
                        </div>
                        <h3 class="ml-4 text-xl font-bold text-gray-900">Passion</h3>
                    </div>
                    <p class="text-gray-600">Bringing enthusiasm and dedication to every project we undertake.</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center group-hover:bg-green-600 transition-colors duration-300">
                            <i class="fas fa-users text-green-600 text-xl group-hover:text-white"></i>
                        </div>
                        <h3 class="ml-4 text-xl font-bold text-gray-900">Inclusion</h3>
                    </div>
                    <p class="text-gray-600">Ensuring accessibility and representation for all stakeholders.</p>
                </div>

                <div class="bg-white rounded-xl shadow-lg p-8 hover:shadow-2xl transition-all duration-300 group">
                    <div class="flex items-center mb-6">
                        <div class="w-14 h-14 bg-yellow-100 rounded-full flex items-center justify-center group-hover:bg-yellow-600 transition-colors duration-300">
                            <i class="fas fa-check-circle text-yellow-600 text-xl group-hover:text-white"></i>
                        </div>
                        <h3 class="ml-4 text-xl font-bold text-gray-900">Accountability</h3>
                    </div>
                    <p class="text-gray-600">Taking responsibility for our actions and delivering on our promises.</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Purpose Section with Enhanced Design --}}
    <div class="relative py-20 bg-gradient-to-r from-blue-600 to-purple-600 overflow-hidden">
        <div class="absolute inset-0 bg-black opacity-10"></div>
        <div class="absolute inset-0">
            <div class="absolute inset-0" style="background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.1'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E")"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-4xl font-bold text-white mb-8">Our Purpose</h2>
                <div class="max-w-3xl mx-auto">
                    <p class="text-xl text-gray-200 leading-relaxed">
                        WEDI Consultancy aims to create inclusive businesses that empower women, youth, and girls with and without disabilities by purposefully integrating them into their value chains. We work to identify barriers and opportunities in addressing disability issues, focusing on progressive advancement in the coming years.
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Call to Action --}}
    <div class="bg-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-gray-50 rounded-2xl p-12 md:p-16 relative overflow-hidden">
                <div class="relative z-10">
                    <div class="text-center">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">Ready to Make a Difference?</h2>
                        <p class="text-xl text-gray-600 mb-8">
                            Join us in creating positive change through inclusive excellence
                        </p>
                        <a
                            href="{{ route('contactUs') }}"
                            class="inline-block bg-blue-600 text-white px-8 py-4 rounded-lg font-semibold hover:bg-blue-700 transition-colors"
                        >
                            Get Started
                        </a>
                    </div>
                </div>
                <div class="absolute top-0 right-0 -mt-4 -mr-4 w-64 h-64 bg-blue-200 rounded-full opacity-20"></div>
                <div class="absolute bottom-0 left-0 -mb-4 -ml-4 w-64 h-64 bg-pink-200 rounded-full opacity-20"></div>
            </div>
        </div>
    </div>
</div>
</x-guest-layout>
