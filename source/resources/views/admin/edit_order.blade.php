<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl font-bold mb-4">Edit Order</h2>
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 font-bold mb-2">User ID:</label>
                            <input type="number" name="user_id" id="user_id" value="{{ $order->user_id }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="car_id" class="block text-gray-700 font-bold mb-2">Car ID:</label>
                            <input type="number" name="car_id" id="car_id" value="{{ $order->car_id }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="driver_id" class="block text-gray-700 font-bold mb-2">Driver ID:</label>
                            <input type="number" name="driver_id" id="driver_id" value="{{ $order->driver_id }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="order_date" class="block text-gray-700 font-bold mb-2">Order Date:</label>
                            <input type="date" name="order_date" id="order_date" value="{{ $order->order_date }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="payment_method" class="block text-gray-700 font-bold mb-2">Payment Method:</label>
                            <input type="text" name="payment_method" id="payment_method" value="{{ $order->payment_method }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="service_date" class="block text-gray-700 font-bold mb-2">Service Date:</label>
                            <input type="date" name="service_date" id="service_date" value="{{ $order->service_date }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                            <input type="text" name="description" id="description" value="{{ $order->description }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="total_amount" class="block text-gray-700 font-bold mb-2">Total Amount:</label>
                            <input type="number" name="total_amount" id="total_amount" value="{{ $order->total_amount }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="order_status" class="block text-gray-700 font-bold mb-2">Order Status:</label>
                            <input type="text" name="order_status" id="order_status" value="{{ $order->order_status }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save
                            </button>
                            <a href="{{ route('admin.orders.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
