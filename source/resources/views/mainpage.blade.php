<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Furniture Transport Order System') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @auth
                        <p>{{ __("Welcome,") }} {{ Auth::user()->name }}</p>
                    @endauth

                    @guest
                        <p>{{ __("Welcome, guest!") }}</p>
                        <p>{{ __("Please log in or register to access more features.") }}</p>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
