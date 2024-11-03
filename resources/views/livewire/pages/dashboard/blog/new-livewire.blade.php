<div>
    <div class="">
        <x-secondary-button wire:click="toggleModel" wire:loading.attr="disabled">Add new blog
        </x-secondary-button>
    </div>
    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="openModel">
        <x-slot name="title">
            {{ __('Add new Blog') }}
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

            <div class="mt-4">
                <x-label class="" for="featured_image" value="{{ __('Add Featured image') }}" />
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <input type="file" wire:model.live="featured_image"
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
