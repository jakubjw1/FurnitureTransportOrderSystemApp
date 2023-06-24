<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Models\Driver;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;

class DriverController extends Controller
{
    public function adminIndex()
    {
        $drivers = Driver::all();
        return view('admin.admin_drivers', compact('drivers'));
    }

    public function store(StoreDriverRequest $request): RedirectResponse
    {
        Driver::create($request->all());

        return redirect()->route('admin.drivers.index');
    }

    public function edit($driverId)
    {
        $driver = Driver::findOrFail($driverId);
        return view('admin.edit_driver', compact('driver'));
    }

    public function update(StoreDriverRequest $request, $driverId): RedirectResponse
    {
        $driver = Driver::findOrFail($driverId);

        $driver->update($request->all());

        return redirect()->route('admin.drivers.index');
    }

    public function destroy($driverId): RedirectResponse
    {
        $driver = Driver::findOrFail($driverId);
        $driver->delete();

        return redirect()->route('admin.drivers.index');
    }
}
