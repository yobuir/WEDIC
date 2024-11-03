<div>
    <div class="">
        <x-secondary-button wire:click="toggleModel" wire:loading.attr="disabled">
            Add new Album
        </x-secondary-button>
    </div>
    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="openModel">
        <x-slot name="title">
            {{ __('Add new Album') }}
        </x-slot>

        <x-slot name="content">
            <form wire:submit.prevent="save" class="space-y-6">
                <!-- Album Information -->
                <div class="grid grid-cols-1 gap-6 mt-4">
                    <div>
                        <x-label for="name" value="Album Name" />
                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" required
                            autofocus />
                        <x-input-error for="name" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="description" value="Description" />
                        <textarea id="description" wire:model="description" rows="3"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"></textarea>
                        <x-input-error for="description" class="mt-2" />
                    </div>

                    <div>
                        <x-label for="status" value="Status" />
                        <select id="status" wire:model="status"
                            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm">
                            <option value="draft">Draft</option>
                            <option value="published">Published</option>
                        </select>
                        <x-input-error for="status" class="mt-2" />
                    </div>
                </div>

                <!-- Cover Image Upload -->
                <div class="mt-6">
                    <x-label for="cover_image" value="Cover Image" />
                    <div class="mt-2 flex items-center space-x-4">
                        @if ($cover_image)
                            <div class="relative">
                                <img src="{{ $cover_image->temporaryUrl() }}" class="w-32 h-32 object-cover rounded-lg"
                                    alt="Cover preview">
                                <button type="button" wire:click="$set('cover_image', null)"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" wire:model="cover_image"
                                class="block w-full text-sm text-gray-500 dark:text-gray-400
                                          file:mr-4 file:py-2 file:px-4
                                          file:rounded-full file:border-0
                                          file:text-sm file:font-semibold
                                          file:bg-blue-50 file:text-blue-700
                                          hover:file:bg-blue-100"
                                accept="image/*">
                            <x-input-error for="cover_image" class="mt-2" />
                        </div>
                    </div>
                </div>
            </form>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('openModel')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="save" wire:loading.attr="disabled">
                <div wire:loading.delay wire:target="save">Saving...</div>
                <span wire:loading.remove wire:target="save">{{ __('Save & continue') }}</span>
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
