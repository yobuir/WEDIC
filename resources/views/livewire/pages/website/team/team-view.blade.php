<div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-3">

    @forelse ($members as $item)
        <div class="items-center bg-gray-50 rounded-lg shadow sm:flex dark:bg-wedic-blue-800 dark:border-gray-700 flex-col">
            <a href="#">
                <img class=" rounded-lg min-w-[100px] object-cover  sm:rounded-none sm:rounded-l-lg" src=" {{ $item->profile }}"
                    alt=" {{ $item->name }}">
            </a>
            <div class="p-5">
                <h3 class="text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                    <a href="#" style="font-size:24px"> {{ $item->name }} </a>
                </h3>
                <span class="text-gray-500 dark:text-gray-400"> {{ $item->title }}</span>
                <p class="mt-3 mb-4 font-light text-gray-500 dark:text-gray-400"> {{ $item->bio }}.</p>
                <ul class="flex space-x-4 sm:mt-0">
                    <li>
                        <a href="{{ $item->facebook }}" target="__blank"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ $item->linkedin }}" target="__blank"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M19.148 3H4.852C4.381 3 4 3.381 4 3.852v16.296C4 20.619 4.381 21 4.852 21h14.296c.47 0 .852-.381.852-.852V3.852C20 3.381 19.619 3 19.148 3zM8.538 17.667H6.402V9.819h2.136v7.848zm-1.067-8.93c-.682 0-1.234-.553-1.234-1.234s.552-1.234 1.234-1.234 1.234.552 1.234 1.234-.553 1.234-1.234 1.234zm10.194 8.93h-2.136v-3.96c0-2.046-2.471-1.89-2.471 0v3.96h-2.136V9.819h2.136v1.09c1.04-1.963 4.607-2.136 4.607 1.59v5.158z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ $item->instagram }}" target="__blank"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 1.366.062 2.633.332 3.608 1.308.975.975 1.246 2.242 1.308 3.608.058 1.266.07 1.646.07 4.85s-.012 3.584-.07 4.85c-.062 1.366-.332 2.633-1.308 3.608-.975.975-2.242 1.246-3.608 1.308-1.266.058-1.646.07-4.85.07s-3.584-.012-4.85-.07c-1.366-.062-2.633-.332-3.608-1.308-.975-.975-1.246-2.242-1.308-3.608-.058-1.266-.07-1.646-.07-4.85s.012-3.584.07-4.85c.062-1.366.332-2.633 1.308-3.608.975-.975 2.242-1.246 3.608-1.308 1.266-.058 1.646-.07 4.85-.07zm0-2.163C8.71 0 8.29.013 7.018.072 5.6.135 4.356.39 3.275 1.47c-1.08 1.08-1.335 2.325-1.398 3.743C1.013 6.29 1 6.71 1 12s.013 5.71.072 7.982c.063 1.418.318 2.663 1.398 3.743 1.08 1.08 2.325 1.335 3.743 1.398C8.29 22.987 8.71 23 12 23s3.71-.013 4.982-.072c1.418-.063 2.663-.318 3.743-1.398 1.08-1.08 1.335-2.325 1.398-3.743.058-2.272.072-2.692.072-7.982s-.013-5.71-.072-7.982c-.063-1.418-.318-2.663-1.398-3.743-1.08-1.08-2.325-1.335-3.743-1.398C15.71.013 15.29 0 12 0zM12 5.838c-3.407 0-6.162 2.755-6.162 6.162S8.593 18.162 12 18.162 18.162 15.407 18.162 12 15.407 5.838 12 5.838zm0 10.162c-2.207 0-4-1.793-4-4s1.793-4 4-4 4 1.793 4 4-1.793 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.441s.645 1.441 1.441 1.441 1.441-.645 1.441-1.441-.645-1.441-1.441-1.441z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    </li>
                    <li>
                        <a href=" {{ $item->twitter }}" target="__blank"
                            class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                            </svg>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    @empty

        No team member added yet
    @endforelse

</div>
