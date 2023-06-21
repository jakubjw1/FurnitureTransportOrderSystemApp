<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function adminIndex()
    {
        $cars = Car::all();
        return view('admin.admin_cars', compact('cars'));
    }
}
