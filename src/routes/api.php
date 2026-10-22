<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;

// Evitar Error 500 si no se envía Token
Route::get('/login', function () {
    return response()->json(['error' => 'No autorizado. Se requiere un token Bearer válido.'], 401);
})->name('login');

// Rutas Públicas (Lectura)
Route::get('/eventos', [EventoController::class, 'index']);
Route::get('/eventos/{id}', [EventoController::class, 'show']);

// Rutas Protegidas (Escritura)
Route::middleware('auth:api')->group(function () {
    Route::post('/eventos', [EventoController::class, 'store']);
    Route::put('/eventos/{id}', [EventoController::class, 'update']);
    Route::delete('/eventos/{id}', [EventoController::class, 'destroy']);
});
