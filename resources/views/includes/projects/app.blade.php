@if ($project)
    <div class="bg-gray-100 min-h-screen">

        <div class="justify-center flex-1 max-w-6xl py-4 mx-auto lg:py-6 md:px-6">
            <div class="px-4 mb-10 md:text-center md:mb-20">
                <p class="mb-2 text-lg font-semibold text-secondary-500 dark:text-gray-400">
                    Helping Today
                </p>
                <h2 class="pb-2 text-2xl font-bold text-wedic-blue-500 md:text-4xl dark:text-wedic-blue-500">
                    What we are doing
                </h2>
            </div>
            <div class="flex flex-wrap items-center">
                <div class="w-full px-4 mb-10 md:w-1/2 lg:mb-0 ">
                    <h2 class="mb-4 text-2xl font-bold text-gray-700 dark:text-gray-300">
                        {{ $project?->title }}
                    </h2>
                    <ul class="">
                        <li class="flex items-center mb-4 text-base text-gray-600 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" class="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            {{ $project?->location }}
                        </li>
                        <li class="flex items-center mb-4 text-base text-gray-600 dark:text-gray-400">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" strokeWidth={1.5}
                                stroke="currentColor" class="w-6 h-6">
                                <path strokeLinecap="round" strokeLinejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z" />
                            </svg>
                            {{ $project?->created_at?->format('M-D-Y') }}
                        </li>
                    </ul>
                    <a wire:navigate href="{{ route('project', $project->slug) }}"
                        class="font-bold py-2 text-wedic-blue-500 underline hover:underline">
                        Learn more
                    </a>
                </div>
                <div class="relative w-full px-4 mb-10 md:w-1/2 lg:mb-0">
                    <img src={{ $project?->featured_image }} alt="{{ $project?->title }}"
                        class="relative z-40 object-cover w-full rounded-md md:h-96 h-44" />
                    <div class="absolute top-0 right-0 items-center justify-center hidden -mt-16 lg:inline-flex">
                        <svg width="290" height="166" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <mask id="a" style='mask-type:alpha' maskUnits="userSpaceOnUse" x="0" y="0"
                                width="290" height="166">
                                <path fill="url(#paint0_linear_228_431)" d="M0 0H290V165.838H0z" />
                            </mask>
                            <g mask="url(#a)" fillRule="evenodd" clipRule="evenodd">
                                <path
                                    d="M-.146 77.865c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zm21.236-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm16.185 2.468c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zm21.236-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm72.314 2.468c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.395 0-2.525-1.105-2.525-2.469zm-18.709 0c0-1.363 1.13-2.468 2.524-2.468 1.395 0 2.525 1.105 2.525 2.468 0 1.364-1.13 2.469-2.525 2.469-1.394 0-2.524-1.105-2.524-2.469zm-16.187-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.525-1.105-2.525-2.469zm58.655-16.824c-1.395 0-2.525 1.105-2.525 2.468 0 1.364 1.13 2.469 2.525 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.524-2.468 1.395 0 2.525 1.105 2.525 2.468 0 1.364-1.13 2.469-2.525 2.469-1.394 0-2.524-1.105-2.524-2.469zm-16.187-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.525-1.105-2.525-2.469zm-16.184-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.236 2.468c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zM21.09 61.041c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zM-.146 63.509c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zM133.35 46.684c-1.395 0-2.525 1.106-2.525 2.469 0 1.363 1.13 2.469 2.525 2.469 1.394 0 2.524-1.106 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.469c0-1.363 1.13-2.468 2.524-2.468 1.395 0 2.525 1.105 2.525 2.468s-1.13 2.469-2.525 2.469c-1.394 0-2.524-1.106-2.524-2.469zm-16.187-2.468c-1.394 0-2.524 1.105-2.524 2.468s1.13 2.469 2.524 2.469c1.394 0 2.524-1.106 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468s-1.13 2.469-2.524 2.469c-1.394 0-2.525-1.106-2.525-2.469zm-16.184-2.468c-1.394 0-2.524 1.105-2.524 2.468s1.13 2.469 2.524 2.469c1.394 0 2.524-1.106 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.236 2.468c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468s-1.13 2.469-2.524 2.469c-1.394 0-2.524-1.106-2.524-2.469zM21.09 46.685c-1.394 0-2.524 1.105-2.524 2.468s1.13 2.469 2.524 2.469c1.394 0 2.524-1.106 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zM-.146 49.153c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468s-1.13 2.469-2.524 2.469c-1.394 0-2.524-1.106-2.524-2.469zM133.35 32.328c-1.395 0-2.525 1.105-2.525 2.469 0 1.363 1.13 2.468 2.525 2.468 1.394 0 2.524-1.105 2.524-2.468s-1.13-2.469-2.524-2.469zm-21.234 2.469c0-1.363 1.13-2.469 2.524-2.469 1.395 0 2.525 1.105 2.525 2.469 0 1.363-1.13 2.468-2.525 2.468-1.394 0-2.524-1.105-2.524-2.468zm-16.187-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468s-1.13-2.469-2.525-2.469zm-21.234 2.469c0-1.363 1.13-2.469 2.525-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.525-1.105-2.525-2.468zm-16.184-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468s-1.13-2.469-2.524-2.469zm-21.236 2.469c0-1.363 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zM21.09 32.328c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468s-1.13-2.469-2.524-2.469zM-.146 34.797c0-1.363 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zM133.35 17.972c-1.395 0-2.525 1.105-2.525 2.469 0 1.363 1.13 2.468 2.525 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.234 2.469c0-1.364 1.13-2.469 2.524-2.469 1.395 0 2.525 1.105 2.525 2.469 0 1.363-1.13 2.468-2.525 2.468-1.394 0-2.524-1.105-2.524-2.468zm-16.187-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468 0-1.364-1.13-2.469-2.525-2.469zm-21.234 2.469c0-1.364 1.13-2.469 2.525-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.525-1.105-2.525-2.468zm-16.184-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.236 2.469c0-1.364 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zM21.09 17.972c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zM-.146 20.441c0-1.364 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zM133.35 3.619c-1.395 0-2.525 1.105-2.525 2.468 0 1.364 1.13 2.469 2.525 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.524-2.468 1.395 0 2.525 1.105 2.525 2.468 0 1.364-1.13 2.469-2.525 2.469-1.394 0-2.524-1.105-2.524-2.469zM95.929 3.62c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469 0-1.363-1.13-2.468-2.525-2.468zM74.695 6.087c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.525-1.105-2.525-2.469zM58.511 3.62c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zM37.275 6.087c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zM21.09 3.62c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zM-.146 6.087c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469z"
                                    fill="url(#paint1_linear_228_431)" />
                                <path
                                    d="M-.146 163.37c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zm21.236-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm16.185 2.468c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zm21.236-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm72.314 2.468c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.395 0-2.525-1.105-2.525-2.469zm-18.709 0c0-1.363 1.13-2.468 2.524-2.468 1.395 0 2.525 1.105 2.525 2.468 0 1.364-1.13 2.469-2.525 2.469-1.394 0-2.524-1.105-2.524-2.469zm-16.187-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.525-1.105-2.525-2.469zm58.655-16.824c-1.395 0-2.525 1.105-2.525 2.468s1.13 2.469 2.525 2.469c1.394 0 2.524-1.106 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.524-2.468 1.395 0 2.525 1.105 2.525 2.468s-1.13 2.469-2.525 2.469c-1.394 0-2.524-1.106-2.524-2.469zm-16.187-2.468c-1.394 0-2.524 1.105-2.524 2.468s1.13 2.469 2.524 2.469c1.394 0 2.524-1.106 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.525-1.105-2.525-2.469zm-16.184-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.236 2.468c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zm-16.185-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.236 2.468c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zm133.496-16.825c-1.395 0-2.525 1.105-2.525 2.469 0 1.363 1.13 2.468 2.525 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.234 2.469c0-1.364 1.13-2.469 2.524-2.469 1.395 0 2.525 1.105 2.525 2.469 0 1.363-1.13 2.468-2.525 2.468-1.394 0-2.524-1.105-2.524-2.468zm-16.187-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.234 2.469c0-1.364 1.13-2.469 2.525-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.525-1.105-2.525-2.468zm-16.184-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.236 2.469c0-1.364 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zm-16.185-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.236 2.469c0-1.364 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zm133.496-16.825c-1.395 0-2.525 1.105-2.525 2.469 0 1.363 1.13 2.468 2.525 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.234 2.469c0-1.364 1.13-2.469 2.524-2.469 1.395 0 2.525 1.105 2.525 2.469 0 1.363-1.13 2.468-2.525 2.468-1.394 0-2.524-1.105-2.524-2.468zm-16.187-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468 0-1.364-1.13-2.469-2.525-2.469zm-21.234 2.469c0-1.364 1.13-2.469 2.525-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.525-1.105-2.525-2.468zm-16.184-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.236 2.469c0-1.364 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zm-16.185-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.236 2.469c0-1.364 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zm133.496-16.825c-1.395 0-2.525 1.105-2.525 2.469 0 1.363 1.13 2.468 2.525 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.234 2.469c0-1.364 1.13-2.469 2.524-2.469 1.395 0 2.525 1.105 2.525 2.469 0 1.363-1.13 2.468-2.525 2.468-1.394 0-2.524-1.105-2.524-2.468zm-16.187-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468 0-1.364-1.13-2.469-2.525-2.469zm-21.234 2.469c0-1.364 1.13-2.469 2.525-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.525-1.105-2.525-2.468zm-16.184-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.236 2.469c0-1.364 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zm-16.185-2.469c-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.524-1.105 2.524-2.468 0-1.364-1.13-2.469-2.524-2.469zm-21.236 2.469c0-1.364 1.13-2.469 2.524-2.469 1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468zM133.35 89.124c-1.395 0-2.525 1.105-2.525 2.468 0 1.364 1.13 2.469 2.525 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.524-2.468 1.395 0 2.525 1.105 2.525 2.468 0 1.364-1.13 2.469-2.525 2.469-1.394 0-2.524-1.105-2.524-2.469zm-16.187-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469 0-1.363-1.13-2.468-2.525-2.468zm-21.234 2.468c0-1.363 1.13-2.468 2.525-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.525-1.105-2.525-2.469zm-16.184-2.468c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zm-21.236 2.468c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469zM21.09 89.124c-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.524-1.105 2.524-2.469 0-1.363-1.13-2.468-2.524-2.468zM-.146 91.592c0-1.363 1.13-2.468 2.524-2.468 1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469z"
                                    fill="url(#paint2_linear_228_431)" />
                                <path
                                    d="M284.472 77.866c0-1.363-1.131-2.469-2.525-2.469s-2.524 1.106-2.524 2.469c0 1.363 1.13 2.469 2.524 2.469 1.394 0 2.525-1.106 2.525-2.47zm-21.237-2.469c1.394 0 2.524 1.106 2.524 2.469 0 1.363-1.13 2.469-2.524 2.469-1.394 0-2.524-1.106-2.524-2.47 0-1.362 1.13-2.468 2.524-2.468zm-16.184 2.469c0-1.363-1.131-2.469-2.525-2.469s-2.524 1.106-2.524 2.469c0 1.363 1.13 2.469 2.524 2.469 1.394 0 2.525-1.106 2.525-2.47zm-21.237-2.469c1.394 0 2.525 1.106 2.525 2.469 0 1.363-1.131 2.469-2.525 2.469s-2.524-1.106-2.524-2.47c0-1.362 1.13-2.468 2.524-2.468zM153.5 77.866c0-1.363-1.13-2.469-2.524-2.469-1.395 0-2.525 1.106-2.525 2.469 0 1.363 1.13 2.469 2.525 2.469 1.394 0 2.524-1.106 2.524-2.47zm18.709 0c0-1.363-1.13-2.469-2.524-2.469-1.394 0-2.525 1.106-2.525 2.469 0 1.363 1.131 2.469 2.525 2.469s2.524-1.106 2.524-2.47zm16.187-2.469c1.394 0 2.525 1.106 2.525 2.469 0 1.363-1.131 2.469-2.525 2.469s-2.524-1.106-2.524-2.47c0-1.362 1.13-2.468 2.524-2.468zm21.234 2.469c0-1.363-1.13-2.469-2.525-2.469-1.394 0-2.524 1.106-2.524 2.469 0 1.363 1.13 2.469 2.524 2.469 1.395 0 2.525-1.106 2.525-2.47zM150.976 61.04c1.394 0 2.524 1.106 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.395 0-2.525-1.105-2.525-2.468s1.13-2.469 2.525-2.469zm21.233 2.469c0-1.363-1.13-2.469-2.524-2.469-1.394 0-2.525 1.106-2.525 2.469 0 1.363 1.131 2.468 2.525 2.468s2.524-1.105 2.524-2.468zm16.187-2.469c1.394 0 2.525 1.106 2.525 2.469 0 1.363-1.131 2.468-2.525 2.468s-2.524-1.105-2.524-2.468 1.13-2.469 2.524-2.469zm21.234 2.469c0-1.363-1.13-2.469-2.525-2.469-1.394 0-2.524 1.106-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.395 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.525 1.106 2.525 2.469 0 1.363-1.131 2.468-2.525 2.468s-2.524-1.105-2.524-2.468 1.13-2.469 2.524-2.469zm21.237 2.469c0-1.363-1.131-2.469-2.525-2.469s-2.524 1.106-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.524 1.106 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468s1.13-2.469 2.524-2.469zm21.237 2.469c0-1.363-1.131-2.469-2.525-2.469s-2.524 1.106-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zM150.976 46.685c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.47-2.524 2.47-1.395 0-2.525-1.106-2.525-2.47 0-1.363 1.13-2.468 2.525-2.468zm21.233 2.468c0-1.363-1.13-2.468-2.524-2.468-1.394 0-2.525 1.105-2.525 2.468 0 1.364 1.131 2.47 2.525 2.47s2.524-1.106 2.524-2.47zm16.187-2.468c1.394 0 2.525 1.105 2.525 2.468 0 1.364-1.131 2.47-2.525 2.47s-2.524-1.106-2.524-2.47c0-1.363 1.13-2.468 2.524-2.468zm21.234 2.468c0-1.363-1.13-2.468-2.525-2.468-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.47 2.524 2.47 1.395 0 2.525-1.106 2.525-2.47zm16.184-2.468c1.394 0 2.525 1.105 2.525 2.468 0 1.364-1.131 2.47-2.525 2.47s-2.524-1.106-2.524-2.47c0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.47 2.524 2.47 1.394 0 2.525-1.106 2.525-2.47zm16.184-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.47-2.524 2.47-1.394 0-2.524-1.106-2.524-2.47 0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.47 2.524 2.47 1.394 0 2.525-1.106 2.525-2.47zM150.976 32.33c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.395 0-2.525-1.105-2.525-2.469 0-1.363 1.13-2.468 2.525-2.468zm21.233 2.468c0-1.363-1.13-2.468-2.524-2.468-1.394 0-2.525 1.105-2.525 2.468 0 1.364 1.131 2.469 2.525 2.469s2.524-1.105 2.524-2.469zm16.187-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469 0-1.363 1.13-2.468 2.524-2.468zm21.234 2.468c0-1.363-1.13-2.468-2.525-2.468-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.395 0 2.525-1.105 2.525-2.469zm16.184-2.468c1.394 0 2.525 1.105 2.525 2.468 0 1.364-1.131 2.469-2.525 2.469s-2.524-1.105-2.524-2.469c0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zm16.184-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469 0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zM150.976 17.973c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.395 0-2.525-1.105-2.525-2.469 0-1.363 1.13-2.468 2.525-2.468zm21.233 2.468c0-1.363-1.13-2.468-2.524-2.468-1.394 0-2.525 1.105-2.525 2.468 0 1.364 1.131 2.469 2.525 2.469s2.524-1.105 2.524-2.469zm16.187-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469 0-1.363 1.13-2.468 2.524-2.468zm21.234 2.468c0-1.363-1.13-2.468-2.525-2.468-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.395 0 2.525-1.105 2.525-2.469zm16.184-2.468c1.394 0 2.525 1.105 2.525 2.468 0 1.364-1.131 2.469-2.525 2.469s-2.524-1.105-2.524-2.469c0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zm16.184-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469 0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zM150.976 3.62c1.394 0 2.524 1.106 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.395 0-2.525-1.105-2.525-2.468s1.13-2.469 2.525-2.469zm21.233 2.469c0-1.363-1.13-2.469-2.524-2.469-1.394 0-2.525 1.106-2.525 2.469 0 1.363 1.131 2.468 2.525 2.468s2.524-1.105 2.524-2.468zm16.187-2.469c1.394 0 2.524 1.106 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468s1.13-2.469 2.524-2.469zm21.234 2.469c0-1.363-1.13-2.469-2.525-2.469-1.394 0-2.524 1.106-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.395 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.525 1.106 2.525 2.469 0 1.363-1.131 2.468-2.525 2.468s-2.524-1.105-2.524-2.468 1.13-2.469 2.524-2.469zm21.237 2.469c0-1.363-1.131-2.469-2.525-2.469s-2.524 1.106-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.524 1.106 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468s1.13-2.469 2.524-2.469zm21.237 2.469c0-1.363-1.131-2.469-2.525-2.469s-2.524 1.106-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468z"
                                    fill="url(#paint3_linear_228_431)" />
                                <path
                                    d="M284.472 163.37c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zm-21.237-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469 0-1.363 1.13-2.468 2.524-2.468zm-16.184 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zm-21.237-2.468c1.394 0 2.525 1.105 2.525 2.468 0 1.364-1.131 2.469-2.525 2.469s-2.524-1.105-2.524-2.469c0-1.363 1.13-2.468 2.524-2.468zM153.5 163.37c0-1.363-1.13-2.468-2.524-2.468-1.395 0-2.525 1.105-2.525 2.468 0 1.364 1.13 2.469 2.525 2.469 1.394 0 2.524-1.105 2.524-2.469zm18.709 0c0-1.363-1.13-2.468-2.524-2.468-1.394 0-2.525 1.105-2.525 2.468 0 1.364 1.131 2.469 2.525 2.469s2.524-1.105 2.524-2.469zm16.187-2.468c1.394 0 2.525 1.105 2.525 2.468 0 1.364-1.131 2.469-2.525 2.469s-2.524-1.105-2.524-2.469c0-1.363 1.13-2.468 2.524-2.468zm21.234 2.468c0-1.363-1.13-2.468-2.525-2.468-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.395 0 2.525-1.105 2.525-2.469zm-58.654-16.824c1.394 0 2.524 1.105 2.524 2.468s-1.13 2.469-2.524 2.469c-1.395 0-2.525-1.106-2.525-2.469 0-1.363 1.13-2.468 2.525-2.468zm21.233 2.468c0-1.363-1.13-2.468-2.524-2.468-1.394 0-2.525 1.105-2.525 2.468s1.131 2.469 2.525 2.469 2.524-1.106 2.524-2.469zm16.187-2.468c1.394 0 2.525 1.105 2.525 2.468s-1.131 2.469-2.525 2.469-2.524-1.106-2.524-2.469c0-1.363 1.13-2.468 2.524-2.468zm21.234 2.468c0-1.363-1.13-2.468-2.525-2.468-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.395 0 2.525-1.105 2.525-2.469zm16.184-2.468c1.394 0 2.525 1.105 2.525 2.468 0 1.364-1.131 2.469-2.525 2.469s-2.524-1.105-2.524-2.469c0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zm16.184-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469 0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zm-133.496-16.825c1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.395 0-2.525-1.105-2.525-2.468 0-1.364 1.13-2.469 2.525-2.469zm21.233 2.469c0-1.364-1.13-2.469-2.524-2.469-1.394 0-2.525 1.105-2.525 2.469 0 1.363 1.131 2.468 2.525 2.468s2.524-1.105 2.524-2.468zm16.187-2.469c1.394 0 2.525 1.105 2.525 2.469 0 1.363-1.131 2.468-2.525 2.468s-2.524-1.105-2.524-2.468c0-1.364 1.13-2.469 2.524-2.469zm21.234 2.469c0-1.364-1.13-2.469-2.525-2.469-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.395 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.525 1.105 2.525 2.469 0 1.363-1.131 2.468-2.525 2.468s-2.524-1.105-2.524-2.468c0-1.364 1.13-2.469 2.524-2.469zm21.237 2.469c0-1.364-1.131-2.469-2.525-2.469s-2.524 1.105-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468 0-1.364 1.13-2.469 2.524-2.469zm21.237 2.469c0-1.364-1.131-2.469-2.525-2.469s-2.524 1.105-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zm-133.496-16.825c1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.395 0-2.525-1.105-2.525-2.468 0-1.364 1.13-2.469 2.525-2.469zm21.233 2.469c0-1.364-1.13-2.469-2.524-2.469-1.394 0-2.525 1.105-2.525 2.469 0 1.363 1.131 2.468 2.525 2.468s2.524-1.105 2.524-2.468zm16.187-2.469c1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468 0-1.364 1.13-2.469 2.524-2.469zm21.234 2.469c0-1.364-1.13-2.469-2.525-2.469-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.395 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.525 1.105 2.525 2.469 0 1.363-1.131 2.468-2.525 2.468s-2.524-1.105-2.524-2.468c0-1.364 1.13-2.469 2.524-2.469zm21.237 2.469c0-1.364-1.131-2.469-2.525-2.469s-2.524 1.105-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468 0-1.364 1.13-2.469 2.524-2.469zm21.237 2.469c0-1.364-1.131-2.469-2.525-2.469s-2.524 1.105-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zm-133.496-16.825c1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.395 0-2.525-1.105-2.525-2.468 0-1.364 1.13-2.469 2.525-2.469zm21.233 2.469c0-1.364-1.13-2.469-2.524-2.469-1.394 0-2.525 1.105-2.525 2.469 0 1.363 1.131 2.468 2.525 2.468s2.524-1.105 2.524-2.468zm16.187-2.469c1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468 0-1.364 1.13-2.469 2.524-2.469zm21.234 2.469c0-1.364-1.13-2.469-2.525-2.469-1.394 0-2.524 1.105-2.524 2.469 0 1.363 1.13 2.468 2.524 2.468 1.395 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.525 1.105 2.525 2.469 0 1.363-1.131 2.468-2.525 2.468s-2.524-1.105-2.524-2.468c0-1.364 1.13-2.469 2.524-2.469zm21.237 2.469c0-1.364-1.131-2.469-2.525-2.469s-2.524 1.105-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zm16.184-2.469c1.394 0 2.524 1.105 2.524 2.469 0 1.363-1.13 2.468-2.524 2.468-1.394 0-2.524-1.105-2.524-2.468 0-1.364 1.13-2.469 2.524-2.469zm21.237 2.469c0-1.364-1.131-2.469-2.525-2.469s-2.524 1.105-2.524 2.469c0 1.363 1.13 2.468 2.524 2.468 1.394 0 2.525-1.105 2.525-2.468zM150.976 89.124c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.395 0-2.525-1.105-2.525-2.469 0-1.363 1.13-2.468 2.525-2.468zm21.233 2.468c0-1.363-1.13-2.468-2.524-2.468-1.394 0-2.525 1.105-2.525 2.468 0 1.364 1.131 2.469 2.525 2.469s2.524-1.105 2.524-2.469zm16.187-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469 0-1.363 1.13-2.468 2.524-2.468zm21.234 2.468c0-1.363-1.13-2.468-2.525-2.468-1.394 0-2.524 1.105-2.524 2.468 0 1.364 1.13 2.469 2.524 2.469 1.395 0 2.525-1.105 2.525-2.469zm16.184-2.468c1.394 0 2.525 1.105 2.525 2.468 0 1.364-1.131 2.469-2.525 2.469s-2.524-1.105-2.524-2.469c0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469zm16.184-2.468c1.394 0 2.524 1.105 2.524 2.468 0 1.364-1.13 2.469-2.524 2.469-1.394 0-2.524-1.105-2.524-2.469 0-1.363 1.13-2.468 2.524-2.468zm21.237 2.468c0-1.363-1.131-2.468-2.525-2.468s-2.524 1.105-2.524 2.468c0 1.364 1.13 2.469 2.524 2.469 1.394 0 2.525-1.105 2.525-2.469z"
                                    fill="url(#paint4_linear_228_431)" />
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_228_431" x1="152.25" y1="161.063" x2="154.33"
                                    y2="4.773" gradientUnits="userSpaceOnUse">
                                    <stop stopColor="#fff" />
                                    <stop offset="1" stopColor="#fff" stopOpacity="0" />
                                </linearGradient>
                                <linearGradient id="paint1_linear_228_431" x1="133.019" y1="80.334" x2="3.944"
                                    y2="3.188" gradientUnits="userSpaceOnUse">
                                    <stop stopColor="#246151" />
                                    <stop offset=".422" stopColor="#A7C6BC" />
                                    <stop offset=".865" stopColor="#73CADC" />
                                </linearGradient>
                                <linearGradient id="paint2_linear_228_431" x1="133.019" y1="165.839" x2="3.944"
                                    y2="88.693" gradientUnits="userSpaceOnUse">
                                    <stop stopColor="#246151" />
                                    <stop offset=".422" stopColor="#A7C6BC" />
                                    <stop offset=".865" stopColor="#73CADC" />
                                </linearGradient>
                                <linearGradient id="paint3_linear_228_431" x1="151.307" y1="80.335" x2="280.382"
                                    y2="3.188" gradientUnits="userSpaceOnUse">
                                    <stop stopColor="#246151" />
                                    <stop offset=".422" stopColor="#A7C6BC" />
                                    <stop offset=".865" stopColor="#73CADC" />
                                </linearGradient>
                                <linearGradient id="paint4_linear_228_431" x1="151.307" y1="165.839" x2="280.382"
                                    y2="88.693" gradientUnits="userSpaceOnUse">
                                    <stop stopColor="#246151" />
                                    <stop offset=".422" stopColor="#A7C6BC" />
                                    <stop offset=".865" stopColor="#73CADC" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif
