<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Order;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Carbon\Carbon;


class OrderController extends Controller
{
    public function create($service_id)
    {
        $selectedService = Service::findOrFail($service_id);
        $totalAmount = $selectedService->price;
        $disassemblyService = Service::where('name', 'Disassembly + assembly')->firstOrFail();
        $disassemblyPrice = $disassemblyService->price;
        $minServiceDate = Carbon::now()->addDays(3)->format('Y-m-d');

        return view('orders/create', compact('selectedService', 'totalAmount', 'disassemblyService', 'disassemblyPrice', 'minServiceDate'));
    }

    public function store(Request $request)
    {
        $includeDisassembly = $request->has('include_disassembly');
        // Pobierz dane z żądania
        $data = $request->all();

        // Tworzenie zamówienia
        $order = new Order();
        $order->user_id = Auth::id();
        $order->order_date = now();
        $order->payment_method = $data['payment_method'];
        $order->service_date = $data['service_date'];
        $order->description = $data['description'];
        $order->total_amount = $data['total_amount'];
        $order->order_status = 'Pending';
        $order->save();

        $order->services()->attach($data['service_id']);

        if ($includeDisassembly) {
            $order->services()->attach($data['disassembly_service_id']);
        }

        return redirect()->route('orders.index', $order->id)->with('success', 'Order created successfully');
    }

    public function index($user_id)
    {
        $orders = Auth::user()->orders;

        return view('orders.index', compact('orders', 'user_id'));
    }

    public function adminIndex()
    {
        $orders = Order::all();

        return view('admin.admin_orders', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.edit_order', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $order->user_id = $request->user_id;
        $order->car_id = $request->car_id;
        $order->driver_id = $request->driver_id;
        $order->order_date = $request->order_date;
        $order->payment_method = $request->payment_method;
        $order->service_date = $request->service_date;
        $order->description = $request->description;
        $order->total_amount = $request->total_amount;
        $order->order_status = $request->order_status;

        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }
}

