<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/entradas' , function () {
    return view('entradas');
})->name('entradas');

Route::get('/comprar_entradas' , function () {
    return view('comprar_entradas');
})->name('comprar_entradas')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Route::post('/cerrar-modal', [ModalController::class, 'cerrarModal'])->name('cerrar.modal');



//Ruta para comprar las entradas
Route::post('/guardar-entrada', [EntradaController::class, 'store'])->name('entradas.store');

//Ruta para ir al sobre nosotros
Route::get('/sobrenosotros' , function () {
    return view('sobrenosotros');
})->name('sobrenosotros');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
