<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UsersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::post('users', [UsersController::class, 'store']);
Route::post('/login', [UsersController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    // our routes to be protected will go in here

    Route::get('users', [UsersController::class, 'index']);
    // Route::post('users', [UsersController::class, 'store']);
    Route::get('users/{user}', [UsersController::class, 'show']);
    Route::put('users/{user}', [UsersController::class, 'update']);
    Route::delete('users/{user}', [UsersController::class, 'destroy']);

    Route::get("/logout", [UsersController::class, "logout"]);
    Route::resource('products', ProductController::class);
});
