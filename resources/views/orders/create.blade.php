<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Order') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form id="placeOrderForm" method="POST" action="{{ route('order.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="service_date" class="block font-bold mb-2">Service Date:</label>
                            <input type="date" name="service_date" id="service_date" class="border border-gray-300 rounded-lg p-2" min="{{ $minServiceDate }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block font-bold mb-2">Description: (type of furniture and its dimensions in cm - height x width x length)</label>
                            <textarea name="description" id="description" class="border border-gray-300 rounded-lg p-2" required></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="from" class="block font-bold mb-2">From:</label>
                            <input type="text" name="from" id="from" class="border border-gray-300 rounded-lg p-2" required>
                        </div>

                        <div class="mb-4">
                            <label for="destination" class="block font-bold mb-2">Destination:</label>
                            <input type="text" name="destination" id="destination" class="border border-gray-300 rounded-lg p-2" required>
                        </div>

                        <h3 class="text-xl">Selected Serivces:</h3>

                        <div class="mb-4">
                            <input type="hidden" name="service_id" value="{{ $selectedService->id }}">
                            <h3 class="text-2xl">{{ $selectedService->name }}</h3>
                            <p style="font-size: 18px;">{{ $selectedService->price }}PLN</p>
                        </div>

                        <div id="disassemblyInfo" class="hidden mb-4">
                            <input type="hidden" name="disassembly_service_id" value="{{ $disassemblyService->id }}">
                            <h3 class="text-2xl">{{ $disassemblyService->name }}</h3>
                            <p style="font-size: 18px;">{{ $disassemblyPrice }}PLN</p>
                        </div>

                        <div class="mb-4">
                            <label class="block font-bold mb-2">
                                <input type="checkbox" name="include_disassembly" id="include_disassembly">
                                Include Disassembly + Assembly
                            </label>
                        </div>

                        <div class="mb-4">
                            <label for="payment_method" class="block font-bold mb-2">Payment Method:</label>
                            <select name="payment_method" id="payment_method" class="border border-gray-300 rounded-lg p-2">
                                <option value="Cash">Cash</option>
                                <option value="Credit Card" disabled>Credit Card(currently unavailable)</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <p>Total Amount: <span id="totalAmount">{{ $selectedService->price }}</span> PLN</p>
                            <input type="hidden" name="total_amount" value="{{ $selectedService->price }}" />
                        </div>

                        <button id="placeOrderBtn" type="submit" class="rounded-md bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mb-4">
                            Place Order
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var totalAmountElement = document.getElementById('totalAmount');
            var includeDisassemblyCheckbox = document.getElementById('include_disassembly');
            var placeOrderButton = document.getElementById('placeOrderBtn');
            var includeDisassembly = false;

            includeDisassemblyCheckbox.addEventListener('change', function() {
                includeDisassembly = includeDisassemblyCheckbox.checked;

                if (includeDisassembly) {
                    document.getElementById('disassemblyInfo').classList.remove('hidden');
                    totalAmountElement.textContent = parseInt('{{ $selectedService->price }}') + parseInt('{{ $disassemblyPrice }}');
                    document.querySelector('input[name="total_amount"]').value = parseInt('{{ $selectedService->price }}') + parseInt('{{ $disassemblyPrice }}');
                } else {
                    document.getElementById('disassemblyInfo').classList.add('hidden');
                    totalAmountElement.textContent = parseInt('{{ $selectedService->price }}');
                    document.querySelector('input[name="total_amount"]').value = parseInt('{{ $selectedService->price }}');
                }
            });
        });
    </script>
</x-app-layout>
