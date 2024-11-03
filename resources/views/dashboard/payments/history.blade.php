<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Payment history
                </h2>
                <p>All payment histories</p>
            </div>
        </div>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="flex flex-col">
                    @livewire('table-component', ['model' => \App\Models\Payment::class, 'columns' => ['service_type','user_id','payment_method', 'amount', 'app_fee','merchant_fee', 'currency','created_at', 'reference_id', 'status']])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
