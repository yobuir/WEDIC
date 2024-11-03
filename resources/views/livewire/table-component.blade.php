<div class="inline-block min-w-full  ">
    <div class="overflow-hidden bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <div class="mb-4 p-4">
            <x-input type="text" wire:model.live.debounce.300ms="search" placeholder="Search..." class="w-full" />
        </div>
        <div class="relative overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-wedic-blue-800">
                    <tr>
                        @foreach ($columns as $column)
                            <th scope="col" wire:key="{{ $loop->index + 1 }}"
                                class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                <button wire:click="sortByC('{{ $column }}')"
                                    class="uppercase flex gap-2 items-center">
                                    @if ($column == 'category_id')
                                        Category
                                    @elseif ($column == 'featured_image')
                                        Image
                                    @elseif ($column == 'duration')
                                        duration (Months)
                                    @elseif ($column == 'role_id')
                                        Role
                                    @elseif ($column == 'user_id')
                                        User
                                    @else
                                        {{ $column }}
                                    @endif

                                    @if ($sortBy === $column)
                                        @if ($sortDirection === 'asc')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                            </svg>
                                        @elseif ($sortDirection === 'desc')
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        @endif
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                        </svg>
                                    @endif
                                </button>
                            </th>
                        @endforeach
                        <th scope="col"
                            class="px-4 uppercase py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody
                    class="bg-white text-xs  divide-y divide-gray-200 dark:divide-gray-700 border-0 dark:bg-gray-900">
                    @forelse ($data as $row)
                        <tr wire:key="{{ $loop->index + 1 }}" wire:click="Modify('{{ $row['id'] }}')"
                            class="hover:cursor-pointer hover:dark:bg-wedic-blue-800 hover:bg-gray-100 break-all">
                            @foreach ($columns as $column)
                                <td
                                    class="px-4 py-4 text-xs text-gray-500 break-all  dark:text-gray-300 whitespace-nowrap capitalize">
                                    @if ($column == 'status')
                                        @if ($row[$column] == 'archived')
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-orange-500 bg-orange-100/60 dark:bg-wedic-blue-800">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="text-xs font-normal">{{ $row[$column] }}</span>
                                            </div>
                                        @elseif ($row[$column] == 'draft')
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-gray-500 bg-gray-100/60 dark:bg-wedic-blue-800">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="text-xs font-normal">{{ $row[$column] }}</span>
                                            </div>
                                        @elseif ($row[$column] == 'published')
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-emerald-500 bg-emerald-100/60 dark:bg-wedic-blue-800">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="text-xs font-normal">{{ $row[$column] }}</span>

                                            </div>
                                        @elseif ($row[$column] == 'reviewed')
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-blue-500 bg-blue-100/60 dark:bg-wedic-blue-800">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="text-xs font-normal">{{ $row[$column] }}</span>
                                            </div>
                                        @elseif ($row[$column] == 'pending')
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-gray-500 bg-gray-100/60 dark:bg-wedic-blue-800">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10 3L4.5 8.5L2 6" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                </svg>
                                                <span class="text-xs font-normal">{{ $row[$column] }}</span>
                                            </div>
                                        @elseif ($row[$column] == 'completed')
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-blue-500 bg-blue-100/60 dark:bg-wedic-blue-800">
                                                <span class="text-xs font-normal">{{ $row[$column] }}</span>
                                            </div>
                                        @else
                                            <div
                                                class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 text-red-500 bg-red-100/60 dark:bg-wedic-blue-800">
                                                <span class="text-xs font-normal">{{ $row[$column] }}</span>
                                            </div>
                                        @endif
                                    @elseif ($column == 'created_by')
                                        {{ $row->createdBy?->name }}
                                    @elseif ($column == 'updated_by')
                                        {{ $row->updatedBy?->name }}
                                    @elseif ($column == 'featured_image')
                                        <img src="{{ $row[$column] }}" class="max-w-2o max-h-20 rounded-lg" />
                                    @elseif ($column == 'profile')
                                        <img src="{{ $row[$column] }}" class="max-w-2o max-h-20 rounded-lg" />
                                    @elseif ($column == 'logo')
                                        <img src="{{ $row[$column] }}" class="max-w-2o max-h-20 rounded-lg" />
                                    @elseif ($column == 'url')
                                        <a href="{{ $row[$column] }}" class="underline text-blue-500"
                                            target="__blank">Web Link</a>
                                    @elseif ($column == 'category_id')
                                        {{ $row->category?->name }}
                                    @elseif ($column == 'created_at')
                                        {{ $row[$column]?->diffForHumans() }}
                                    @elseif ($column == 'role_id')
                                        {{ $row->role?->name }}
                                    @elseif ($column == 'user_id')
                                        {{ $row->user?->name }}
                                    @elseif ($row[$column] == '')
                                        -
                                    @else
                                        {{ $row[$column] }}
                                    @endif

                                </td>
                            @endforeach
                            <td
                                class="px-4 py-4 text-xs text-gray-500 dark:text-gray-300 whitespace-nowrap capitalize">
                                <x-secondary-button wire:click="Modify('{{ $row['id'] }}')">
                                    <span wire:loading.remove wire:target="Modify('{{ $row['id'] }}')">

                                        Modify</span>
                                    <span wire:loading wire:target="Modify('{{ $row['id'] }}')">loading...</span>
                                </x-secondary-button>
                            </td>
                        </tr>
                    @empty
                        <tr class="hover:cursor-pointer dark:bg-wedic-blue-800  w-full">
                            <td class="p-6  flex justify-center items-center w-full" colspan="12" rowspan="12">
                                <div class=" flex flex-row  dark:text-gray-400 font-extralight text-xs gap-4">
                                    <div class="">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 13.5h3.86a2.25 2.25 0 0 1 2.012 1.244l.256.512a2.25 2.25 0 0 0 2.013 1.244h3.218a2.25 2.25 0 0 0 2.013-1.244l.256-.512a2.25 2.25 0 0 1 2.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 0 0-2.15-1.588H6.911a2.25 2.25 0 0 0-2.15 1.588L2.35 13.177a2.25 2.25 0 0 0-.1.661Z" />
                                        </svg>
                                    </div>
                                    <div class="">
                                        No data available
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-4 px-4 pb-2">
            {{ $data->links() }}
        </div>
    </div>



    <x-dialog-modal wire:model.live="openModel">
        <x-slot name="title">
            @if ($customData)
                {{ $customData->name }} ({{ $customData->email }})
            @else
                {{ __('Disabled') }}
            @endif
        </x-slot>

        <x-slot name="content">
            <div class="">
                @if ($customData)
                    {{ $customData->message }}
                @else
                    <div class="p-4 md:p-5 text-center">
                        <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        <h3 class="mb-5 text-base font-normal text-gray-500 dark:text-gray-400">
                            This Action can't be perfomed
                        </h3>
                    </div>
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('openModel')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
</div>
