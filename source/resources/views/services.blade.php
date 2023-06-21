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
                        <div class="flex items-center justify-between mb-4 bg-blue-200 rounded-lg p-4">
                            <div class="flex items-center">
                                <a href="{{ route('service.info', ['service' => $service->id]) }}">
                                    <img src="{{ $service->image }}" alt="Service Image" class="w-32 h-32 sm:w-40 sm:h-40 lg:w-50 lg:h-50 mr-4">
                                    <div>
                                        <h3 class="text-2xl">{{ $service->name }}</h3>
                                        <p style="font-size: 18px;">{{ $service->price }}PLN</p>
                                    </div>
                                </a>
                            </div>
                            <div>
                                @if(strpos($service->name, 'Disassembly + assembly') === false)
                                    <a href="{{ route('order.create', ['service_id' => $service->id]) }}" class="rounded-md bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-6">
                                        Order
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
