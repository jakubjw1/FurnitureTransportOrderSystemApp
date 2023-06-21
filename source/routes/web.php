<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('mainpage');
});

Route::get('/mainpage', [MainPageController::class, 'index'])->name('mainpage');
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/services/{service}', [ServiceController::class, 'info'])->name('service.info');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/orders/create/{service_id}', [OrderController::class, 'create'])->name('order.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('order.store');
    Route::get('/orders/{user_id}', [OrderController::class, 'index'])->name('orders.index');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/orders', [AdminController::class, 'AdminOrders'])->name('admin.orders');
    Route::get('/admin/services', [AdminController::class, 'AdminServices'])->name('admin.services');
    Route::get('/admin/drivers', [AdminController::class, 'AdminDrivers'])->name('admin.drivers');
    Route::get('/admin/cars', [AdminController::class, 'AdminCars'])->name('admin.cars');

    Route::get('/admin/users', [UserController::class, 'adminIndex'])->name('admin.users.index');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{userId}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{userId}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{userId}', [UserController::class, 'destroy'])->name('admin.users.destroy');

    Route::get('/admin/orders', [OrderController::class, 'adminIndex'])->name('admin.orders.index');
    Route::get('/admin/orders/{orderId}/edit', [OrderController::class, 'edit'])->name('admin.orders.edit');
    Route::put('/admin/orders/{orderId}', [OrderController::class, 'update'])->name('admin.orders.update');
    Route::delete('/admin/orders/{orderId}', [OrderController::class, 'destroy'])->name('admin.orders.destroy');

    Route::get('/admin/services', [ServiceController::class, 'adminIndex'])->name('admin.services.index');
    Route::get('/admin/drivers', [DriverController::class, 'adminIndex'])->name('admin.drivers.index');
    Route::get('/admin/cars', [CarController::class, 'adminIndex'])->name('admin.cars.index');
});
