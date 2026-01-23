<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 bg-green-800/90 backdrop-blur-sm">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="hidden py-3 space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    <x-nav-link :href="route('kabar.index')" :active="request()->routeIs('kabar.index')">
                        {{ __('Kabar Desa') }}
                    </x-nav-link>
                    <x-nav-link :href="route('layanan.index')" :active="request()->routeIs('layanan.index')">
                        {{ __('Layanan Desa') }}
                    </x-nav-link>
                    <x-nav-link :href="route('pengajuan.riwayat')" :active="request()->routeIs('pengajuan.*')">
                        {{ __('Riwayat Pengajuan') }}
                    </x-nav-link>
                    <x-nav-link :href="route('kontak.index')" :active="request()->routeIs('kontak.index')">
                        {{ __('Kontak') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            @auth
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 transition duration-150 ease-in-out border border-transparent rounded-md text-gray-50 bg-amber-500 hover:text-gray-700 focus:outline-none">
                            <div>{{ Auth::user()?->name ?? 'User' }}</div>

                            <div class="ms-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
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
            @else
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <a href="{{ route('login') }}" class="text-sm underline text-gray-50"><i data-feather="log-in"></i></a>
            </div>
            @endauth

            <!-- Hamburger -->
            <div class="flex items-center -me-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kabar.index')" :active="request()->routeIs('kabar.index')">
                {{ __('Kabar') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('layanan.index')" :active="request()->routeIs('layanan.index')">
                {{ __('Layanan Desa') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pengajuan.riwayat')" :active="request()->routeIs('pengajuan.*')">
                {{ __('Riwayat Pengajuan') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('kontak.index')" :active="request()->routeIs('kontak.index')">
                {{ __('Kontak') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()?->name ?? 'User' }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()?->email ?? '' }}</div>
                @else
                    <div class="text-base font-medium text-gray-800">Guest</div>
                    <div class="text-sm font-medium text-gray-500">
                        <a href="{{ route('login') }}" class="underline">Login</a>
                    </div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
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
