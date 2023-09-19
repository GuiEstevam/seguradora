<?php

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
Route::get('/pesquisa/autonomo', function () {
    return view('pesquisa.autonomo');
});
Route::get('/pesquisa/agregado', function () {
    return view('pesquisa.agregado');
});
Route::get('/pesquisa/frota', function () {
    return view('pesquisa.frota');
});
Route::get('/pesquisa/individual', function () {
    return view('pesquisa.individual');
});
Route::get('/pesquisa/veiculo', function () {
    return view('pesquisa.veiculo');
});
Route::get('/pesquisa/empresa', function () {
    return view('pesquisa.empresa');
});
Route::get('/pesquisa/cnh', function () {
    return view('pesquisa.cnh');
});
Route::get('/pesquisa/consulta', function () {
    return view('pesquisa.consulta');
});
Route::get('/renovacao/registro', function () {
    return view('renovação.registro');
});
Route::get('/relatorio/recentes', function () {
    return view('relatorio.recentes');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
