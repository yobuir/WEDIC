<aside id="logo-sidebar"
    class="fixed top-0 left-0 z-40 border-r w-64 h-screen shadow-md transition-transform -translate-x-full sm:translate-x-0 bg-white dark:bg-wedic-blue-800 border-b border-gray-100 dark:border-gray-700"
    aria-label="Sidebar">
    <div class="h-full px-3 flex flex-col justify-between py-4 overflow-y-auto">
        <div class="flex flex-col ">
            <a href=""
                class="flex gap-2 dark:text-white text-black font-bold text-lg  items-center ps-2.5 pb-6 dark:border-gray-700 border-b border-gray-100">
                <img src="{{ asset('logo/fav_logo.png') }}" alt="logo" class="w-10 h-10">
                {{ config('app.name') }}
            </a>
            <ul class="space-y-2 font-medium mt-6">
                <li>
                    <a href=" {{ route('dashboard.') }}" wire:navigate
                        class="flex items-center p-2 dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="flex-shrink-0 w-5 h-5  ">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                @if (auth()->user()->isApplicant())
                    <li>
                        <a href=" {{ route('dashboard.settings', auth()->user()->id) }}" wire:navigate
                            class="flex items-center p-2 dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.settings') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                            <span class="ms-3">Settings</span>
                        </a>
                    </li>
                @endif

                @if (!auth()->user()->isApplicant() and !auth()->user()->isUser())
                    <li>
                        <a href=" {{ route('dashboard.category.') }}" wire:navigate
                            class="flex items-center p-2 dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.category.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6 w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.568 3H5.25A2.25 2.25 0 0 0 3 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 0 0 5.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 0 0 9.568 3Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6Z" />
                            </svg>
                            <span class="ms-3">Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('dashboard.event.') }}" wire:navigate
                            class="flex items-center p-2  dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.event.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                            </svg>
                            <span class="ms-3">Events</span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('dashboard.blog.') }}" wire:navigate
                            class="flex items-center p-2  dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.blog.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z" />
                            </svg>
                            <span class="ms-3">Blogs</span>
                        </a>
                    </li>

                    <li>
                        <a href=" {{ route('dashboard.partners.') }}" wire:navigate
                            class="flex items-center p-2  dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.partners.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z" />
                            </svg>

                            <span class="ms-3">Partners</span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('dashboard.testimonials.') }}" wire:navigate
                            class="flex items-center p-2  dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.testimonials.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                            </svg>
                            <span class="ms-3">Testimonials</span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('dashboard.message.') }}" wire:navigate
                            class="flex items-center p-2  dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.message.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                            </svg>
                            <span class="ms-3">Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('dashboard.mailing') }}" wire:navigate
                            class="flex items-center p-2  dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.mailing.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>

                            <span class="ms-3">Newsletters </span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('dashboard.team.') }}" wire:navigate
                            class="flex items-center p-2  dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.team.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                            </svg>

                            <span class="ms-3">Team</span>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ route('dashboard.users.') }}" wire:navigate
                            class="flex items-center p-2  dark:text-gray-400 text-gray-900 rounded-lg  {{ request()->routeIS('dashboard.users.*') ? ' dark:bg-wedic-blue-700 dark:text-white bg-gray-100' : 'hover:bg-gray-100 dark:hover:text-black hover:dark:bg-wedic-blue-700' }} group">

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />
                            </svg>
                            <span class="ms-3">Users</span>
                        </a>
                    </li>
                @endif

            </ul>
        </div>
        <div class="flex flex-col gap-3">

            <div class="lg:block ">
                <span class="flex gap-2">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i> 
                </span>
            </div>
        </div>
    </div>
</aside>
