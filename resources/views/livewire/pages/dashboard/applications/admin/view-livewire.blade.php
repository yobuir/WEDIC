<div class="inline-block min-w-full  ">
    <div class="overflow-hidden bg-gray-50 dark:bg-wedic-blue-800 border border-gray-200 dark:border-gray-700 md:rounded-lg">
        <div class="mb-4 p-4 flex flex-row gap-2">
            <div class="flex-1">
                <x-input type="text" wire:model.live.debounce.300ms="search" placeholder="Search..." class="w-full" />
            </div>
            <div class="">
                <select wire:model.live="applicationStatusFilter"
                    class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">
                    <option value="">Filter </option>
                    <option value="accepted">Aaccepted </option>
                    <option value="paid">Paid </option>
                    <option value="rejected">Rejected </option>
                    <option value="pending">Pending </option>
                    <option>Failed </option>
                </select>
            </div>
        </div>
        <div class="relative overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-wedic-blue-800">
                    <tr>
                        <th scope="col"
                            class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <button wire:click="sortByC('id')" class="uppercase flex gap-2 items-center">
                                Id
                                @if ($sortDirection === 'asc' and $sortBy == 'id')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @elseif ($sortDirection === 'desc' and $sortBy == 'id')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                @endif
                            </button>
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <button wire:click="sortByC('name')" class="uppercase flex gap-2 items-center">
                                Name
                                @if ($sortDirection === 'asc' and $sortBy == 'name')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @elseif ($sortDirection === 'desc' and $sortBy == 'name')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                @endif
                            </button>
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <button wire:click="sortByC('email')" class="uppercase flex gap-2 items-center">
                                Email
                                @if ($sortDirection === 'asc' and $sortBy == 'email')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @elseif ($sortDirection === 'desc' and $sortBy == 'email')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                @endif
                            </button>
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <button wire:click="sortByC('created_at')" class="uppercase flex gap-2 items-center">
                                Application date
                                @if ($sortDirection === 'asc' and $sortBy == 'created_at')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @elseif ($sortDirection === 'desc' and $sortBy == 'created_at')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                @endif
                            </button>
                        </th>

                        <th scope="col"
                            class="px-4 py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <button wire:click="sortByC('status')" class="uppercase flex gap-2 items-center">
                                Application status
                                @if ($sortDirection === 'asc' and $sortBy == 'status')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                                    </svg>
                                @elseif ($sortDirection === 'desc' and $sortBy == 'status')
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                    </svg>
                                @else
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M8.25 15 12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                                    </svg>
                                @endif
                            </button>
                        </th>
                        <th scope="col"
                            class="px-4 uppercase py-3.5 text-xs font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody
                    class="bg-white text-xs  divide-y divide-gray-200 dark:divide-gray-700 border-0 dark:bg-gray-900">
                    @forelse ($data as $item)
                        <tr wire:key="{{ $loop->index + 1 }}"
                            class="hover:cursor-pointer hover:dark:bg-wedic-blue-800 hover:bg-gray-100 break-all">

                            <td
                                class="px-4 py-4 text-xs text-gray-500 dark:text-gray-300 whitespace-nowrap capitalize">
                                {{ $item->name }}
                            </td>
                            <td class="px-4 py-4 text-xs text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                {{ $item->email }}
                            </td>
                            <td
                                class="px-4 py-4 text-xs text-gray-500 dark:text-gray-300 whitespace-nowrap capitalize">
                                {{ $item->telephone }}
                            </td>
                            <td
                                class="px-4 py-4 text-xs text-gray-500 dark:text-gray-300 whitespace-nowrap capitalize">
                                {{ $item->created_at?->format('Y-M-d h:m') }}
                            </td>
                            <td
                                class="px-4 py-4 text-xs text-gray-500 dark:text-gray-300 whitespace-nowrap capitalize">
                                {{ $item->application_status }}
                            </td>
                            <td
                                class="px-4 py-4 text-xs text-gray-500 dark:text-gray-300 whitespace-nowrap capitalize">
                                <x-secondary-button wire:click="Modify('{{ $item['id'] }}')">
                                    View details
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
            Applicant Details
        </x-slot>
        <x-slot name="content">
            <div class="">
                <div class="container mx-auto p-4">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="flex flex-col gap-2">
                            <h3 class="text-base font-semibold">Personal Information</h3>
                            <p class="text-xs"><strong>Name:</strong> {{ $name }}</p>
                            <p class="text-xs"><strong>Email:</strong> {{ $email }}</p>
                            <p class="text-xs"><strong>Telephone:</strong> {{ $telephone }}</p>
                            <p class="text-xs"><strong>Address:</strong> {{ $address }}</p>
                            <p class="text-xs"><strong>Date of Birth:</strong> {{ $date_of_birth }}</p>
                            <p class="text-xs"><strong>Gender:</strong> {{ ucfirst($gender) }}</p>
                            <p class="text-xs"><strong>Passport:</strong> {{ $passport }}</p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <h3 class="text-Base font-semibold">Educational Information</h3>
                            <div class="text-xs flex flex-col gap-2"><strong>Degree:</strong>
                                <div class="flex mt-3 mb-4">
                                    <a href="javascript:void(0);"
                                        class="bg-gray-200 border-dotted dark:bg-gray-900 dark:border-gray-700 py-2 px-3 rounded-lg border border-gray-300 items-center gap-2 flex hover:cursor-pointer dark:hover:bg-wedic-blue-800 hover:bg-gray-300"
                                        onclick="openFileModal('{{ $this->degree }}')" type="buttom">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <span>Degree File previ..</span>
                                    </a>
                                </div>
                            </div>
                            <p class="text-xs"><strong>School:</strong> {{ $school }}</p>
                            <p class="text-xs"><strong>Field of Study:</strong> {{ $field }}</p>
                            <p class="text-xs"><strong>Graduation Date:</strong> {{ $graduation }}</p>
                            <p class="text-xs"><strong>Skills:</strong> {{ $skills }}</p>
                            <p class="text-xs"><strong>Experience:</strong> {{ $experience }} years</p>
                            <p class="text-xs"><strong>Language:</strong> {{ $language }}</p>
                        </div>

                        <div class="flex flex-col gap-2">
                            <h3 class="text-base font-semibold">Professional Information</h3>
                            <div class="text-xs flex flex-col gap-2"><strong>Resume:</strong>
                                <div class="flex  mt-3 mb-4">
                                    <a href="javascript:void(0);"
                                        class="bg-gray-200 border-dotted dark:bg-gray-900 dark:border-gray-700 py-2 px-3 rounded-lg border border-gray-300 items-center gap-2 flex hover:cursor-pointer dark:hover:bg-wedic-blue-800 hover:bg-gray-300"
                                        onclick="openFileModal('{{ $this->resume }}')" type="buttom">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                                        </svg>
                                        <span>Resume File previ..</span>
                                    </a>
                                </div>
                            </div>
                            <p class="text-xs"><strong>Portfolio:</strong> <a href="{{ $portfolio }}"
                                    target="_blank">{{ $portfolio }}</a></p>
                            <p class="text-xs"><strong>LinkedIn:</strong> <a href="{{ $linkedin }}"
                                    target="_blank">{{ $linkedin }}</a></p>
                            <p class="text-xs"><strong>GitHub:</strong> <a href="{{ $github }}"
                                    target="_blank">{{ $github }}</a></p>
                        </div>
                        @if (auth()->user()->isAdmin())
                            <form wire:submit.prevent="UpdateStatus" class="flex flex-col gap-2 mt-4">
                                <h3 class="text-Base font-semibold">Update status</h3>
                                <div class="flex flex-1">
                                    <select wire:model.live="status"
                                        class="border-gray-300 w-full dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-blue-500 dark:focus:border-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 rounded-md shadow-sm">
                                        <option value="">Choose status </option>
                                        <option value="accepted">Accepted </option>
                                        <option value="paid">Paid </option>
                                        <option value="rejected">Rejected </option>
                                        <option value="pending">Pending </option>
                                        <option>Failed </option>
                                    </select>
                                    <div class="">
                                        <x-secondary-button type="submit">
                                            Save
                                        </x-secondary-button>
                                    </div>

                                </div>

                            </form>
                        @endif
                    </div>
                </div>

            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$toggle('openModel')" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>



    <!-- Add these in your HTML layout -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

    <script>
        function openFileModal(url) {
            $.magnificPopup.open({
                items: {
                    src: url,
                },
                type: 'iframe',
            });
        }
    </script>
</div>
