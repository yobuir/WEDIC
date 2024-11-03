<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Contacts
                </h2>
                <p>Manage all received contacts</p>
            </div>
        </div>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="flex flex-col">
                    @livewire('table-component', ['model' => \App\Models\Contact::class, 'columns' => ['name', 'email', 'phone', 'created_by', 'created_at', 'status']])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
