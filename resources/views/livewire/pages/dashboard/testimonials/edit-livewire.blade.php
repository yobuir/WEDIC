<div>

    <div>
        <x-label for="profile" value="Profile Image" />
        <div class="mt-2 flex items-center gap-6">
            @if ($profile || $newProfile)
                <div class="relative">
                    <img src="{{ $newProfile ? $newProfile->temporaryUrl() : $profile }}"
                        class="w-24 h-24 rounded-full object-cover border-2 border-gray-200 dark:border-gray-700"
                        alt="Profile preview">
                </div>
            @endif
            <div class="flex-1">
                <input type="file" wire:model.live="newProfile" id="profile"
                    class="block w-full text-sm text-gray-500 dark:text-gray-400
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100
                                      dark:file:bg-wedic-blue-700 dark:file:text-gray-300"
                    accept="image/*">
                <x-input-error for="newProfile" class="mt-2" />
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    JPG, PNG, GIF up to 1MB
                </p>
            </div>
        </div>
    </div>

    <!-- Basic Information -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Name -->
        <div>
            <x-label for="name" value="Name" />
            <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" required />
            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <x-label for="email" value="Email" />
            <x-input id="email" type="email" class="mt-1 block w-full" wire:model="email" required />
            <x-input-error for="email" class="mt-2" />
        </div>

        <!-- Role -->
        <div>
            <x-label for="role" value="Role/Position" />
            <x-input id="role" type="text" class="mt-1 block w-full" wire:model="role" required />
            <x-input-error for="role" class="mt-2" />
        </div>

        <!-- Phone -->
        <div>
            <x-label for="phone" value="Phone" />
            <x-input id="phone" type="tel" class="mt-1 block w-full" wire:model="phone" />
            <x-input-error for="phone" class="mt-2" />
        </div>
    </div>

    <!-- Message -->
    <div>
        <x-label for="message" value="Testimonial Message" />
        <textarea id="message" wire:model="message" rows="4"
            class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
            required></textarea>
        <x-input-error for="message" class="mt-2" />
    </div>

    <div class="flex w-full mt-4 mb-4 gap-3 flex-col">
        <x-label for="description">Status</x-label>
        <select wire:model="status"
            class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">
            <option>Select status</option>
            <option class="capitalize">draft</option>
            <option class="capitalize">published</option>
            <option class="capitalize">archived</option>
        </select>
    </div>
    <x-button class="ms-3" wire:click="store" wire:loading.attr="disabled">
        <div wire:loading.delay wire:target="store">Saving...</div>
        <span wire:loading.remove wire:target="store">{{ __('Save & continue') }}</span>
    </x-button>


    <div
        class="flex flex-col gap-6 mt-6 bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg p-4 dark:text-gray-400">
        <div class="font-bold text-sm">
            Delete Testimonial
        </div>
        <div class="flex flex-col gap-3">
            <span>Deleting this Testimonial will not be undone.</span>
            <div class="">
                <x-danger-button wire:click="deleteProfile" wire:confirm="Sure you want to delete this ?" class="ms-3"
                    wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="deleteProfile">Deleting...</div>
                    <span wire:loading.remove wire:target="deleteProfile">{{ __('Yes i understand') }}</span>
                </x-danger-button>
            </div>

        </div>
    </div>

</div>
