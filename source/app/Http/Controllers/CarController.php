<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CarController extends Controller
{
    public function adminIndex()
    {
        $cars = Car::all();
        return view('admin.admin_cars', compact('cars'));
    }

    public function store(StoreCarRequest $request): RedirectResponse
    {
        Car::create($request->all());

        return redirect()->route('admin.cars.index');
    }

    public function edit($carId)
    {
        $car = Car::findOrFail($carId);
        return view('admin.edit_car', compact('car'));
    }

    public function update(StoreCarRequest $request, $carId): RedirectResponse
    {
        $car = Car::findOrFail($carId);

        $car->update($request->all());

        return redirect()->route('admin.cars.index');
    }

    public function destroy($carId): RedirectResponse
    {
        $car = Car::findOrFail($carId);
        $car->delete();

        return redirect()->route('admin.cars.index');
    }

}
