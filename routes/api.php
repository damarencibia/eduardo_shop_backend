<?php

// routes/api.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


// Rutas protegidas, requieren autenticación
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', [UserController::class, 'index']); // Obtener todos los usuarios
    Route::get('/{id}', [UserController::class, 'show']); // Obtener un usuario por ID
    Route::post('/', [UserController::class, 'store']); // Crear un nuevo usuario
    Route::put('/{id}', [UserController::class, 'update']); // Actualizar un usuario
    Route::delete('/{id}', [UserController::class, 'destroy']); // Eliminar un usuario

    // Rutas adicionales para roles
    Route::post('/{id}/assign-role', [UserController::class, 'assignRole']); // Asignar un rol a un usuario
    Route::get('/{id}/roles', [UserController::class, 'getUserRoles']); // Obtener los roles de un usuario


});

