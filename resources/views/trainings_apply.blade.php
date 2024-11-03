<x-guest-layout>
    <div class="relative bg-gray-50 ">
        <div class="flex-shrink-0">
            <img class="h-64 object-cover w-[100%]" src="{{ $training->featured_image }}" alt="">
        </div>
        <div class="lg:pl-24">
        @livewire('pages.website.trainings_apply.trainings_apply_view', ['training' => $training])
        </div>
    </div>
    <x-footer.app />
</x-guest-layout>
