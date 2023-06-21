<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function adminIndex()
    {
        $drivers = Driver::all();

        return view('admin.admin_drivers', compact('drivers'));
    }
}
