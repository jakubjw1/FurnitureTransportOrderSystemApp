<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        return view('services', compact('services'));
    }

    public function info(Service $service)
    {
        return view('service_info', ['service' => $service]);
    }

    public function adminIndex()
    {
        $services = Service::all();

        return view('admin.admin_services', compact('services'));
    }

    public function store(Request $request)
    {
        $service = new Service;

        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $service->image = '/images/' . $imageName;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service added successfully');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);

        return view('admin.edit_service', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $service->name = $request->name;
        $service->description = $request->description;
        $service->price = $request->price;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $imageName);
            $service->image = '/images/' . $imageName;
        }

        $service->save();

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully');
    }



    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully');
    }


}
