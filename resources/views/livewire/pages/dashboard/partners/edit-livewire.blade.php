<div class="flex flex-col gap-12">
    <div
        class="flex flex-col gap-6 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4">
        <div class="font-bold text-sm dark:text-gray-400">
            Edit
        </div>
        <div class="flex flex-col gap-4">
            <div>
                <x-label class="" for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" wire:model.live="name" required autofocus
                    autocomplete="name" />
                <x-input-error for="name" class="mt-2" />
            </div>
            <div>
                <x-label class="" for="url" value="{{ __('Web link') }}" />
                <x-input id="url" class="block mt-1 w-full" type="url" wire:model.live="url" autofocus
                    autocomplete="url" />
                <x-input-error for="url" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-label class="" for="newLogo" value="{{ __('Add new logo ') }}" />
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <input type="file" wire:model.live="newLogo"
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
                <x-input-error for="newLogo" class="mt-2" />
                @if ($newLogo)
                    <div class="flex flex-wrap gap-2 mt-3">
                        <img src="{{ $newLogo->temporaryUrl() }}" class="w-[80px] h-[80px]" alt="photo">
                    </div>
                @elseif ($logo)
                    <div class="flex flex-wrap gap-2 mt-3">
                        <img src="{{ $logo }}" class="w-[80px] h-[80px]" alt="photo">
                    </div>
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
        </div>
        <div class="">
            <x-secondary-button href="{{ route('dashboard.partners.') }}" wire:navigate>
                {{ __('Go back') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="store" wire:loading.attr="disabled">
                <div wire:loading.delay wire:target="store">Saving...</div>
                <span wire:loading.remove wire:target="store">{{ __('Save & continue') }}</span>
            </x-button>
        </div>
    </div>

    <div
        class="flex flex-col gap-6 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4 dark:text-gray-400">
        <div class="font-bold text-sm">
            Delete this partner
        </div>
        <div class="flex flex-col gap-3">
            <span>Deleting this partner will not be undone.</span>
            <div class="">
                <x-danger-button wire:click="DeleteItem" wire:confirm="Sure you want to delete this ?" class="ms-3"
                    wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="DeleteItem">Saving...</div>
                    <span wire:loading.remove wire:target="DeleteItem">{{ __('Yes i understand') }}</span>
                </x-danger-button>
            </div>

        </div>
    </div>

</div>
