<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p style="font-size: 24px;">Available Services:</p>
                    @foreach($services as $service)
                        <div class="flex items-center justify-between mb-4 bg-gray-100 rounded-lg p-4">
                            <div class="flex items-center">
                                <img src="{{ $service->image }}" alt="Service Image" class="w-32 h-32 sm:w-40 sm:h-40 lg:w-50 lg:h-50 mr-4">
                                <div>
                                    <h3 class="text-2xl">{{ $service->name }}</h3>
                                    <p>{{ $service->description }}</p>
                                    <p style="font-size: 18px;">{{ $service->price }}PLN</p>
                                </div>
                            </div>
                            <div>
                                <button class="rounded-md bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
                                    Order
                                </button>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
