<!-- resources/views/livewire/newsletter/manage-newsletter-livewire.blade.php -->
<div class="p-6">
    <div class="flex gap-4 items-center mb-6">
        <x-button wire:click="create" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Create Newsletter
        </x-button>
        <x-button wire:click="toggleModel">
            Add Subscriber
        </x-button>
    </div>

    @if (session()->has('message'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif
    @if ($showForm)
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h3 class="text-xl font-semibold mb-4">
                {{ $editingNewsletterId ? 'Edit Newsletter' : 'Create Newsletter' }}
            </h3>

            <div>
                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Title</label>
                    <x-input type="text" wire:model="title" class="w-full border rounded px-3 py-2" />
                    @error('title')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Content</label>
                    <textarea wire:model="content" rows="5" class="w-full border rounded px-3 py-2"></textarea>
                    @error('content')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                {{-- <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Schedule (Optional)</label>
                    <input type="datetime-local" wire:model="scheduled_at" class="w-full border rounded px-3 py-2">
                    @error('scheduled_at')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div> --}}

                <div class="mb-4">
                    <label class="block text-gray-700 mb-2">Subscribers</label>
                    <div class="border rounded p-4 max-h-60 overflow-y-auto">
                        <div class="mb-4 space-y-2">
                            <x-input type="text" wire:model.live="search" placeholder="Search subscribers..."
                                class="w-full border rounded px-3 py-2 mb-2" />

                            <!-- Select All Option -->
                            <div class="flex items-center py-2 px-1 border-b">
                                <input type="checkbox" wire:click="toggleAllSubscribers"
                                    {{ count($selectedSubscribers) === $subscribers->count() ? 'checked' : '' }}
                                    class="mr-2" />
                                <span class="font-medium">Select All Subscribers</span>
                            </div>

                            <!-- Selected Count -->
                            <div class="text-sm text-gray-600 px-1">
                                {{ count($selectedSubscribers) }} of {{ $subscribers->count() }} subscribers selected
                            </div>
                        </div>

                        @foreach ($subscribers as $subscriber)
                            <div class="flex items-center mb-2 hover:bg-gray-50 p-1 rounded">
                                <x-checkbox type="checkbox" wire:model="selectedSubscribers"
                                    value="{{ $subscriber->id }}" class="mr-2" />
                                <span>{{ $subscriber->name }} ({{ $subscriber->email }})</span>
                            </div>
                        @endforeach
                    </div>
                    @error('selectedSubscribers')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex justify-end gap-4">
                    <button type="button" wire:click="resetForm" class="px-4 py-2 border rounded hover:bg-gray-100">
                        Cancel
                    </button>
                    <x-button type="submit" wire:click="save"
                        class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600" wire:loading.attr="disabled">
                        <div wire:loading.delay wire:target="save">Sending...</div>
                        <span wire:loading.remove wire:target="save">{{ $editingNewsletterId ? 'Update' : 'Create' }}</span>
                    </x-button>
                </div>
            </div>
        </div>
    @endif


    <div class="">
        <x-dialog-modal wire:model.live="openModel">
            <x-slot name="title">
                {{ __('Add New Subscriber') }}
            </x-slot>
            <x-slot name="content">
                <div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                        <x-input type="text" wire:model="subscriberName" class="w-full" />
                        @error('subscriberName')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <x-input type="email" wire:model="subscriberEmail" class="w-full" />
                        @error('subscriberEmail')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
                        <x-input type="text" wire:model="subscriberPhone" class="w-full" />
                        @error('subscriberPhone')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$toggle('openModel')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-button class="ms-3" wire:click="saveSubscriber" wire:loading.attr="disabled">
                    <div wire:loading.delay wire:target="saveSubscriber">Saving...</div>
                    <span wire:loading.remove wire:target="saveSubscriber">{{ __('Save & continue') }}</span>
                </x-button>
            </x-slot>
        </x-dialog-modal>

        <!-- CSV Import Section -->
        <div class="bg-white p-6 rounded-lg shadow mb-6">
            <h3 class="text-lg font-semibold mb-4">Import Subscribers</h3>
            <div class="mb-4">
                <div>
                    <div class="flex items-center gap-4">
                        <div class="flex-1">
                            <input type="file" wire:model="csvFile" class="w-full" accept=".csv" />
                            @error('csvFile')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>
                        <x-button type="submit" wire:click="importSubscribers" wire:loading.attr="disabled">
                            Import CSV
                        </x-button>
                    </div>
                </div>

                @if ($importProgress > 0)
                    <div class="mt-4">
                        <div class="w-full bg-gray-200 rounded-full h-2.5">
                            <div class="bg-blue-600 h-2.5 rounded-full" style="width: {{ $importProgress }}%"></div>
                        </div>
                        <p class="text-sm text-gray-600 mt-2">
                            Processed {{ $processedRows }} of {{ $totalRows }} rows
                        </p>
                    </div>
                @endif
            </div>

            <div class="text-sm text-gray-600">
                <p>CSV file should include the following columns:</p>
                <ul class="list-disc ml-5 mt-2">
                    <li>name</li>
                    <li>email (required)</li>
                    <li>phone</li>
                </ul>
            </div>
        </div>
    </div>


    <div class="inline-block min-w-full  ">
        <div
            class="overflow-hidden bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg">
            <div class="mb-4 p-4">
                <x-input type="text" wire:model.live.debounce.300ms="search" placeholder="Search..."
                    class="w-full" />
            </div>
            <div class="relative overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-wedic-blue-800">
                        <tr>
                            <th
                                class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Title</th>
                            <th
                                class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Status</th>
                            <th
                                class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Recipients</th>
                            <th
                                class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Scheduled</th>
                            <th
                                class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach ($newsletters as $newsletter)
                            <tr class="hover:cursor-pointer hover:dark:bg-wedic-blue-800 hover:bg-gray-100 break-all">
                                <td
                                    class="px-4 py-4 text-xs text-gray-500 break-all  dark:text-gray-300 whitespace-nowrap capitalize">
                                    {{ $newsletter->title }}</td>
                                <td
                                    class="px-4 py-4 text-xs text-gray-500 break-all  dark:text-gray-300 whitespace-nowrap capitalize">
                                    <span
                                        class="px-2 py-1 rounded text-sm
                                {{ $newsletter->status === 'sent'
                                    ? 'bg-green-100 text-green-800'
                                    : ($newsletter->status === 'scheduled'
                                        ? 'bg-blue-100 text-blue-800'
                                        : 'bg-gray-100 text-gray-800') }}">
                                        {{ ucfirst($newsletter->status) }}
                                    </span>
                                </td>
                                <td
                                    class="px-4 py-4 text-xs text-gray-500 break-all  dark:text-gray-300 whitespace-nowrap capitalize">
                                    {{ $newsletter->subscribers->count() }}</td>
                                <td
                                    class="px-4 py-4 text-xs text-gray-500 break-all  dark:text-gray-300 whitespace-nowrap capitalize">
                                    {{ $newsletter->scheduled_at?->format('Y-m-d H:i') ?? 'N/A' }}
                                </td>
                                <td
                                    class="px-4 py-4 text-xs text-gray-500 break-all  dark:text-gray-300 whitespace-nowrap capitalize">
                                    <button wire:click="edit({{ $newsletter->id }})"
                                        class="text-blue-500 hover:text-blue-700 mr-2">
                                        Edit
                                    </button>
                                    <button wire:click="delete({{ $newsletter->id }})"
                                        class="text-red-500 hover:text-red-700"
                                        onclick="confirm('Are you sure?') || event.stopImmediatePropagation()">
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="p-4">
                    {{ $newsletters->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
