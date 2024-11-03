<div>
    <div class="flex flex-col gap-6" x-data="{
        isDragging: false,
        initSortable() {
            new Sortable($refs.imageGrid, {
                animation: 150,
                onEnd: (evt) => {
                    const ids = Array.from(evt.to.children).map(el => el.dataset.id);
                    @this.updateImageOrder(ids);
                }
            })
        }
    }" x-init="initSortable()">

        <div class="bg-white dark:bg-wedic-blue-800 rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-6 dark:text-white">
                {{ $album_id ? 'Edit Album' : 'Create New Album' }}
            </h2>

            <form wire:submit.prevent="save" class="space-y-6">
                <!-- Album Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-label for="name" value="Album Name" />
                        <x-input id="name" type="text" class="mt-1 block w-full" wire:model="name" required />
                        <x-input-error for="name" class="mt-2" />
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

                <div>
                    <x-label for="description" value="Description" />
                    <textarea id="description" wire:model="description" rows="3"
                        class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 rounded-md shadow-sm"></textarea>
                    <x-input-error for="description" class="mt-2" />
                </div>

                <!-- Cover Image -->
                <div>
                    <x-label value="Cover Image" />
                    <div class="mt-2 flex items-center gap-6">
                        @if ($cover_image || $newCoverImage)
                            <div class="relative w-40 h-40">
                                <img src="{{ $newCoverImage ? $newCoverImage->temporaryUrl() : $cover_image }}"
                                    class="w-full h-full object-cover rounded-lg" alt="Cover preview">
                                <button type="button" wire:click="$set('newCoverImage', null)"
                                    class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full p-1 hover:bg-red-600">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        @endif
                        <div class="flex-1">
                            <input type="file" wire:model.live="newCoverImage" accept="image/*"
                                class="block w-full text-sm text-gray-500 dark:text-gray-400
                                      file:mr-4 file:py-2 file:px-4
                                      file:rounded-full file:border-0
                                      file:text-sm file:font-semibold
                                      file:bg-blue-50 file:text-blue-700
                                      hover:file:bg-blue-100">
                            <x-input-error for="newCoverImage" class="mt-2" />
                        </div>
                    </div>
                </div>

                <!-- Gallery Images -->
                <div>
                    <x-label value="Gallery Images" />
                    <div class="mt-2" x-on:dragover.prevent="isDragging = true"
                        x-on:dragleave.prevent="isDragging = false" x-on:drop.prevent="isDragging = false">

                        <!-- File Input -->
                        <input type="file" wire:model.live="newImages" multiple accept="image/*"
                            class="block w-full text-sm text-gray-500 dark:text-gray-400
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100">
                        <x-input-error for="newImages.*" class="mt-2" />

                        <!-- Image Grid -->
                        <div class="mt-4 grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4" x-ref="imageGrid">
                            <!-- Existing Images -->
                            @foreach ($images as $image)
                                <div class="relative group aspect-w-1 aspect-h-1" data-id="{{ $image['id'] }}">
                                    <img src="{{ $image['image_path'] }}" loading="lazy"
                                        data-full="{{ $image['image_path'] }}"
                                        class="w-full h-full object-cover rounded-lg cursor-move" alt="Gallery image">
                                    <div
                                        class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity
                                flex items-center justify-center gap-2">
                                        <button type="button" wire:click="removeExistingImage({{ $image['id'] }})"
                                            wire:confirm="Are you sure you want to remove this image?"
                                            class="p-1 bg-red-500 text-white rounded-full hover:bg-red-600">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach

                            <!-- New Images Preview -->
                            @if ($newImages)
                                @foreach ($newImages as $index => $image)
                                    <div class="relative group aspect-w-1 aspect-h-1">
                                        <img src="{{ $image->temporaryUrl() }}" loading="lazy"
                                            class="w-full h-full object-cover rounded-lg" alt="New image preview">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity
                                                flex items-center justify-center gap-2">
                                            <button type="button" wire:click="removeNewImage({{ $index }})"
                                                class="p-1 bg-red-500 text-white rounded-full hover:bg-red-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-end gap-4">
                    <x-button type="button" class="bg-gray-500 hover:bg-gray-600" wire:click="$dispatch('cancel')">
                        Cancel
                    </x-button>
                    <x-button type="submit" wire:loading.attr="disabled">
                        <span wire:loading wire:target="save">Saving...</span>
                        <span wire:loading.remove wire:target="save">
                            {{ $album_id ? 'Update Album' : 'Create Album' }}
                        </span>
                    </x-button>
                </div>
            </form>
        </div>
    </div>

    <!-- Required Scripts -->
    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    @endpush
</div>
