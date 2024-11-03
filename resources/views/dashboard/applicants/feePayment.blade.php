<x-app-layout>
    <div class="text-gray-800 dark:text-gray-400 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="flex flex-col">
                    @livewire('pages.website.apply-trainings.pay-admission-fee',['training'=>$training])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
