<?php
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExposicionController;
use App\Http\Controllers\ObrasController;
use App\Http\Controllers\UserController;




Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/entradas' , function () {
     return view('entradas');
})->name('entradas');

Route::get('/seleccionar_entrada/{id}', [EntradaController::class, 'seleccionarEntrada'])
    ->name('seleccionar_entrada');

    Route::post('/listar_exposiciones/{idExpo}', [EntradaController::class, 'procesarSeleccion'])->name('procesar_seleccion');

// Route::get('/comprar_entradas' , function () {
//     return view('comprar_entradas');
// })->name('comprar_entradas')->middleware('auth');

Route::get('/crear_obras', function () {
    $exposiciones = App\Models\Exposicion::all(); // Cargar todas las exposiciones desde el modelo Exposicion

    return view('crear_obras', compact('exposiciones'));
})->name('crear_obras')->middleware('auth');


Route::get('/crear_exposiciones' , function () {
    return view('crear_exposicion');
})->name('crear_exposiciones')->middleware('auth');

Route::get('/crear_usuario' , function () {
    return view('crear_usuario');
})->name('crear_usuario')->middleware('auth');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/listar_exposiciones' , function () {
    return view('listar_exposiciones');
})->name('listar_exposiciones');

// Route::get('/entradas_compradas' , function () {
//     return view('listar_entradas_compradas');
// })->name('entradas_compradas');

//Ruta para buscar una obra / exposicion en específico
Route::get('/buscar-obras', [ObrasController::class, 'buscar'])->name('buscar_obras');
Route::get('/buscar-exposiciones', [ExposicionController::class, 'buscar'])->name('buscar_exposiciones');
// Route::get('/buscar-usuarios', [UserController::class, 'buscar'])->name('buscar_usuarios');


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

//Ruta para mostrar el mapa
Route::get('/leaflet-map', [App\Http\Controllers\MapController::class, 'leaflet']);

//Ruta para listar todas las entradas que tiene un usuario
Route::get('/listar_entradas_compradas/{id}', [EntradaController::class, 'ver_entradas'])->name('entradas_compradas');

//Ruta para listar las exposiciones
Route::get('/listar_exposiciones', [ExposicionController::class, 'index'])->name('listar_exposiciones');

//Ruta para listar todos los usuarios en la gestion
Route::get('/gestion_usuarios', [UserController::class, 'index'])->middleware('admin')->name('gestion_usuarios');

//Ruta para listar las obras
Route::get('/listar_obras', [ObrasController::class, 'index'])->name('listar_obras');

// Route::post('/cerrar-modal', [ModalController::class, 'cerrarModal'])->name('cerrar.modal');

//Crear sesion que guarde el id de la exposicion a la que se ha clickeado en comprar
// Route::get('/comprar_entradas/{id}', [ExposicionController::class, 'crearSesionExposicion'])->name('comprar_entradas_directo')->middleware('auth');

// HACER DEBUG
// Route::get('/entradas', [EntradaController::class, 'mostrarTiposEntradas'])->name('entradas');

// Route::get('/comprar/{id}', [EntradaController::class, 'comprarDirecto'])->name('comprar_entradas_directo');

//Ruta para comprar las entradas
Route::post('/guardar-entrada', [EntradaController::class, 'store'])->name('entradas.store');
Route::post('/listar_exposicion', [EntradaController::class, 'updateExpo'])->name('entradasExpo.store');


//Ruta para guardar obras
Route::post('/obras', [ObrasController::class, 'store'])->name('obras.store');

//Ruta para guardar las exposiciones
Route::post('/exposiciones', [ExposicionController::class, 'store'])->name('expo.store');

//Ruta para guardar los usuarios
Route::post('/users', [UserController::class, 'store'])->middleware('admin')->name('user.store');

//Ruta para actualizae las exposiciones
Route::put('/expo/{id}', [ExposicionController::class, 'update'])->name('expo.update');
Route::get('/expo/{id}/edit', [ExposicionController::class, 'edit'])->name('expo.edit');

//Ruta para actualizae las obras
Route::get('/obra/{id}/edit', [ObrasController::class, 'edit'])->name('obra.edit');
Route::put('/obra/{id}', [ObrasController::class, 'update'])->name('obra.update');

//Ruta para actualizae los usuarios
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->middleware('admin')->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->middleware('admin')->name('user.update');

//Ruta para coger los tipos de entradas
Route::get('/entradas', [EntradaController::class, 'index'])->name('entradas');
Route::get('/comprar_entradas/{tipoEntrada}/{precio}', [EntradaController::class, 'comprar_entradas'])->name('comprar_entradas');
Route::get('/comprar_entradas2/{exposicion}', [EntradaController::class, 'comprarEntradas2'])->name('comprar_entradas2');



//Ruta para ir al sobre nosotros
Route::get('/sobrenosotros' , function () {
    return view('sobrenosotros');
})->name('sobrenosotros');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Ruta para borrar una obra en específico
Route::delete('/obra/{id}', [ObrasController::class, 'destroy'])->name('obra.destroy');

//Ruta para borrar una exposición en específico
Route::delete('/expo/{id}', [ExposicionController::class, 'destroy'])->name('expo.destroy');

//Ruta para borrar un usuario en específico
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');



require __DIR__.'/auth.php';
