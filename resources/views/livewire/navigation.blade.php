<nav class="bg-gray-800" x-data="{ openMobile: false }">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">

            <!-- Mobile menu button-->
            <div class="flex items-center sm:hidden">
                <button x-on:click="openMobile = true" type="button"
                    class="text-gray-400 p-2 rounded-md hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!--
                        Icon when menu is closed.

                        Menu open: "hidden", Menu closed: "block"
                    -->
                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!--
                        Icon when menu is open.

                        Menu open: "block", Menu closed: "hidden"
                    -->
                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center justify-center sm:items-stretch sm:justify-start">

                {{-- Logotipo --}}
                <a href="/" class="flex-shrink-0 items-center">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </a>

                {{-- Menu lg --}}
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        {{-- <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Dashboard</a> --}}
                        @foreach ($categories as $category)
                            <a href="{{ route('distributions.category', $category) }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center sm:items-stretch sm:justify-end" x-data="{ openCart: false }">
                @auth

                    <div class="flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                        {{-- Botón notificación --}}
                        <button type="button"
                            class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 transition duration-300 ease-in-out">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">View notifications</span>
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                        </button>

                        <!-- Profile dropdown -->
                        <div class="relative ml-3 group" x-data="{ openProfile: false }">
                            <button x-on:click="openProfile = true" type="button"
                                class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                                    alt="">
                            </button>

                            <!--
                                Dropdown menu, show/hide based on menu state.

                                Entering: "transition ease-out duration-100"
                                    From: "transform opacity-0 scale-95"
                                    To: "transform opacity-100 scale-100"
                                Leaving: "transition ease-in duration-75"
                                    From: "transform opacity-100 scale-100"
                                    To: "transform opacity-0 scale-95"
                            -->
                            {{-- Menú desplegable --}}
                            <div x-show="openProfile" x-on:click.away="openProfile = false"
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white dark:bg-gray-800 py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                tabindex="-1">
                                <!-- Active: "bg-gray-100", Not Active: "" -->
                                <a href="{{ route('profile.show') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-400" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">
                                    Tu perfil
                                </a>
                                <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                                @can('admin.home')
                                    <a href="{{ route('admin.home') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-400" role="menuitem"
                                        tabindex="-1" id="user-menu-item-0">
                                        Dashboard
                                    </a>
                                @endcan
                                <a {{-- href="{{ route('') }}" --}}
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-400" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">
                                    Mi lista de deseos
                                </a>
                                <a href="{{ route('admin.distributions.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-400" role="menuitem"
                                    tabindex="-1" id="user-menu-item-0">
                                    Vender
                                </a>
                                <div class="border-t my-1 border-gray-400 dark:border-gray-700"></div>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <a href="{{ route('logout') }}"
                                        class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-400" role="menuitem"
                                        tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">
                                        Cerrar Sesión
                                    </a>
                                </form>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a href="{{ route('login') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                Login
                            </a>
                            <a href="{{ route('register') }}"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                Register
                            </a>
                        </div>
                    </div>
                @endauth

                <!-- Search -->
                <div class="flex items-center lg:ml-6 pr-2">
                    <a href="#"
                        class="p-2 text-gray-400 hover:text-gray-500 transition duration-300 ease-in-out">
                        <span class="sr-only">Search</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                    </a>
                </div>

                <!-- Cart -->
                <div class="ml-2 flow-root lg:ml-6 pr-2 mt-2">
                    <a x-on:click="openCart = true"
                        class="group -m-2 flex items-center p-2 transition duration-300 ease-in-out">
                        <svg class="h-6 w-6 flex-shrink-0 text-gray-400 group-hover:text-gray-500" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                        </svg>
                        <span class="ml-2 text-sm font-medium text-gray-400 group-hover:text-gray-500">
                            {{ $totalItems }}
                        </span>
                        <span class="sr-only">items in cart, view bag</span>
                    </a>

                    {{-- Menu carrito --}}
                    <div x-show="openCart" x-on:click.away="openCart = false" x-on:closeCart="openCart = false"
                        class="absolute top-12 right-80 z-50">
                        <livewire:mini-cart />
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Menu Mobile --}}
    <div class="sm:hidden" id="mobile-menu" x-show="openMobile" x-on:click.away="openMobile = false">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            {{-- <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium" aria-current="page">Dashboard</a> --}}
            @foreach ($categories as $category)
                <a href="{{ route('distributions.category', $category) }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                    {{ $category->name }}
                </a>
            @endforeach
        </div>
    </div>
</nav>
