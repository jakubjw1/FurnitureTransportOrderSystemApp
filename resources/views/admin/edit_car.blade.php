<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Car') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-4">Edit Car</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="brand" class="block text-gray-700 font-bold mb-2">Brand:</label>
                            <input type="text" name="brand" id="brand" value="{{ $car->brand }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="model" class="block text-gray-700 font-bold mb-2">Model:</label>
                            <input type="text" name="model" id="model" value="{{ $car->model }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="transport_capacity" class="block text-gray-700 font-bold mb-2">Transport Capacity:</label>
                            <input type="number" name="transport_capacity" id="transport_capacity" value="{{ $car->transport_capacity }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="height" class="block text-gray-700 font-bold mb-2">Height:</label>
                            <input type="number" name="height" id="height" value="{{ $car->height }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="width" class="block text-gray-700 font-bold mb-2">Width:</label>
                            <input type="number" name="width" id="width" value="{{ $car->width }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="length" class="block text-gray-700 font-bold mb-2">Length:</label>
                            <input type="number" name="length" id="length" value="{{ $car->length }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save
                            </button>
                            <a href="{{ route('admin.cars.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
