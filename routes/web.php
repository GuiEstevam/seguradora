<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DriverLicenseController;
use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\QueryValueCont;
use App\Http\Controllers\QueryValueController;
use App\Models\QueryValue;
use Illuminate\Support\Facades\Route;

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

Route::post('/login2', [AuthController::class, 'login'])->name('login2');

Route::get('/', function () {
    return view('new');
})->middleware(['auth', 'verified'])->name('new');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/enterprises', [EnterpriseController::class, 'index'])->name('enterprises.index');

Route::middleware(['auth'])->prefix('enterprises')->group(function () {
    Route::get('/create', [EnterpriseController::class, 'create'])->name('enterprises.create');
    Route::post('/', [EnterpriseController::class, 'store'])->name('enterprises.store');
    Route::get('/show/{id}', [EnterpriseController::class, 'show'])->name('enterprises.show');
    Route::put('/update/{id}', [EnterpriseController::class, 'update'])->name('enterprises.update');
});

Route::middleware(['auth', 'verified'])->prefix('users')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('users.index');
    Route::get('/create', [AuthController::class, 'create'])->name('users.create');
    Route::post('/', [AuthController::class, 'store'])->name('users.store');
    Route::get('/show/{id}', [AuthController::class, 'show'])->name('users.show');
    Route::put('/show/{id}', [AuthController::class, 'update'])->name('users.update');
});

Route::middleware(['auth', 'verified'])->prefix('query_value')->group(function () {
    Route::get('/show/{id}', [QueryValueController::class, 'show'])->name('query_value.show');
    Route::get('/create', [QueryValueController::class, 'create'])->name('query_value.create');
    // Route::get('/', [QueryValueController::class, 'index'])->name('register.index');
    Route::post('/{id}', [QueryValueController::class, 'store'])->name('query_value.store');
    // Route::put('/show/{id}', [QueryValueController::class, 'update'])->name('query_value.update');
});

Route::middleware(['auth', 'verified'])->prefix('driverLicense')->group(function () {
    Route::get('/', [DriverLicenseController::class, 'index'])->name('driverLicense.index');
    Route::get('/show/{id}', [DriverLicenseController::class, 'show'])->name('driverLicense.show');
    Route::get('/create', [DriverLicenseController::class, 'create'])->name('driverLicense.create');
    Route::post('/', [DriverLicenseController::class, 'store'])->name('driverLicense.store');
    Route::put('/show/{id}', [DriverLicenseController::class, 'update'])->name('driverLicense.update');
});

Route::middleware(['auth', 'verified'])->prefix('pesquisa')->group(function () {
    Route::view('/agregado', 'pesquisa.agregado');
});
Route::middleware(['auth', 'verified'])->prefix('pesquisa')->group(function () {
    Route::view('/frota', 'pesquisa.frota');
});
Route::middleware(['auth', 'verified'])->prefix('pesquisa')->group(function () {
    Route::view('/individual', 'pesquisa.indiviual');
});
Route::middleware(['auth', 'verified'])->prefix('pesquisa')->group(function () {
    Route::view('/empresa', 'pesquisa.empresa');
});
Route::middleware(['auth', 'verified'])->prefix('pesquisa')->group(function () {
    Route::view('/veiculo', 'pesquisa.veiculo');
});
Route::middleware(['auth', 'verified'])->prefix('pesquisa')->group(function () {
    Route::view('/cnh', 'pesquisa.cnh');
});
// Route::get('/enterprises', [EnterpriseController::class, 'index'])->name('enterprises.index');
// Route::get('/enterprises', [EnterpriseController::class, 'index'])->name('enterprises.index');
require __DIR__ . '/auth.php';
