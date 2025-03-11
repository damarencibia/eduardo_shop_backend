<?php
// routes/api.php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\RoleController;

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\SubcategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ImageController;

Route::get('/test', function () {
    return response()->json(['message' => '¡Funciona!']);
});


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Rutas para users
Route::prefix('users')->group(function () {
    Route::get('/', [UserController::class, 'index']); // Obtener todos los roles
    Route::get('/{id}', [UserController::class, 'show']); // Obtener un rol por ID
    Route::post('/', [UserController::class, 'store']); // Crear un nuevo rol
    Route::put('/{id}', [UserController::class, 'update']); // Actualizar un rol
    Route::delete('/{id}', [UserController::class, 'destroy']); // Eliminar un rol

     // Nueva ruta para asignar un rol a un usuario
     Route::post('/{id}/assign-role', [UserController::class, 'assignRole']);
});


// Rutas para roles
Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index']); // Obtener todos los roles
    Route::get('/{id}', [RoleController::class, 'show']); // Obtener un rol por ID
    Route::post('/', [RoleController::class, 'store']); // Crear un nuevo rol
    Route::put('/{id}', [RoleController::class, 'update']); // Actualizar un rol
    Route::delete('/{id}', [RoleController::class, 'destroy']); // Eliminar un rol
});

// Rutas para categories
Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index']); // Obtener todos los categories
    Route::get('/{id}', [CategoryController::class, 'show']); // Obtener un category por ID
    Route::post('/', [CategoryController::class, 'store']); // Crear un nuevo category
    Route::put('/{id}', [CategoryController::class, 'update']); // Actualizar un category
    Route::delete('/{id}', [CategoryController::class, 'destroy']); // Eliminar un category
});

// Rutas para subcategories
Route::prefix('subcategories')->group(function () {
    Route::get('/', [SubcategoryController::class, 'index']); // Obtener todos los subcategories
    Route::get('/{id}', [SubcategoryController::class, 'show']); // Obtener un category por ID
    Route::post('/', [SubcategoryController::class, 'store']); // Crear un nuevo category
    Route::put('/{id}', [SubcategoryController::class, 'update']); // Actualizar un category
    Route::delete('/{id}', [SubcategoryController::class, 'destroy']); // Eliminar un category
});



// Rutas para products
Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index']); // Obtener todos los productos
    Route::get('/{id}', [ProductController::class, 'show']); // Obtener un producto por ID
    Route::post('/', [ProductController::class, 'store']); // Crear un nuevo producto
    Route::put('/{id}', [ProductController::class, 'update']); // Actualizar un producto
    Route::delete('/{id}', [ProductController::class, 'destroy']); // Eliminar un producto
});

//POST: http://127.0.0.1:8000/api/products/3
// {
//     "code": "PROD003",
//     "name": "iPhone 13",
//     "description": "El último smartphone de Apple.",
//     "price": 999.99,
//     "amount": 50,
//     "state": "disponible",
//     "dimension": "14.67 x 7.15 x 0.76 cm",
//     "weight": 0.174,
//     "capacity": "128 GB",
//     "ability": "Resistente al agua",
//     "color": "Midnight",
//     "category_id": 1,
//     "subcategory_id": 1
//   }

// Rutas para imágenes de productos
Route::prefix('products/{productId}/images')->group(function () {
    Route::get('/', [ImageController::class, 'index']); // Obtener todas las imágenes de un producto
    Route::get('/{id}', [ImageController::class, 'show']); // Obtener una imagen por ID
    Route::post('/', [ImageController::class, 'store']); // Crear una nueva imagen para un producto
    Route::put('/{id}', [ImageController::class, 'update']); // Actualizar una imagen existente
    Route::delete('/{id}', [ImageController::class, 'destroy']); // Eliminar una imagen
});
