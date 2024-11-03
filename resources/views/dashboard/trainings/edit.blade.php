<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">
                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Edit Training
                </h2>
            </div>
            <div class="flex flex-col   justify-between flex-wrap gap-3">
                @livewire('pages.dashboard.trainings.fees.new-livewire', ['id' => $training?->id])
            </div>
        </div>
    </x-slot>

    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="mb-4 font-bold flex gap-6 text-blue-500">
                    <a href="#basicinfo " class="hover:underline">Basic information</a>
                    <a href="#pricing " class="hover:underline">Pricing</a>
                </div>
                <div class="flex flex-col gap-6" id="basicinfo">
                    <form
                        class=" flex flex-col gap-6  dark:text-gray-400 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4"
                        method="POST" action="{{ route('dashboard.training.edit.update', $training->id) }}" class="">
                        <p class="font-bold text-sm">Basic information</p>
                        @csrf
                        <div class="flex w-full mt-4 gap-3 flex-col" wire:ignore>
                            <x-label for="description">Description </x-label>
                            <textarea id="editor" name="description" placeholder="Write here" value="{{ $training->content }}">{{ $training->content }}</textarea>
                        </div>
                        <div class="">
                            <x-button class="">
                                <span> {{ __('Save') }}</span>
                            </x-button>
                        </div>
                    </form>
                    @livewire('pages.dashboard.trainings.edit-livewire', ['id' => $training?->id])
                </div>
            </section>
        </div>
    </div>
    <div class="mt-12" id="pricing">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div
                    class="flex flex-col  gap-6  dark:text-gray-400 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4">
                    <p class="font-bold text-sm">Pricing</p>
                    <div class="">
                        @livewire('pages.dashboard.trainings.fees.new-livewire', ['id' => $training?->id])
                    </div>
                </div>
            </section>
            <section class="container mx-auto mt-5">
                <div class="flex flex-col">
                    @livewire('pages.dashboard.trainings.fees.app-livewire', ['id' => $training?->id, 'model' => \App\Models\TrainingFee::class, 'columns' => ['type', 'method', 'frequency', 'duration', 'installmentAmount', 'amount', 'currency', 'created_at', 'status']])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
