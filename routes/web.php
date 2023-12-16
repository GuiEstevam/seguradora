<?php

use App\Http\Controllers\EnterpriseController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('new');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->prefix('enterprises')->group(function () {
    Route::get('/', [EnterpriseController::class, 'index'])->name('enterprises.index');
    Route::get('/create', [EnterpriseController::class, 'create'])->name('enterprises.create');
    Route::post('/', [EnterpriseController::class, 'store'])->name('enterprises.store');
    // Route::get('/{enterprise}', [EnterpriseController::class, 'show'])->name('enterprises.show');
    // Route::get('/enterprises/{enterprise}/edit', [EnterpriseController::class, 'edit'])->name('enterprises.edit');
    // Route::patch('/enterprises/{enterprise}', [EnterpriseController::class, 'update'])->name('enterprises.update');
    // Route::delete('/enterprises/{enterprise}', [EnterpriseController::class, 'destroy'])->name('enterprises.destroy');
});
// Route::get('/enterprises', [EnterpriseController::class, 'index'])->name('enterprises.index');
// Route::get('/enterprises', [EnterpriseController::class, 'index'])->name('enterprises.index');
require __DIR__ . '/auth.php';
