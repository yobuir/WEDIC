<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-lg text-gray-800 dark:text-gray-200 leading-tight">

            @if (!auth()->user()->isApplicant() and !auth()->user()->isUser())
                {{ __('Dashboard') }}
            @else
                {{ __('My Applications') }}
            @endif
        </h2>
    </x-slot>
    <div class=" text-gray-800 dark:text-gray-400">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (!auth()->user()->isApplicant() and !auth()->user()->isUser())
                @livewire('pages.dashboard.admin-livewire')
            @else
                @livewire('pages.dashboard.applications.app-livewire')
            @endif
        </div>
    </div>
</x-app-layout>
