<nav x-data="{ isScrolled: false }" x-init="window.addEventListener('scroll', () => isScrolled = window.scrollY > 50)"
    :class="{ 'bg-white shadow-lg': isScrolled, 'bg-transparent text-white': !isScrolled }"
    class="fixed w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <div class="relative h-16">
                <a href="/" class="flex items-center  top-0 h-[100%] w-[100%]">
                    <img src="{{ asset('logo/main_logo.png') }}" alt="logo" class="w-[100%] h-[100%]">
                </a>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('home') }}" class="nav-link"
                    :class="{
                        'text-wedic-blue-200 hover:text-wedic-blue-500': !scrolled && !
                            mobileMenu,
                        'text-black-500 hover:text-wedic-blue-500': scrolled || mobileMenu
                    }">
                    Home</a>
                <a href="{{ route('news') }}" class="nav-link"
                    :class="{
                        'text-wedic-blue-200 hover:text-wedic-blue-500': !scrolled && !
                            mobileMenu,
                        'text-black-500 hover:text-wedic-blue-500': scrolled || mobileMenu
                    }">
                    News</a>
                <a href="{{ route('events') }}" class="nav-link"
                    :class="{
                        'text-wedic-blue-200 hover:text-wedic-blue-500': !scrolled && !
                            mobileMenu,
                        'text-black-500 hover:text-wedic-blue-500': scrolled || mobileMenu
                    }">
                    Events</a>

                <a href="{{ route('expertise') }}" class="nav-link"
                    :class="{
                        'text-wedic-blue-200 hover:text-wedic-blue-500': !scrolled && !
                            mobileMenu,
                        'text-black-500 hover:text-wedic-blue-500': scrolled || mobileMenu
                    }">
                    Expertise</a>
                <a href="{{ route('aboutUs') }}" class="nav-link"
                    :class="{
                        'text-wedic-blue-200 hover:text-wedic-blue-500': !scrolled && !
                            mobileMenu,
                        'text-black-500 hover:text-wedic-blue-500': scrolled || mobileMenu
                    }">
                    About Us</a>

                <a href="{{ route('contactUs') }}" class="nav-link"
                    :class="{
                        'text-wedic-blue-200 hover:text-wedic-blue-500': !scrolled && !
                            mobileMenu,
                        'text-black-500 hover:text-wedic-blue-500': scrolled || mobileMenu
                    }">
                    About Us</a>
                <a href="{{ route('store') }}"
                    class="bg-wedic-blue-500 text-black-500 px-6 py-2 rounded-full hover:bg-wedic-blue-600 transition transform hover:scale-105">
                    Store
                </a>
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden">
                <svg class="w-6 h-6"
                    :class="{ 'text-wedic-blue-500': !scrolled && !mobileMenu, 'text-wedic-blue-500': scrolled || mobileMenu }"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenu" x-cloak x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="md:hidden bg-white text-black border-t  border-wedic-blue-200/5">
        <div class="px-4 py-2 space-y-1 ">
            <a href="/"
                class="block px-3 py-2 rounded-md text-wedic-blue-900 hover:bg-wedic-blue-500/10 hover:text-wedic-blue-500">Home</a>
            <a href="{{ route('news') }}"
                class="block px-3 py-2 rounded-md text-wedic-blue-900 hover:bg-wedic-blue-500/10 hover:text-wedic-blue-500">News</a>
            <a href="{{ route('events') }}"
                class="block px-3 py-2 rounded-md text-wedic-blue-900 hover:bg-wedic-blue-500/10 hover:text-wedic-blue-500">Events</a>

            <a href="{{ route('expertise') }}"
                class="block px-3 py-2 rounded-md text-wedic-blue-900 hover:bg-wedic-blue-500/10 hover:text-wedic-blue-500">Expertise</a>
                
            <a href="{{ route('aboutUs') }}"
                class="block px-3 py-2 rounded-md text-wedic-blue-900 hover:bg-wedic-blue-500/10 hover:text-wedic-blue-500">About
                Us</a>

            <a href="{{ route('store') }}"
                class="bg-wedic-blue-500 text-black-500 px-6 py-2 rounded-full hover:bg-wedic-blue-600 transition transform hover:scale-105">
                Store
            </a>

        </div>
    </div>
</nav>
