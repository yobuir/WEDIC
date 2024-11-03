<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    NewsLetter
                </h2>
                <p>Manage, create and edit all newsletters</p>
            </div>

        </div>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="container mx-auto">
                <div class="flex flex-col">
                        @livewire('pages.dashboard.mailings.app-livewire')
                </div>
            </section>
        </div>
    </div>
</x-app-layout>