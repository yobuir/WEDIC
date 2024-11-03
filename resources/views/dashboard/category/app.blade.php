<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Category
                </h2>
                <p>Manage, create and edit all categories</p>
            </div>
            <div class="flex flex-col   justify-between flex-wrap gap-3">
                @livewire('pages.dashboard.category.new-livewire')
            </div>
        </div>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="flex flex-col">
                    @livewire('table-component', ['model' => \App\Models\Category::class, 'columns' => ['name', 'created_by', 'updated_by', 'status']])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
