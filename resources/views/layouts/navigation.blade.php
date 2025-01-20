<nav x-data="{ open: false, dropdownOpen1: false, dropdownOpen2: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @if(auth()->user()->usertype === 'admin')
                        <x-nav-link :href="route('user.create')" :active="request()->routeIs('user.create')">
                            {{ __('Register') }}
                        </x-nav-link>
                    @endif
                    
                    <!-- Dropdown Menu 1 (Absensi) -->
                    <div @click="dropdownOpen1 = !dropdownOpen1" class="relative inline-flex">
                        <button class="inline-flex items-center text-center px-3 py-2 text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <span>Absensi</span>
                        </button>

                        <!-- Dropdown Items -->
                        <div x-show="dropdownOpen1" @click.away="dropdownOpen1 = false" class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1" style="display: none;">
                            @if(auth()->user()->usertype === 'admin')
                                <x-dropdown-link :href="route('attendance.create')">
                                    {{ __('Input') }}
                                </x-dropdown-link>
                            @endif
                            <x-dropdown-link :href="route('attendance.index')">
                                {{ __('Data') }}
                            </x-dropdown-link>
                        </div>
                    </div>
                    
                    <!-- Dropdown Menu 2 (Perizinan) -->
                    <div @click="dropdownOpen2 = !dropdownOpen2" class="relative inline-flex">
                        <button class="inline-flex items-center text-center px-3 py-2 text-sm font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <span>Izin</span>
                        </button>

                        <!-- Dropdown Items -->
                        <div x-show="dropdownOpen2" @click.away="dropdownOpen2 = false" class="absolute z-10 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1" style="display: none;">
                            @if(auth()->user()->usertype === 'user')
                                <x-dropdown-link :href="route('perizinan.create')">
                                    {{ __('Input') }}
                                </x-dropdown-link>
                            @endif
                            @if(auth()->user()->usertype === 'admin')
                                <x-dropdown-link :href="route('perizinan.index')">
                                    {{ __('Data') }}
                                </x-dropdown-link>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-3">
            <!-- Dashboard Link -->
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-lg font-medium">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- Register Link -->
            @if(auth()->user()->usertype === 'admin')
                <x-responsive-nav-link :href="route('user.create')" :active="request()->routeIs('user.create')" class="text-lg font-medium">
                    {{ __('Register') }}
                </x-responsive-nav-link>
            @endif
            <!-- Dropdown Menu 1 (Absensi) -->
            <div @click="dropdownOpen1 = !dropdownOpen1" class="relative">
                <button class="inline-flex items-center text-center px-4 py-3 text-lg font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 w-full">
                    <span>Absensi</span>
                </button>
        
                <!-- Dropdown Items -->
                <div x-show="dropdownOpen1" @click.away="dropdownOpen1 = false" class="absolute z-10 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1">
                    @if(auth()->user()->usertype === 'admin')
                        <x-dropdown-link :href="route('attendance.create')" class="text-lg">
                            {{ __('Input') }}
                        </x-dropdown-link>
                    @endif
                    <x-dropdown-link :href="route('attendance.index')" class="text-lg">
                        {{ __('Data') }}
                    </x-dropdown-link>
                </div>
            </div>
        
            <!-- Dropdown Menu 2 (Perizinan) -->
            <div @click="dropdownOpen2 = !dropdownOpen2" class="relative">
                <button class="inline-flex items-center text-center px-4 py-3 text-lg font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150 w-full">
                    <span>Izin</span>
                </button>
        
                <!-- Dropdown Items -->
                <div x-show="dropdownOpen2" @click.away="dropdownOpen2 = false" class="absolute z-10 mt-2 w-full rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1">
                    @if(auth()->user()->usertype === 'user')
                        <x-dropdown-link :href="route('perizinan.create')" class="text-lg">
                            {{ __('Input') }}
                        </x-dropdown-link>
                    @endif
                    @if(auth()->user()->usertype === 'admin')
                        <x-dropdown-link :href="route('perizinan.index')" class="text-lg">
                            {{ __('Data') }}
                        </x-dropdown-link>
                    @endif
                </div>
            </div>
        </div>
        

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
