<div>
    <div class="">
        <x-secondary-button wire:click="toggleModel" wire:loading.attr="disabled">
            Add new training
        </x-secondary-button>
    </div>
    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="openModel">
        <x-slot name="title">
            {{ __('Add new Traning') }}
        </x-slot>
        <x-slot name="content">
            <div>
                <x-label class="" for="title">Title</x-label>
                <x-input id="title" class="block mt-1 w-full" type="text" wire:model.live="title" required
                    autofocus autocomplete="title" />
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
                    <input id="availability-radio-1" type="radio" value="remote" wire:model="availability" name="availability"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                    <label for="availability-radio-1"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remote</label>
                </div>
                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input checked id="availability-radio-2" type="radio" value="onsite" wire:model="availability" name="availability"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                    <label for="availability-radio-2"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        OnSite</label>
                </div>
                <x-input-error for="availability" class="mt-2" />
            </div>

            <div class="mt-3">
                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input id="type-radio-1" type="radio" value="intenal" wire:model="type" name="type"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                    <label for="type-radio-1"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Internal Training</label>
                </div>
                <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                    <input checked id="type-radio-2" type="radio" value="external" wire:model="type" name="type"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-wedic-blue-700 dark:border-gray-600">
                    <label for="type-radio-2"
                        class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                        External training</label>
                </div>
                <x-input-error for="type" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label class="" for="featured_image" value="{{ __('Add Featured image') }}" />
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <input type="file" wire:model.live="featured_image" accept="/jpg">

                    <!-- Progress Bar -->
                    <div x-show="uploading">
                        <progress max="100" x-bind:value="progress"></progress>
                    </div>
                </div>
                <x-input-error for="featured_image" class="mt-2" />
                @if ($featured_image)
                    <div class="flex flex-wrap gap-2 mt-3">
                        <img src="{{ $featured_image->temporaryUrl() }}" class="w-[80px] h-[80px]" alt="photo">
                    </div>
                @endif
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('openModel')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>
            <x-button class="ms-3" wire:click="store" wire:loading.attr="disabled">
                <div wire:loading.delay wire:target="store">Saving...</div>
                <span wire:loading.remove wire:target="store">{{ __('Save & continue') }}</span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
