<div class="flex flex-col gap-12">

    <div class="flex lg:flex-row  flex-col gap-6">
        <div
            class="flex flex-1 flex-col gap-6  dark:text-gray-400 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4">

            <p class="font-bold text-sm">General information</p>

            <div>
                <x-label class="" for="title">Title</x-label>
                <x-input id="title" class="block mt-1 w-full" type="text" wire:model.live="title" required autofocus
                    autocomplete="title" />
                <x-input-error for="title" class="mt-2" />
            </div>
            <div class="flex w-full mt-4 gap-3 flex-col">
                <x-label for="description">Status</x-label>
                <select wire:model="status"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">
                    <option>Select status</option>
                    <option class="capitalize">draft</option>
                    <option class="capitalize">published</option>
                    <option class="capitalize">archived</option>
                </select>
            </div>

            <div class="mt-4">
                <x-label class="" for="newFeatured_image" value="{{ __('Add Featured image') }}" />
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <input type="file" wire:model.live="newFeatured_image" accept="/jpg">

                    <!-- Progress Bar -->
                    <div x-show="uploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
                <x-input-error for="featured_image" class="mt-2" />

                @if ($newFeatured_image)
                    <div class="flex flex-wrap gap-2 mt-3">
                        <img src="{{ $newFeatured_image->temporaryUrl() }}" class="w-[80px] h-[80px]" alt="photo">
                    </div>
                @endif
            </div>

            <div class="mt-4">
                <x-label class="" for="resources" value="{{ __('Add Resources files (upload multiple)') }}" />
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <input type="file" wire:model.live="resources" multiple>

                    <!-- Progress Bar -->
                    <div x-show="uploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
                <x-input-error for="resources" class="mt-2" />
                @if ($newResources)
                    <div class="flex flex-col gap-2 mt-3">
                        @foreach ($newResources as $itemPreview)
                            <div class="flex gap-1 border py-2 p-2 rounded-lg dark:border-gray-700 items-center">

                                <div class="">
                                    {{ $itemPreview?->getClientOriginalName() }} ( )
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif

            </div>
            <div class="">
                <x-button class="" wire:click="store" wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="store">Saving...</div>
                    <span wire:loading.remove wire:target="store">{{ __('Save') }}</span>
                </x-button>
            </div>
        </div>

        <div class="">
            <div
                class="flex min-w-[300px] flex-col gap-6  dark:text-gray-400 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4">
                <p class="font-bold text-sm">Prev. Image</p>
                <div class="">
                    @if ($featured_image)
                        <div class="mt-8 flex flex-col gap-3">
                            <img src="{{ $featured_image }}"  class="w-60 rounded-lg" alt="photo">
                        </div>
                    @endif
                </div>
                <p class="font-bold text-sm">Resources</p>
                @if ($this->resources)
                    @php
                        $resources = json_decode($this->resources, true);
                    @endphp
                    @if (is_array($resources))
                        @forelse ($resources as $item)
                            <a href="{{ $item }}" target="__blank"
                                class=" hover:dark:bg-wedic-blue-700 hover:bg-gray-400 flex gap-1 border py-2 p-2 rounded-lg dark:border-gray-700 items-center">
                                <div class="">
                                    {{ 'File' }} ({{ $loop->index + 1 }} )
                                </div>
                            </a>
                        @empty
                        @endforelse
                    @endif
                @endif
            </div>
        </div>

    </div>

    <div
        class="flex flex-col gap-6 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4 dark:text-gray-400">
        <div class="font-bold text-sm">
            Delete this course
        </div>
        <div class="flex flex-col gap-3">
            <span>Deleting this course will not be undone.</span>
            <div class="">
                 <x-danger-button wire:click="DeleteItem"  wire:confirm="Sure you want to delete this ?"  class="ms-3" wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="DeleteItem">Saving...</div>
                    <span wire:loading.remove wire:target="DeleteItem">{{ __('Yes i understand') }}</span>
                </x-danger-button>
            </div>

        </div>
    </div>

</div>
