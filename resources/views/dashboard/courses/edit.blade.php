<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Edit Course
                </h2>
            </div>
            <div class="flex flex-col   justify-between flex-wrap gap-3">
            </div>
        </div>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="flex flex-col">
                    <form
                        class=" flex  mb-6 flex-col gap-6  dark:text-gray-400 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4"
                        method="POST" action="{{ route('dashboard.course.edit.update', $course->id) }}" class="">
                        @csrf
                        <div class="flex w-full mt-4 gap-3 flex-col">
                            <x-label for="description">Description </x-label>
                            <textarea id="editor" name="description" placeholder="Write here" value="{{ $course->description }}">{{ $course->description }}</textarea>
                        </div>
                        <div class="">
                            <x-button class="">
                                <span> {{ __('Save') }}</span>
                            </x-button>
                        </div>
                    </form>
                    @livewire('pages.dashboard.courses.edit-livewire', ['id' => $course?->id])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
