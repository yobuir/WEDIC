<div class="flex flex-col gap-12">
    <div
        class="flex flex-col gap-6  dark:text-gray-400 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4">

        <p class="font-bold text-sm">General information</p>

        <div>
            <x-label class="" for="title">Title</x-label>
            <x-input id="title" class="block mt-1 w-full" type="text" wire:model.live="title" required autofocus
                autocomplete="title" />
            <x-input-error for="title" class="mt-2" />
        </div>
        <div>
            <x-label class="" for="start_date">Start Date</x-label>
            <x-input id="start_date" class="block mt-1 w-full" type="datetime-local" wire:model.live="start_date"
                required autofocus autocomplete="start_date" />
            <x-input-error for="start_date" class="mt-2" />
        </div>
        <div>
            <x-label class="" for="end_date">End Date</x-label>
            <x-input id="end_date" class="block mt-1 w-full" type="datetime-local" wire:model.live="end_date" required
                autofocus autocomplete="end_date" />
            <x-input-error for="end_date" class="mt-2" />
        </div>

        <div>
            <x-label class="" for="location">Location </x-label>
            <x-input id="location" class="block mt-1 w-full" type="text" wire:model.live="location" required
                autofocus autocomplete="location" />
            <x-input-error for="location" class="mt-2" />
        </div>


        <div>
            <x-label class="" for="coordinator">coordinator </x-label>
            <x-input id="coordinator" class="block mt-1 w-full" type="text" wire:model.live="coordinator" required
                autofocus autocomplete="coordinator" />
            <x-input-error for="coordinator" class="mt-2" />
        </div>



        <div>
            <x-label class="" for="budget">Budget </x-label>
            <x-input id="budget" class="block mt-1 w-full" type="number" wire:model.live="budget" required
                autofocus autocomplete="budget" />
            <x-input-error for="budget" class="mt-2" />
        </div>


        <div>
            <x-label class="" for="currency">currency </x-label>
            <x-input id="currency" class="block mt-1 w-full" type="text" wire:model.live="currency" required
                autofocus autocomplete="currency" />
            <x-input-error for="currency" class="mt-2" />
        </div>

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
            {{ $newFeatured_image }}
            @if ($newFeatured_image)
                <div class="flex flex-wrap gap-2 mt-3">
                    <img src="{{ $newFeatured_image->temporaryUrl() }}" class="w-[80px] h-[80px]" alt="photo">
                </div>
            @endif
            @if ($featured_image)
                <div class="mt-8 flex flex-col gap-3">
                    <h3>Recent uploaded image</h3>
                    <img src="{{ $featured_image }}" class="w-[80px] h-[80px]" alt="photo">
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
            Delete this project
        </div>
        <div class="flex flex-col gap-3">
            <span>Deleting this project will not be undone.</span>
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
