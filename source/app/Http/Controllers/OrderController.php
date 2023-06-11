<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Order;

class OrderController extends Controller
{
    public function create($service_id)
    {
        $selectedService = Service::findOrFail($service_id);
        $totalAmount = $selectedService->price;
        $disassemblyService = Service::where('name', 'Disassembly + assembly')->firstOrFail();
        $disassemblyPrice = $disassemblyService->price;

        return view('order-create', compact('selectedService', 'totalAmount', 'disassemblyService', 'disassemblyPrice'));
    }

    public function store(Request $request)
    {
        // Pobierz dane z żądania
        $data = $request->all();

        // Tworzenie zamówienia
        $order = new Order();
        $order->user_id = Auth::id();
        $order->car_id = $data['car_id']; // Przykładowe pole z żądania
        $order->driver_id = $data['driver_id']; // Przykładowe pole z żądania
        $order->order_date = now();
        $order->payment_method = $data['payment_method']; // Przykładowe pole z żądania
        $order->order_status = 'Pending';
        $order->total_amount = $data['total_amount']; // Przykładowe pole z żądania
        $order->save();

        // Przekierowanie użytkownika po utworzeniu zamówienia
        return redirect()->route('order.show', $order->id)->with('success', 'Order created successfully');
    }

}
