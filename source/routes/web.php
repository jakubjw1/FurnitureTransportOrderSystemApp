<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\OrderController;
use App\Models\Service;

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

Route::get('/order/create/{service_id}', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});
