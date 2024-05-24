<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntradaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/entradas' , function () {
    return view('entradas');
})->name('entradas');

Route::get('/comprar_entradas' , function () {
    return view('comprar_entradas');
})->name('comprar_entradas');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Ruta para comprar las entradas
Route::post('/guardar-entrada', [EntradaController::class, 'store'])->name('entrada.store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
