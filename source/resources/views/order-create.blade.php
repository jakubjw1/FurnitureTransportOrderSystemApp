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
                    <form id="placeOrderForm" method="POST" action="{{ route('order.store') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="payment_method" class="block font-bold mb-2">Payment Method:</label>
                            <select name="payment_method" id="payment_method" class="border border-gray-300 rounded-lg p-2">
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Credit Card</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-2xl">{{ $selectedService->name }}</h3>
                            <p>{{ $selectedService->description }}</p>
                            <p style="font-size: 18px;">{{ $selectedService->price }}PLN</p>
                        </div>

                        <div class="mb-4">
                            <h3 class="text-2xl">{{ $disassemblyService->name }}</h3>
                            <p>{{ $disassemblyService->description }}</p>
                            <p style="font-size: 18px;">{{ $disassemblyPrice }}PLN</p>
                        </div>

                        <div class="mb-4">
                            <form id="addDisassemblyForm" action="#" method="POST">
                                @csrf
                                <button id="disassemblyBtn" type="submit" class="rounded-md bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
                                    Add Disassembly + assembly
                                </button>
                            </form>
                        </div>

                        <div class="mb-4">
                            <p>Total Amount: <span id="totalAmount">{{ $totalAmount }}</span> PLN</p>
                            <input type="hidden" name="total_amount" value="{{ $totalAmount }}" />
                        </div>

                        <button id="placeOrderBtn" type="submit" class="rounded-md bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4">
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
                var includeDisassemblyButton = document.getElementById('disassemblyBtn');
                var placeOrderButton = document.getElementById('placeOrderBtn');
                var includeDisassembly = false;

                includeDisassemblyButton.addEventListener('click', function(event) {
                    event.preventDefault();

                    includeDisassembly = !includeDisassembly;

                    if (includeDisassembly) {
                        includeDisassemblyButton.textContent = 'Remove Disassembly + assembly';
                        totalAmountElement.textContent = parseInt('{{ $selectedService->price }}') + parseInt('{{ $disassemblyPrice }}');
                    } else {
                        includeDisassemblyButton.textContent = 'Add Disassembly + assembly';
                        totalAmountElement.textContent = parseInt('{{ $selectedService->price }}');
                    }
                });
            });
    </script>
</x-app-layout>
