<div class="flex flex-col gap-12">
    <div
        class="flex flex-col gap-6 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4">
        <div class="font-bold text-sm dark:text-gray-400">
            Edit
        </div>
        <div>
            <x-label class="" for="name" value="{{ __('Name') }}" />
            <x-input id="name" class="block mt-1 w-full" type="text" wire:model.live="name" required autofocus
                autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>
        <div class="flex w-full mt-4 gap-3 flex-col">
            <x-label for="description">Description (optional)</x-label>
            <textarea wire:model.live="description" cols="12" rows="6"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm"></textarea>
            <x-input-error for="description" class="mt-2" />
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
        <div class="">
            <x-secondary-button href="{{ route('dashboard.category.') }}" wire:navigate>
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
            Delete this category
        </div>
        <div class="flex flex-col gap-3">
            <span>Deleting this category will not be undone.</span>
            <div class="">
                 <x-danger-button wire:click="DeleteItem"  wire:confirm="Sure you want to delete this ?"  class="ms-3"  wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="DeleteItem">Saving...</div>
                    <span wire:loading.remove wire:target="DeleteItem">{{ __('Yes i understand') }}</span>
                </x-danger-button>
            </div>

        </div>
    </div>

</div>
