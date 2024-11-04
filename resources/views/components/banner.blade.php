{{-- resources/views/livewire/banner.blade.php --}}
{{-- Success Message --}}
@if (session()->has('message'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed bottom-6 right-6 flex items-end   w-[400px] px-4 py-6 sm:p-6 z-50
        bg-white shadow-lg  rounded-lg  border-l-4 border-green-600">
        <div class="w-full">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">
                        {{ session('message') }}
                    </p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button @click="show = false"
                        class="inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <span class="sr-only">Close</span>
                        <i class="fa fa-close"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>
@endif

{{-- Error Message --}}
@if (session()->has('error'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 3000)"
        x-transition:enter="transform ease-out duration-300 transition"
        x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2"
        x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0"
        x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed bottom-6 right-6 flex items-end   w-[400px] px-4 py-6 sm:p-6 z-50
        bg-white shadow-lg  rounded-lg  border-l-4 border-red-600">
        <div class=" w-full">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <i class="fa fa-close h-6 w-6 text-red-400"></i>
                </div>
                <div class="ml-3 w-0 flex-1 pt-0.5">
                    <p class="text-sm font-medium text-gray-900">{{ session('error') }}</p>
                </div>
                <div class="ml-4 flex-shrink-0 flex">
                    <button @click="show = false"
                        class="inline-flex text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">

                        <span class="sr-only">Close</span>
                        <i class="fa fa-close"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif
