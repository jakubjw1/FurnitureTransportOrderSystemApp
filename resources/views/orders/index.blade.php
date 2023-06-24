<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Orders') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-10xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl font-bold mb-4">My Orders</h1>
                    <div class="overflow-x-auto">

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order ID
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Service
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Total Amount
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order Date
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Payment Method
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Service Date
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Description
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Order Status
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        From
                                    </th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Destination
                                    </th>
                                    <th class="px-16 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <ul>
                                                @foreach ($order->services as $service)
                                                    <li>{{ $service->name }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->total_amount }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->order_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->payment_method }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->service_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->description }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->order_status }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->from }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->destination }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($order->order_status !== 'Done' && $order->order_status !== 'In progress' && $order->order_status !== 'Cancelled')
                                                <form id="cancel-form-{{ $order->id }}" action="{{ route('orders.cancel', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                    <button type="submit" class="text-red-500">Cancel</button>
                                                </form>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if ($order->order_status !== 'Done' && $order->order_status !== 'In progress' && $order->order_status !== 'Cancelled')
                                                <form action="{{ route('orders.change-service-date', $order->id) }}" method="POST">
                                                    @csrf
                                                    <div class="flex justify-center">
                                                        <input type="date" name="new_service_date" min="{{ $minServiceDate }}" required>
                                                        <button type="submit" class="text-blue-500">Change Service Date</button>
                                                    </div>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
