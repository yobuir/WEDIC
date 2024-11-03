<x-app-layout>
    <x-slot name="header">
        <div class="flex   justify-between flex-wrap gap-6">
            <div class="flex flex-col   justify-between flex-wrap gap-3">

                <h2 class="font-semibold text-base text-gray-800 dark:text-gray-200 leading-tight">
                    Edit Project
                </h2>
            </div>
            <div class="flex flex-col   justify-between flex-wrap gap-3">
            </div>
        </div>
    </x-slot>
    <div class="">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="containe mx-auto">
                <div class="flex flex-col gap-6">
                    <form
                        class=" flex flex-col gap-6  dark:text-gray-400 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4"
                        method="POST" action="{{ route('dashboard.project.edit.update', $project->id) }}" class="">
                        <p class="font-bold text-sm">Basic information</p>
                        @csrf
                        <div class="flex w-full mt-4 gap-3 flex-col">
                            <x-label for="summary">Summary (optional)</x-label>
                            <textarea name="summary" cols="12" rows="2" value="{{ $project->header }}"
                                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">{{ $project->header }}</textarea>
                            <x-input-error for="summary" class="mt-2" />
                        </div>
                        <div class="flex w-full mt-4 gap-3 flex-col">
                            <x-label for="description">Description </x-label>
                            <textarea id="editor" name="description" placeholder="Write here" value="{{ $project->content }}">{{ $project->content }}</textarea>
                        </div>
                        <div class="">
                            <x-button class="">
                                <span> {{ __('Save') }}</span>
                            </x-button>
                        </div>
                    </form>
                    @livewire('pages.dashboard.projects.edit-livewire', ['id' => $project?->id])
                </div>
            </section>
        </div>
    </div>
</x-app-layout>
