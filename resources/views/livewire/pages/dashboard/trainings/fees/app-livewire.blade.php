<div class="inline-block   ">
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
                                    @elseif ($row[$column] == '')
                                        -
                                    @else
                                        {{ $row[$column] }}
                                    @endif

                                </td>
                            @endforeach
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
</div>
