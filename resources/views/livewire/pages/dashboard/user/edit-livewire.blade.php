<div class="flex flex-col gap-12">
    <div
        class="flex flex-col gap-6 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4">
        <div class="font-bold text-sm dark:text-gray-400">
            Edit
        </div>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.live="name"
                    required autofocus autocomplete="name" />
                <x-input-error for="name" class="mt-2" />

            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" wire:model.live="email" name="email"
                    required autocomplete="username" />
                <x-input-error for="email" class="mt-2" />

            </div>

            @if ($roles)
                <div class="flex w-full  gap-3 flex-col mt-4">
                    <x-label for="role">Select roles</x-label>
                    <select wire:model.live="role_id"
                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">
                        <option value="">Select roles</option>
                        @forelse ($roles as $item)
                            <option class="capitalize" value="{{ $item->id }}">{{ $item->name }}</option>
                        @empty
                        @endforelse
                    </select>
                    <x-input-error for="role_id" class="mt-2" />

                </div>
            @else
                no role
            @endif
        </form>
        <div class="">
            <x-secondary-button href="{{ route('dashboard.users.') }}" wire:navigate>
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
            Disable this user
        </div>
        <div class="flex flex-col gap-3">
            <span>Disabling this user will revoke access to system for this user.</span>
            <div class="">
                <x-danger-button wire:click="disAbleItem" wire:confirm="Sure you want to disable this user ?" class="ms-3" wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="disAbleItem">Disabling...</div>
                    <span wire:loading.remove wire:target="disAbleItem">{{ __('Yes i understand') }}</span>
                </x-danger-button>
            </div>


        </div>
    </div>

    <div
        class="flex flex-col gap-6 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4 dark:text-gray-400">
        <div class="font-bold text-sm">
            Delete this user
        </div>
        <div class="flex flex-col gap-3">
            <span>Deleting this user will not be undone.</span>
            <div class="">
                 <x-danger-button wire:click="DeleteItem"  wire:confirm="Sure you want to delete this ?"  wire:confirm="Sure you want to delete this user ?" class="ms-3" wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="DeleteItem">Saving...</div>
                    <span wire:loading.remove wire:target="DeleteItem">{{ __('Yes i understand') }}</span>
                </x-danger-button>
            </div>
        </div>
    </div>

</div>
