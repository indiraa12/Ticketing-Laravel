<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RuteController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BandaraController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransportationController;
use App\Http\Controllers\UserPaymentController;
use App\Http\Controllers\UserRuteController;
use App\Models\Payment;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('beranda');
});

Route::middleware('auth')->group(function () {
    Route::post("/logout", [LoginController::class, "logout"]);

    Route::get("/dashboard", [HomeController::class, "index"])->name('dashboard');
    Route::resource('pemesanan', UserPaymentController::class);
    Route::get("rutes/pesanan/{rute}", UserRuteController::class)->name('rutes.pesanan');


    Route::resource("/admin/pengguna", PenggunaController::class);
    Route::resource("/admin/type", TypeController::class);
    Route::resource("/admin/transportations", TransportationController::class);
    Route::resource("/admin/rutes", RuteController::class);
    Route::resource("/admin/payments", PaymentController::class);
});

Route::middleware('guest')->group(function () {
    Route::get("/login", [LoginController::class, "index"])->name('login');
    Route::post("/login", [LoginController::class, "authenticate"]);

    Route::get("/register", [RegisterController::class, "register"]);
    Route::post("/register", [RegisterController::class, "store"]);
});
