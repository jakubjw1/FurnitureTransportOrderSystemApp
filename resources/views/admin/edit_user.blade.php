<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-4">Edit User</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 font-bold mb-2">Name:</label>
                            <input type="text" name="name" id="name" value="{{ $user->name }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 font-bold mb-2">Email:</label>
                            <input type="email" name="email" id="email" value="{{ $user->email }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="first_name" class="block text-gray-700 font-bold mb-2">First Name:</label>
                            <input type="text" name="first_name" id="first_name" value="{{ $user->first_name }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="last_name" class="block text-gray-700 font-bold mb-2">Last Name:</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="company_name" class="block text-gray-700 font-bold mb-2">Company Name:</label>
                            <input type="text" name="company_name" id="company_name" value="{{ $user->company_name }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="tax_id" class="block text-gray-700 font-bold mb-2">Tax ID:</label>
                            <input type="text" name="tax_id" id="tax_id" value="{{ $user->tax_id }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block text-gray-700 font-bold mb-2">Role:</label>
                            <select name="role" id="role" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save
                            </button>
                            <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
