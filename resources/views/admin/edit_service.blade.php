<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-4">Edit Service</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" value="{{ $service->name }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                            <textarea name="description" id="description" class="border border-gray-300 px-4 py-2 rounded-md w-full">{{ $service->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="price" class="block text-gray-700 font-bold mb-2">Price:</label>
                            <input type="number" name="price" id="price" value="{{ $service->price }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="image" class="block text-gray-700 font-bold mb-2">Image:</label>
                            <input type="file" name="image" id="image" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save
                            </button>
                            <a href="{{ route('admin.services.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
