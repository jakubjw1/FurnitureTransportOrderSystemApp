<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @auth
                        <p class="text-4xl font-bold">{{ __("Welcome,") }} {{ Auth::user()->name }}</p>
                        <p class="text-xl p-6">{{ __("Select any tab from the navigation bar to manage resources.") }}</p>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
