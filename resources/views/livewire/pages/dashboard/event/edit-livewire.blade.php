<div class="flex flex-col gap-12">
    <div
        class="flex flex-col gap-6  dark:text-gray-400 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4">

        <p class="font-bold text-sm">Event General information</p>
        <div>
            <x-label class="" for="title">Title</x-label>
            <x-input id="title" class="block mt-1 w-full" type="text" wire:model.live="title" required autofocus
                autocomplete="title" />
            <x-input-error for="title" class="mt-2" />
        </div>
        <div class="flex lg:flex-row flex-col gap-3 justify-between">
            <div class="flex-1">
                <x-label class="" for="date">Start Date </x-label>
                <x-input id="date" class="block mt-1 w-full" type="datetime-local" wire:model.live="date" required
                    autofocus autocomplete="date" />
                <x-input-error for="date" class="mt-2" />
            </div>
            <div class="flex-1">
                <x-label class="" for="date">End Date </x-label>
                <x-input id="date" class="block mt-1 w-full" type="datetime-local" wire:model.live="end_date"
                    required autofocus autocomplete="date" />
                <x-input-error for="date" class="mt-2" />
            </div>
        </div>

        <div>
            <x-label class="" for="location">Location </x-label>
            <x-input id="location" class="block mt-1 w-full" type="text" wire:model.live="location" required
                autofocus autocomplete="location" />
            <x-input-error for="location" class="mt-2" />
        </div>
        <div>
            <x-label class="" for="organizer">Organizer </x-label>
            <x-input id="organizer" class="block mt-1 w-full" type="text" wire:model.live="organizer" required
                autofocus autocomplete="organizer" />
            <x-input-error for="organizer" class="mt-2" />
        </div>
        <div>
            <x-label class="" for="link">link </x-label>
            <x-input id="link" class="block mt-1 w-full" type="url" wire:model.live="link" required autofocus
                autocomplete="link" />
            <x-input-error for="link" class="mt-2" />
        </div>
        {{-- <div>
            <x-label class="" for="location">Cost </x-label>
            <x-input id="cost" class="block mt-1 w-full" type="number" wire:model.live="cost" required autofocus
                autocomplete="cost" />
            <x-input-error for="cost" class="mt-2" />
        </div> --}}
        <div class="mt-4">
            @if ($categories)
                <div class="flex w-full  gap-3 flex-col">
                    <x-label for="description">Categories</x-label>
                    <select wire:model="category_id"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">
                        <option value="">Select Category</option>
                        @forelse ($categories as $item)
                            <option class="capitalize" value="{{ $item->id }}">{{ $item->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    <x-input-error for="category_id" class="mt-2" />

                </div>
            @else
                no categories <a href="{{ route('dashboard.category.') }}" wire:navigate target="__blank">Add
                    new</a>
            @endif

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
        <div>
            <label>

            <x-checkbox wire:model="featured">Featured</x-checkbox>
                Featured
            </label>
        </div>

        <div class="mt-4">
            <x-label class="" for="newFeatured_image" value="{{ __('Add Featured image') }}" />
            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <!-- File Input -->
                <input type="file" wire:model.live="newFeatured_image"
                    class="block w-full text-sm text-gray-500 dark:text-gray-400
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100
                                      dark:file:bg-wedic-blue-700 dark:file:text-gray-300"
                    accept="/jpg">

                <!-- Progress Bar -->
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>
            <x-input-error for="featured_image" class="" />
            @if ($newFeatured_image)
                <div class="flex flex-wrap gap-2 mt-3">
                    <img src="{{ $newFeatured_image->temporaryUrl() }}" class="w-[80px] h-[80px]" alt="photo">
                </div>
            @endif
            @if ($featured_image)
                <div class="mt-8 flex flex-col gap-3">
                    <small class="text-sm text-gray-500">Recent uploaded image</small>
                    <img src="{{ $featured_image }}" class="w-[80px] h-[80px]" alt="photo">
                </div>
            @endif

        </div>

        <div class="mt-4 mb-5">
            <x-label class="" for="files" value="{{ __('Add Downloadable files') }}" />
            <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                x-on:livewire-upload-error="uploading = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">
                <!-- File Input -->
                <input type="file" wire:model.live="files"
                    class="block w-full text-sm text-gray-500 dark:text-gray-400
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100
                                      dark:file:bg-wedic-blue-700 dark:file:text-gray-300"
                    multiple>

                <!-- Progress Bar -->
                <div x-show="uploading">
                    <progress max="100" x-bind:value="progress"></progress>
                </div>
            </div>
            <x-input-error for="featured_image" class="mt-2" />

            @if (!empty($existingFiles))
                <div class="mt-4">
                    <h4 class="text-sm font-medium mb-2">Existing Files:</h4>
                    <div class="space-y-2">
                        @foreach ($existingFiles as $index => $file)
                            <div class="flex items-center justify-between bg-white dark:bg-wedic-blue-700 p-2 rounded">
                                <a href="{{ $file }}" target="_blank"
                                    class="text-blue-600 dark:text-blue-400 hover:underline truncate max-w-xs">
                                    {{ $existingFileNames[$index] ?? 'File ' . ($index + 1) }}
                                </a>
                                <button type="button" wire:click="removeFile({{ $index }})"
                                    wire:confirm="Are you sure you want to remove this file?"
                                    class="text-red-600 hover:text-red-800 ml-2 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Display newly uploaded files -->
            @if ($files && count($files) > 0)
                <div class="mt-4">
                    <h4 class="text-sm font-medium mb-2">New Files to Upload:</h4>
                    <div class="space-y-2">
                        @foreach ($files as $file)
                            <div class="bg-white dark:bg-wedic-blue-700 p-2 rounded flex items-center justify-between">
                                <span class="truncate max-w-xs">{{ $file->getClientOriginalName() }}</span>
                                <span class="text-gray-500 text-sm ml-2">
                                    {{ number_format($file->getSize() / 1024 / 1024, 2) }} MB
                                </span>
                            </div>
                        @endforeach
                    </div>
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

    <div
        class="flex flex-col gap-6 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4 dark:text-gray-400">
        <div class="font-bold text-sm">
            Delete this Event
        </div>
        <div class="flex flex-col gap-3">
            <span>Deleting this Event will not be undone.</span>
            <div class="">
                <x-danger-button wire:click="DeleteItem" wire:confirm="Sure you want to delete this ?"
                    wire:confirm="Sure you want to delete this ?" class="ms-3" wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="DeleteItem">Saving...</div>
                    <span wire:loading.remove wire:target="DeleteItem">{{ __('Yes i understand') }}</span>
                </x-danger-button>
            </div>

        </div>
    </div>

</div>
