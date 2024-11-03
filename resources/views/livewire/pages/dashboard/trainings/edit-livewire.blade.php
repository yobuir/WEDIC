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


        <div class="mt-3">
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="availability-radio-1" type="radio" value="remote" wire:model="availability"
                    name="availability"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                <label for="availability-radio-1"
                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remote</label>
            </div>
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                <input checked id="availability-radio-2" type="radio" value="onsite" wire:model="availability"
                    name="availability"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                <label for="availability-radio-2"
                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    OnSite</label>
            </div>
            <x-input-error for="availability" class="mt-2" />
        </div>

        <div class="mt-3">
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="type-radio-1" type="radio" value="internal" wire:model.live="type" name="type"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600"
                    {{ $type == 'internal' ? 'checked' : '' }}>
                <label for="type-radio-1"
                    class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Internal
                    Training</label>
            </div>
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                <input id="type-radio-2" type="radio" value="external" wire:model.live="type" name="type"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600"
                    {{ $type == 'external' ? 'checked' : '' }}>
                <label for="type-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                    External training </label>
            </div>
            <x-input-error for="type" class="mt-2" />
        </div>

        @if ($this->type == 'external')
            <div>
                <x-label class="" for="link">External Application link</x-label>
                <x-input id="link" class="block mt-1 w-full" type="url" wire:model.live="link" required
                    autofocus autocomplete="link" />
                <x-input-error for="title" class="mt-2" />
            </div>
        @endif

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
            Delete this Training
        </div>
        <div class="flex flex-col gap-3">
            <span>Deleting this Training will not be undone.</span>
            <div class="">
                 <x-danger-button wire:click="DeleteItem"  wire:confirm="Sure you want to delete this ?"  class="ms-3" wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="DeleteItem">Saving...</div>
                    <span wire:loading.remove wire:target="DeleteItem">{{ __('Yes i understand') }}</span>
                </x-danger-button>
            </div>

        </div>
    </div>

</div>
