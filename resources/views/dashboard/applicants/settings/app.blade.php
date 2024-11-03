<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Settings
                </h2>
                <p>Manage, delete and edit application data </p>
            </div>
        </div>
    </x-slot>
    <div class="text-gray-800 dark:text-gray-400 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="flex flex-col">
                    @livewire('pages.dashboard.applications.settings-livewire',['user'=>$user])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
