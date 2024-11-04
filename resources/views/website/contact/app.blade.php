<x-guest-layout>
    {{-- resources/views/livewire/contact.blade.php --}}
    <div>
        {{-- Hero Section --}}
        <div class="relative overflow-hidden">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 animate-gradient">
            </div>

            <!-- Animated background pattern -->
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-pattern opacity-20"></div>
                <div class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>
            </div>

            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-32">
                <div class="text-center space-y-8">
                    <span
                        class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-medium bg-white/10 text-white backdrop-blur-sm">
                        📞 Reach Out
                    </span>
                    <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl md:text-6xl">
                        Let's
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-200 to-purple-200">
                            Connect
                        </span>
                    </h1>
                    <p class="mt-6 max-w-3xl mx-auto text-xl text-gray-200">
                        Get in touch with our team to discuss how we can help your organization
                    </p>
                </div>
            </div> 
        </div>

        {{-- Main Content --}}
        <div class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-2 gap-12">
                    <div class="flex w-full">
                        <div class="flex-1">
                            @if (session()->has('success'))
                                <div
                                    class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                                    {{ session('success') }}
                                </div>
                            @endif

                            <h2 class="text-2xl font-bold mb-6">Send Us a Message</h2>

                            <form method="POST" action="{{ route('contactUs.store') }}" class="space-y-6">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <x-label for="name" class="text-black-500 font-semibold">Name</x-label>
                                        <x-input id="name"
                                            class="w-full bg-black-50 border-black-200 focus:border-wedic-blue-500 focus:ring-wedic-blue-500"
                                            type="text" name="name" />
                                        <x-input-error for="name" class="mt-1" />
                                    </div>

                                    <div class="space-y-2">
                                        <x-label for="phone" class="text-black-500 font-semibold">Phone</x-label>
                                        <x-input id="phone"
                                            class="w-full bg-black-50 border-black-200 focus:border-wedic-blue-500 focus:ring-wedic-blue-500"
                                            type="text" name="phone" />
                                        <x-input-error for="phone" class="mt-1" />
                                    </div>

                                    <div class="space-y-2">
                                        <x-label for="email" class="text-black-500 font-semibold">Email</x-label>
                                        <x-input id="email"
                                            class="w-full bg-black-50 border-black-200 focus:border-wedic-blue-500 focus:ring-wedic-blue-500"
                                            type="email" name="email" />
                                        <x-input-error for="email" class="mt-1" />
                                    </div>

                                    <div class="space-y-2">
                                        <x-label for="subject" class="text-black-500 font-semibold">Subject</x-label>
                                        <x-input id="subject"
                                            class="w-full bg-black-50 border-black-200 focus:border-wedic-blue-500 focus:ring-wedic-blue-500"
                                            type="text" name="subject" />
                                        <x-input-error for="subject" class="mt-1" />
                                    </div>
                                </div>

                                <div class="space-y-2">
                                    <x-label for="message" class="text-black-500 font-semibold">Message</x-label>
                                    <textarea id="message" name="message" rows="6"
                                        class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm"></textarea>
                                    <x-input-error for="message" class="mt-1" />
                                </div>

                                <div>
                                    <button type="submit"
                                        class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition-colors">
                                        Send Message
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>


                    {{-- Contact Information --}}
                    <div class="space-y-8">
                        {{-- Office Information --}}
                        <div class="bg-white rounded-xl border p-8">
                            <h2 class="text-2xl font-bold mb-6">Our Office</h2>
                            <div class="space-y-4">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-map-marker-alt text-blue-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium">Address</h3>
                                        <p class="text-gray-600">123 Business Street<br>Kigali, Rwanda</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-phone text-blue-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium">Phone</h3>
                                        <p class="text-gray-600">+250 123 456 789</p>
                                    </div>
                                </div>

                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-envelope text-blue-600"></i>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium">Email</h3>
                                        <p class="text-gray-600">info@wedic.com</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Business Hours --}}
                        <div class="bg-white rounded-xl border p-8">
                            <h2 class="text-2xl font-bold mb-6">Business Hours</h2>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Monday - Friday</span>
                                    <span class="font-medium">8:00 AM - 5:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Saturday</span>
                                    <span class="font-medium">9:00 AM - 1:00 PM</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Sunday</span>
                                    <span class="font-medium">Closed</span>
                                </div>
                            </div>
                        </div>

                        {{-- Social Media --}}
                        <div class="bg-white rounded-xl border p-8">
                            <h2 class="text-2xl font-bold mb-6">Connect With Us</h2>
                            <div class="flex space-x-4">
                                @foreach (['facebook', 'twitter', 'linkedin', 'instagram'] as $social)
                                    <a href="#"
                                        class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center text-blue-600 hover:bg-blue-600 hover:text-white transition-colors">
                                        <i class="fab fa-{{ $social }} text-xl"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- FAQ Section --}}
        <div class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <h2 class="text-3xl font-bold text-center mb-12">Frequently Asked Questions</h2>
                <div class="grid md:grid-cols-2 gap-8">
                    @foreach ([
        [
            'question' => 'How can I schedule a consultation?',
            'answer' => 'You can schedule a consultation by filling out our contact form or calling our office directly.',
        ],
        [
            'question' => 'What areas do you serve?',
            'answer' => 'We primarily serve Rwanda and the East African region, but we can work with clients from any location.',
        ],
        [
            'question' => 'How long does it take to get a response?',
            'answer' => 'We typically respond to all inquiries within 24-48 business hours.',
        ],
        [
            'question' => 'Do you offer virtual consultations?',
            'answer' => 'Yes, we offer both in-person and virtual consultations to accommodate our clients\' needs.',
        ],
    ] as $faq)
                        <div class="bg-gray-50 rounded-lg p-6">
                            <h3 class="text-lg font-semibold mb-2">{{ $faq['question'] }}</h3>
                            <p class="text-gray-600">{{ $faq['answer'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
