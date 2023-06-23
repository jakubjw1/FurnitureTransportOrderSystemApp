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
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="user_id" class="block text-gray-700 font-bold mb-2">User ID:</label>
                            <select name="user_id" id="user_id" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ $order->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="car_id" class="block text-gray-700 font-bold mb-2">Car ID:</label>
                            <select name="car_id" id="car_id" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                                @foreach ($cars as $car)
                                    <option value="{{ $car->id }}" {{ $order->car_id == $car->id ? 'selected' : '' }}>
                                        {{ $car->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="driver_id" class="block text-gray-700 font-bold mb-2">Driver ID:</label>
                            <select name="driver_id" id="driver_id" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                                @foreach ($drivers as $driver)
                                    <option value="{{ $driver->id }}" {{ $order->driver_id == $driver->id ? 'selected' : '' }}>
                                        {{ $driver->id }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="order_date" class="block text-gray-700 font-bold mb-2">Order Date:</label>
                            <input type="datetime-local" name="order_date" id="order_date" value="{{ date('Y-m-d\TH:i', strtotime($order->order_date)) }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="payment_method" class="block text-gray-700 font-bold mb-2">Payment Method:</label>
                            <select name="payment_method" id="payment_method" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                                <option value="Cash" {{ $order->payment_method == 'Cash' ? 'selected' : '' }}>Cash</option>
                                <option value="Credit Card" {{ $order->payment_method == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="service_date" class="block text-gray-700 font-bold mb-2">Service Date:</label>
                            <input type="date" name="service_date" id="service_date" value="{{ $order->service_date }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="service" class="block text-gray-700 font-bold mb-2">Services:</label>
                            <select name="service" id="service" class="border border-gray-300 px-4 py-2 rounded-md w-full" multiple>
                                @foreach ($services as $service)
                                    @if ($service->name !== 'Disassembly + assembly')
                                        <option value="{{ $service->id }}" data-price="{{ $service->price }}" {{ in_array($service->id, $order->services->pluck('id')->toArray()) ? 'selected' : '' }}>
                                            {{ $service->name }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <label for="disassembly_assembly" class="block text-gray-700 font-bold mb-2 mt-2">
                                @foreach ($services as $service)
                                    @if ($service->name == 'Disassembly + assembly')
                                        <input type="checkbox" name="disassemblyService" value="{{ $service->id }}" data-price="{{ $service->price }}" {{ in_array($service->id, $order->services->pluck('id')->toArray()) ? 'checked' : '' }}>
                                        {{ $service->name }}
                                    @endif
                                @endforeach
                            </label>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 font-bold mb-2">Description:</label>
                            <input type="text" name="description" id="description" value="{{ $order->description }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="from" class="block text-gray-700 font-bold mb-2">From:</label>
                            <input type="text" name="from" id="from" value="{{ $order->from }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="destination" class="block text-gray-700 font-bold mb-2">Destination:</label>
                            <input type="text" name="destination" id="destination" value="{{ $order->destination }}" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                        </div>

                        <div class="mb-4">
                            <label for="total_amount" class="block text-gray-700 font-bold mb-2">Total Amount:</label>
                            <input type="number" name="total_amount" id="total_amount" value="{{ $order->total_amount }}" class="border border-gray-300 px-4 py-2 rounded-md w-full" readonly>
                        </div>

                        <div class="mb-4">
                            <label for="order_status" class="block text-gray-700 font-bold mb-2">Order Status:</label>
                            <select name="order_status" id="order_status" class="border border-gray-300 px-4 py-2 rounded-md w-full">
                                <option value="Pending" {{ $order->order_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Paid" {{ $order->order_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                <option value="In progress" {{ $order->order_status == 'In progress' ? 'selected' : '' }}>In progress</option>
                                <option value="Done" {{ $order->order_status == 'Done' ? 'selected' : '' }}>Done</option>
                                <option value="Cancelled" {{ $order->order_status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
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
    <script>
        const servicesSelect = document.getElementById('service');
        const disassemblyCheckbox = document.querySelector('input[name="disassemblyService"]');
        const totalAmountInput = document.getElementById('total_amount');

        // Funkcja do obliczania sumy cen usług
        function calculateTotalAmount() {
            let totalAmount = 0;

            const selectedOptions = Array.from(servicesSelect.selectedOptions);

            selectedOptions.forEach((option) => {
                const price = parseFloat(option.dataset.price);
                if (!isNaN(price)) {
                    totalAmount += price;
                }
            });

            if (disassemblyCheckbox.checked) {
                const disassemblyPrice = parseFloat(disassemblyCheckbox.dataset.price);
                if (!isNaN(disassemblyPrice)) {
                    totalAmount += disassemblyPrice;
                }
            }

            totalAmountInput.value = totalAmount.toFixed(2);
        }

        // Wywołaj funkcję calculateTotalAmount przy zmianie wyboru usług
        servicesSelect.addEventListener('change', calculateTotalAmount);
        disassemblyCheckbox.addEventListener('change', calculateTotalAmount);
    </script>
</x-app-layout>
