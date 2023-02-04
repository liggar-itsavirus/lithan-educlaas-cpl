<div>
    <nav class="px-2 py-3 bg-[#1A120B] border-[#1A120B]">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="#" class="flex items-center">
                <img src="{{ url('/img/logo.png') }}" class="h-6 mr-3 sm:h-10" alt="Flowbite Logo"
                    style="width: auto; height: 60px" />
                <span class="self-center text-xl font-semibold whitespace-nowrap text-[#E5E5CB]"></span>
            </a>
            <button data-collapse-toggle="navbar-dropdown" type="button"
                class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                aria-controls="navbar-dropdown" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
                <ul
                    class="flex flex-col p-4 mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0">
                    @if (Auth::check())
                        @if (Auth::user()->role == 'admin')
                            <li>
                                <a href="/admin"
                                    class="text-lg block py-2 pl-3 pr-4 text-[#E5E5CB] rounded hover:bg-[#D5CEA3] md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0"
                                    aria-current="page">Dashboard</a>
                            </li>

                            <li>
                                <a href="{{ route('admin.manage-order') }}"
                                    class="text-lg block py-2 pl-3 pr-4 text-[#E5E5CB] rounded hover:bg-[#D5CEA3] md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0">Manage
                                    Order</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.manage-product') }}"
                                    class="text-lg block py-2 pl-3 pr-4 text-[#E5E5CB] rounded hover:bg-[#D5CEA3] md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0">Manage
                                    Products</a>
                            </li>
                            <li>
                                <button id="dropdownNavbarlink9" data-dropdown-toggle="dropdownNavbar9"
                                    class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">Manage
                                    Cafe<svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar9"
                                    class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('admin.manage-cafe') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Menus</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.admin-manage-oulet') }}"
                                                class=" block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Outlet</a>
                                        </li>
                                    </ul>
                            </li>
                            <li>
                                <button id="dropdownNavbarlink8" data-dropdown-toggle="dropdownNavbar8"
                                    class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">Manage
                                    User<svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar8"
                                    class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="#"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Distributor</a>
                                        </li>
                                        <li>
                                            <a href="#"
                                                class=" block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Customer</a>
                                        </li>
                                    </ul>
                            </li>
                            <li>
                                <button id="dropdownNavbarlink" data-dropdown-toggle="dropdownNavbar"
                                    class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">{{ auth()->user()->name }}
                                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar"
                                    class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                        aria-labelledby="dropdownLargeButton">
                                        <div class="block px-4 py-2 text-xs text-gray-400">
                                            {{ __('Manage Account') }}
                                        </div>
                                        <li>
                                            <a href="{{ route('profile.show') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">{{ __('Account') }}</a>
                                        </li>
                                    </ul>
                                    <div class="py-1">
                                        <!-- <a href="#" >Sign out</a> -->
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">
                                            Logout
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endif
                        @if (Auth::user()->role == 'user')
                            <li>
                                <a href="/user"
                                    class="text-lg block py-2 pl-3 pr-4 text-[#E5E5CB] rounded hover:bg-[#D5CEA3] md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0"
                                    aria-current="page">Home</a>
                            </li>
                            <li>
                                <button id="dropdownNavbarlink2" data-dropdown-toggle="dropdownNavbar2"
                                    class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">Shop
                                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar2"
                                    class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('user.show-all-product', 'Coffee Beans') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Coffee
                                                Beans</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.show-all-product', 'Ground Coffee') }}"
                                                class=" block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Ground
                                                Coffee</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.show-all-product', 'Capsule Coffee') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Capsule
                                                Coffee</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.show-all-product', 'Capsule Machine') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Capsule
                                                Machine</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.show-all-product', 'Single Serving') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Single
                                                Serving</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.show-all-product', 'Coffee Equipments') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Coffee
                                                Equipments</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.show-all-product', 'Brewing Kit') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Brewing
                                                Kit</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.show-all-product', 'Bundling Package') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Bundling
                                                Package</a>
                                        </li>
                                    </ul>
                            </li>
                            <li>
                                <button id="dropdownNavbarlink3" data-dropdown-toggle="dropdownNavbar3"
                                    class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">Cafe
                                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar3"
                                    class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('user.user-cafe', 'Meals') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Meals</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.user-cafe', 'Beverages') }}"
                                                class=" block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Beverages</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.user-outlet') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Outlet</a>
                                        </li>

                                    </ul>
                            </li>
                            <li>
                                <a href="{{ route('user.user-our-story') }}"
                                    class="text-lg block py-2 pl-3 pr-4 text-[#E5E5CB] rounded hover:bg-[#D5CEA3] md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0">Our
                                    Story</a>
                            </li>
                            <li>
                                <button id="dropdownNavbarlink4" data-dropdown-toggle="dropdownNavbar4"
                                    class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">{{ auth()->user()->name }}
                                    <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg></button>
                                <!-- Dropdown menu -->
                                <div id="dropdownNavbar4"
                                    class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                        aria-labelledby="dropdownLargeButton">
                                        <li>
                                            <a href="{{ route('profile.show') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Account</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.user-order') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Order</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('user.user-address') }}"
                                                class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Addresses</a>
                                        </li>

                                    </ul>
                                    <div class="py-1">
                                        <!-- <a href="#" >Sign out</a> -->
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('frm-logout').submit();"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">
                                            Logout
                                        </a>
                                        <form id="frm-logout" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </div>
                                </div>
                            </li>
                            <li
                                class="text-lg block text-[#E5E5CB] rounded hover:bg-[#D5CEA3] md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0">
                                <a href="{{ route('user.shopping-cart') }}" role="button" class="relative flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="feather feather-shopping-bag">
                                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                                    </svg>
                                    <span
                                        class="absolute -right-2 -top-2 rounded-full bg-red-600 w-5 h-5 p-0 m-0 flex items-center justify-center text-white font-mono text-[0.8rem] leading-tight text-center">{{ $this->total }}
                                    </span>
                                </a>
                            </li>
                        @endif
                    @else
                        <li>
                            <a href="/"
                                class="text-lg block py-2 pl-3 pr-4 text-[#E5E5CB] rounded hover:bg-[#D5CEA3] md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0">Home</a>
                        </li>
                        <li>
                            <button id="dropdownNavbarlink5" data-dropdown-toggle="dropdownNavbar5"
                                class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">Shop
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar5"
                                class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="{{ route('show-all-product', 'Coffee Beans') }}"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Coffee
                                            Beans</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show-all-product', 'Ground Coffee') }}"
                                            class=" block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Ground
                                            Coffee</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show-all-product', 'Capsule Coffee') }}"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Capsule
                                            Coffee</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show-all-product', 'Capsule Machine') }}"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Capsule
                                            Machine</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show-all-product', 'Single Serving') }}"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Single
                                            Serving</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show-all-product', 'Brewing Kit') }}"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Brewing
                                            Kit</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show-all-product', 'Coffee Equipments') }}"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Coffee
                                            Equipment</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('show-all-product', 'Bundling Package') }}"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Bundling
                                            Package</a>
                                    </li>
                                </ul>
                        </li>
                        <li>
                            <button id="dropdownNavbarlink6" data-dropdown-toggle="dropdownNavbar6"
                                class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">Cafe
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar6"
                                class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="/coffee-beans"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Meals</a>
                                    </li>
                                    <li>
                                        <a href="/ground-coffee"
                                            class=" block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Beverages</a>
                                    </li>
                                    <li>
                                        <a href="/capsule-coffee"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Outlet</a>
                                    </li>

                                </ul>
                        </li>
                        <li>
                            <a href="{{ route('our-story') }}"
                                class="text-lg block py-2 pl-3 pr-4 text-[#E5E5CB] rounded hover:bg-[#D5CEA3] md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0">Our
                                Story</a>
                        </li>
                        <li>
                            <button id="dropdownNavbarlink7" data-dropdown-toggle="dropdownNavbar7"
                                class="text-lg flex items-center justify-between w-full py-2 pl-3 pr-4 font-medium text-[#E5E5CB] rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-[#D5CEA3] md:p-0 md:w-auto">My
                                Account
                                <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg></button>
                            <!-- Dropdown menu -->
                            <div id="dropdownNavbar7"
                                class="z-10 hidden font-normal bg-[#1A120B] divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-400"
                                    aria-labelledby="dropdownLargeButton">
                                    <li>
                                        <a href="/register"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Register</a>
                                    </li>
                                    <li>
                                        <a href="/login"
                                            class="block px-4 py-2 text-[#E5E5CB] hover:bg-[#3C2A21] dark:hover:bg-gray-600 dark:hover:text-[#1A120B]">Sign
                                            in</a>
                                    </li>
                                </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

</div>
