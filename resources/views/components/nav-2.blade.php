<nav class="w-full fixed " style="background-color: rgba(27, 11, 41, 0.94)" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto   px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <!-- MObile menu buttons -->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                <!-- Mobile menu button-->
                <button x-on:click="open = true" type="button"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <!-- Icon when menu is closed. -->
                    <!--
            Heroicon name: outline/menu

            Menu open: "hidden", Menu closed: "block"
          -->
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <!-- Icon when menu is open. -->
                    <!--
            Heroicon name: outline/x

            Menu open: "block", Menu closed: "hidden"
          -->
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-jet-application-mark class="block h-9 w-auto" />
                    </a>
                </div>
                <div class="hidden sm:block sm:mx-auto">
                    <div class="flex space-x-14 fon items_color items-center">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="#" class="bg-gray-900 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                        <a href="admin/"
                            class=" hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium border-black rounded-tl-xl">Team</a>
                        <a href="#"
                            class=" hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Projects</a>
                        <a href="#"
                            class=" hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Calendar</a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                <!-- Profile dropdown -->
                <div class="">
                    <a href="#" class="inline-block text-sm md:px-28 py-2 leading-none ">
                        @if (Route::has('login'))
                            <div class=" lg:fixed lg:top-0 lg:right-0 lg:px-2 lg:py-2 block login_color">
                                @auth
                                    <a href="{{ url('/dashboard') }}" class="text-sm inline-flex text-orange-400 "
                                        data-target="#navigation4">
                                        <span class="material-icons text-orange-400 text-opacity-80"
                                            style="font-size: 40px">
                                            local_bar
                                        </span>
                                        </button>
                                    </a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm  underline">Login</a>
                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm underline">Register</a>
                                    @endif
                            @endif
                    </div>
                    @endif
                    </a>
                </div>
            </div>
        </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away="open = false">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
                <a href="#"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
            </div>
        </div>
    </nav>
