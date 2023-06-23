<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Order;
use App\Models\ServiceOrder;
use App\Models\User;
use App\Models\Car;
use App\Models\Driver;
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
        $order->from = $data['from'];
        $order->destination = $data['destination'];
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
        $minServiceDate = Carbon::now()->addDays(3)->format('Y-m-d');

        return view('orders.index', compact('orders', 'user_id', 'minServiceDate'));
    }

    public function adminIndex()
    {
        $orders = Order::all();

        return view('admin.admin_orders', compact('orders'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $users = User::all();
        $cars = Car::all();
        $drivers = Driver::all();
        $services = Service::all();
        $disassemblyService = Service::where('name', 'Disassembly + assembly')->firstOrFail();
        $disassemblyPrice = $disassemblyService->price;

        return view('admin.edit_order', compact('order', 'users', 'cars', 'drivers', 'services', 'disassemblyPrice'));
    }


    public function update(Request $request, $id)
    {
        $disassemblyService = Service::where('name', 'Disassembly + assembly')->firstOrFail();

        $order = Order::findOrFail($id);

        $order->user_id = $request->user_id;
        $order->car_id = $request->car_id;
        $order->driver_id = $request->driver_id;
        $order->order_date = $request->order_date;
        $order->payment_method = $request->payment_method;
        $order->service_date = $request->service_date;
        $order->description = $request->description;
        $order->from = $request->from;
        $order->destination = $request->destination;
        $order->order_status = $request->order_status;
        $order->total_amount = $request->total_amount;

        $order->services()->detach();

        $selectedServiceId = $request->input('service');
        $order->services()->attach($selectedServiceId);

        if ($request->has('disassemblyService')) {
            $order->services()->attach($disassemblyService->id);
        }

        $order->save();

        return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    }

    public function cancelOrder(Request $request)
    {
        $orderId = $request->input('order_id');

        $order = Order::findOrFail($orderId);

        if ($order->order_status !== 'Done' && $order->order_status !== 'In progress' && $order->order_status !== 'Cancelled') {
            $order->order_status = 'Cancelled';
            $order->save();

            return redirect()->back()->with('success', 'Order cancelled successfully.');
        }

        return redirect()->back()->with('error', 'Cannot cancel this order.');
    }


    public function changeServiceDate(Request $request, $orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return redirect()->back()->withErrors(['message' => 'Order does not exist.']);
        }

        if ($order->order_status === 'Done' || $order->order_status === 'In progress') {
            return redirect()->back()->withErrors(['message' => 'Cannot change service date with order status "Done" or "In progress".']);
        }

        $newServiceDate = $request->input('new_service_date');

        $order->service_date = $newServiceDate;
        $order->save();

        return redirect()->back()->with('status', 'Service date changed successfully.');
    }


}

