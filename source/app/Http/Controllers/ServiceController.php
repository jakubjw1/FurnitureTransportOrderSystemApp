<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

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

}
