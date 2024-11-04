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

            <div class="flex lg:flex-row flex-col gap-2 w-full">
                <div class="flex-1">
                    <x-label class="" for="price" value="{{ __('Price') }}" />
                    <x-input id="price" class="block mt-1 w-full" type="number" wire:model.live="price" required
                        autofocus autocomplete="price" />
                    <x-input-error for="price" class="mt-2" />
                </div>
                <div wire:ignore>
                    <div class="w-full  gap-2 flex flex-col">
                        <x-label class="" for="currency">{{ __('Choose a currency') }}</x-label>
                        <select id="currency" wire:model.live="currency" name="currency"
                            class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm']) !!}>">
                            <option value="">Select currency</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="flex lg:flex-row flex-col gap-2 w-full">
                <div class="flex-1">
                    <x-label class="" for="stock" value="{{ __('Stock quantity') }}" />
                    <x-input id="quantity" class="block mt-1 w-full" type="number" wire:model.live="quantity" required
                        autofocus autocomplete="stock" />
                    <x-input-error for="stock" class="mt-2" />
                </div>
                <div class="">
                    <x-label class="" for="measurement_unit" value="{{ __('Measurement Unit') }}" />
                    <x-input id="measurement_unit" class="block mt-1 w-full" type="text"
                        wire:model.live="measurement_unit" required autofocus autocomplete="stock" />
                    <x-input-error for="measurement_unit" class="mt-2" />
                </div>
            </div>

            <div class="w-full"> 
                <x-label class="" for="category_id" value="{{ __('Select category') }}" />
                <select wire:model.live="category_id"
                    class="w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">
                    <option value="">All Categories</option>
                    @forelse ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @empty
                    @endforelse
                </select>
            </div>

            <div class="mt-4">
                <x-label class="" for="newThumbnail" value="{{ __('Add new thumbnail ') }}" />
                <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                    x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
                    x-on:livewire-upload-error="uploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <!-- File Input -->
                    <input type="file" wire:model.live="newThumbnail"
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
                <x-input-error for="newThumbnail" class="mt-2" />
                @if ($newThumbnail)
                    <div class="flex flex-wrap gap-2 mt-3">
                        <img src="{{ $newThumbnail->temporaryUrl() }}" class="w-[80px] h-[80px]" alt="photo">
                    </div>
                @elseif ($featured_image)
                    <div class="flex flex-wrap gap-2 mt-3">
                        <img src="{{ $featured_image }}" class="w-[80px] h-[80px]" alt="photo">
                    </div>
                @endif
            </div>
            <div class="bg-gray-50 p-4 rounded-lg">
                <h3 class="text-lg font-medium text-gray-900 mb-4">
                    <i class="fas fa-cloud-upload-alt mr-2"></i> Upload New Photos
                </h3>

                <div class="mt-2">
                    <div class="flex items-center justify-center w-full">
                        <label
                            class="flex flex-col w-full h-32 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                            <div class="flex flex-col items-center justify-center pt-7">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 group-hover:text-gray-600"></i>
                                <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                                    Upload photos (5MB max each)
                                </p>
                            </div>
                            <input type="file" wire:model="photos" class="opacity-0" multiple accept="image/*" />
                        </label>
                    </div>
                    @error('photos.*')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Preview New Photos -->
                @if ($photos)
                    <div class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($photos as $index => $photo)
                            <div class="relative">
                                <img src="{{ $photo->temporaryUrl() }}" class="w-full h-32 object-cover rounded">
                                <button type="button" wire:click="removeNewPhoto({{ $index }})"
                                    class="absolute top-0 right-0 bg-red-500 text-white rounded p-2 m-1">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif

                <!-- Existing Images -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        <i class="fas fa-images mr-2"></i> Current Images
                    </h3>

                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach ($existingMedia['images'] as $photo)
                            <div class="relative group">
                                <img src="{{ $photo['url'] }}" class="w-full h-32 object-cover rounded">
                                <div class="absolute top-0 right-0 p-1 space-x-1">
                                    <button type="button" wire:click="setPrimaryPhoto({{ $photo['id'] }})"
                                        class="bg-{{ $photo['is_primary'] ? 'green' : 'blue' }}-500 text-white rounded-full p-1"
                                        title="{{ $photo['is_primary'] ? 'Primary Photo' : 'Set as Primary' }}">
                                        <i class="fas fa-star"></i>
                                    </button>
                                    <button type="button" wire:click="removeExistingMedia({{ $photo['id'] }})"
                                        class="bg-red-500 text-white rounded p-2" title="Remove Photo">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <div
                                    class="absolute bottom-0 left-0 right-0 p-2 bg-black bg-opacity-50 text-white text-sm truncate">
                                    {{ $photo['title'] }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex lg:flex-row flex-col gap-2">
                <x-label>
                    <x-checkbox wire:model.live="featured" value="1" />
                    featured
                </x-label>
            </div>
            <div class="flex w-full mt-4 gap-3 flex-col">
                <x-label for="description">Status</x-label>
                <select wire:model="status"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">
                    <option>Select status</option>
                    <option class="capitalize">draft</option>
                    <option class="capitalize">available</option>
                    <option class="capitalize">sold</option>
                    <option class="capitalize">unavailable</option>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('{{ asset('CommonCurrency.json') }}')
                .then(response => response.json())
                .then(data => {
                    const selectElement = document.getElementById('currency');
                    for (const code in data) {
                        if (data.hasOwnProperty(code)) {
                            const option = document.createElement('option');
                            option.value = code;
                            option.text = data[code].name + ` (${code})`;
                            selectElement.appendChild(option);
                        }
                    }
                })
                .catch(error => console.error('Error fetching currency data:', error));
        });
    </script>
</div>
