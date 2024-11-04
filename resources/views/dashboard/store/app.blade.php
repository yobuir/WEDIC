<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Products
                </h2>
                <p>Manage, create and edit all products</p>
            </div>
            <div class="flex flex-col   justify-between flex-wrap gap-3">
                @livewire('pages.dashboard.store.new-livewire')
            </div>
        </div>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="flex flex-col">
                    @livewire('table-component', ['model' => \App\Models\Product::class, 'columns' => ['featured_image','category_id','name', 'quantity','measurement_unit', 'created_at','status']])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
