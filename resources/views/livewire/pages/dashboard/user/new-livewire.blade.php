<div>
    <div class="">
        <x-secondary-button wire:click="toggleModel" wire:loading.attr="disabled">Add new user
        </x-secondary-button>
    </div>
    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="openModel">
        <x-slot name="title">
            {{ __('Add new user') }}
        </x-slot>

        <x-slot name="content">
            <div>
                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" wire:model.live="name"
                        required autofocus autocomplete="name" />
                    <x-input-error for="name" class="mt-2" />

                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" wire:model.live="email"
                        name="email" required autocomplete="username" />
                    <x-input-error for="email" class="mt-2" />

                </div>

                <div class="mt-4">
                    <x-label for="password" value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" wire:model.live="password" type="password"
                        name="password" required autocomplete="new-password" />
                    <x-input-error for="password" class="mt-2" />
                </div>
                <div class="mt-4">
                    <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" wire:model.live="password_confirmation"
                        class="block mt-1 w-full" type="password" name="password_confirmation" required
                        autocomplete="new-password" />
                    <x-input-error for="error" class="mt-2" />
                </div>
                {{ $this->error }}
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
