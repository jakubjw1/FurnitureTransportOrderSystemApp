<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('mainpage') }}">
                        <img src="{{ asset('images/ftos.png') }}" alt="Logo" class="h-10 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    @guest
                        <x-nav-link :href="route('mainpage')" :active="request()->routeIs('mainpage')" class="text-xl">
                            {{ __('Main Page') }}
                        </x-nav-link>
                        <x-nav-link :href="route('services')" :active="request()->routeIs('services')" class="text-xl">
                            {{ __('Services') }}
                        </x-nav-link>
                        <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-xl">
                            {{ __('About') }}
                        </x-nav-link>
                    @else
                        @if (Auth::user()->role === 'user')
                            <x-nav-link :href="route('mainpage')" :active="request()->routeIs('mainpage')" class="text-xl">
                                {{ __('Main Page') }}
                            </x-nav-link>
                            <x-nav-link :href="route('services')" :active="request()->routeIs('services')" class="text-xl">
                                {{ __('Services') }}
                            </x-nav-link>
                            <x-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-xl">
                                {{ __('About') }}
                            </x-nav-link>
                            <x-nav-link :href="route('orders.index', ['user_id' => Auth::user()->id])" :active="request()->routeIs('orders.index')" class="text-xl">
                                {{ __('My Orders') }}
                            </x-nav-link>
                        @elseif (Auth::user()->role === 'admin')
                            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" class="text-xl">
                                {{ __('Users') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.index')" class="text-xl">
                                {{ __('Orders') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.index')" class="text-xl">
                                {{ __('Services') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.drivers.index')" :active="request()->routeIs('admin.drivers.index')" class="text-xl">
                                {{ __('Drivers') }}
                            </x-nav-link>
                            <x-nav-link :href="route('admin.cars.index')" :active="request()->routeIs('admin.cars.index')" class="text-xl">
                                {{ __('Cars') }}
                            </x-nav-link>
                        @endif
                    @endguest
                </div>

            </div>

            <!-- Settings Links -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 space-x-4">
                @guest
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-xl">
                        {{ __('Login') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-xl">
                        {{ __('Register') }}
                    </x-nav-link>
                @else
                    <x-nav-link :href="route('profile.edit')" class="text-xl">
                        {{ Auth::user()->name }}
                    </x-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-xl">
                            {{ __('Log Out') }}
                        </x-nav-link>
                    </form>
                @endguest
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
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
        <div class="pt-2 pb-3 space-y-1">
            @guest
                <x-responsive-nav-link :href="route('mainpage')" :active="request()->routeIs('mainpage')" class="text-xl">
                    {{ __('Main Page') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('services')" :active="request()->routeIs('services')" class="text-xl">
                    {{ __('Services') }}
                </x-responsive-nav-link>
                <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-xl">
                    {{ __('About') }}
                </x-responsive-nav-link>
            @else
                @if (Auth::user()->role === 'user')
                    <x-responsive-nav-link :href="route('mainpage')" :active="request()->routeIs('mainpage')" class="text-xl">
                        {{ __('Main Page') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('services')" :active="request()->routeIs('services')" class="text-xl">
                        {{ __('Services') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')" class="text-xl">
                        {{ __('About') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('orders.index', ['user_id' => Auth::user()->id])" :active="request()->routeIs('orders.index')" class="text-xl">
                        {{ __('My Orders') }}
                    </x-responsive-nav-link>
                @elseif (Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.index')" class="text-xl">
                        {{ __('Users') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.orders.index')" :active="request()->routeIs('admin.orders.index')" class="text-xl">
                        {{ __('Orders') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.services.index')" :active="request()->routeIs('admin.services.index')" class="text-xl">
                        {{ __('Services') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.drivers.index')" :active="request()->routeIs('admin.drivers.index')" class="text-xl">
                        {{ __('Drivers') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.cars.index')" :active="request()->routeIs('admin.cars.index')" class="text-xl">
                        {{ __('Cars') }}
                    </x-responsive-nav-link>
                @endif
            @endguest
        </div>


        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                @auth
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                @guest
                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" class="text-xl">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')" class="text-xl">
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                @else
                    <x-responsive-nav-link :href="route('profile.edit')" class="text-xl">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();" class="text-xl">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                @endguest
            </div>
        </div>
    </div>
</nav>
