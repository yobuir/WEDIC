<div>
    <div class="">
        <x-secondary-button wire:click="toggleModel" wire:loading.attr="disabled">Add new product
        </x-secondary-button>
    </div>
    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="openModel">
        <x-slot name="title">
            {{ __('Add new product') }}
        </x-slot>

        <x-slot name="content">
            <div>
                <x-label class="" for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" wire:model.live="name" required
                    autofocus autocomplete="name" />
                <x-input-error for="name" class="mt-2" />
            </div> 
            <div>
                <x-label class="" for="category_id" value="{{ __('Category') }}" />
                <select class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm" wire:model.live="category_id">
                    <option value="">Select category</option>
                    @forelse ($categories as $category)
                        <option class="capitalize" value="{{ $category->id }}">{{ $category->name }}</option>                        
                    @empty
                        
                    @endforelse
                </select>
            </div>
            <div class="mt-4">
                <x-label class="" for="thumbnail" value="{{ __('Add product thumbnail') }}" />
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <input type="file" wire:model.live="thumbnail"
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
                <x-input-error for="thumbnail" class="mt-2" />
                @if ($thumbnail)
                    <div class="flex flex-wrap gap-2 mt-3">
                        <img src="{{ $thumbnail->temporaryUrl() }}" class="w-[80px] h-[80px]" alt="photo">
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
