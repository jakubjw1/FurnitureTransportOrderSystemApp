<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Service Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-3xl font-bold mb-4">{{ $service->name }}</h1>
                    <img src="{{ asset('images/truck_service.png') }}" alt="Service Image" class="w-48 h-48 sm:w-60 sm:h-60 lg:w-80 lg:h-80 mr-4">
                    <p class="text-lg mt-8">{{ $service->description }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
