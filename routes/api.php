<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    // Route::get('/roles', [UserController::class, 'getRoles']); // ✅ Fetch Roles for Dropdown
    Route::get('/roles', [UserController::class, 'getRoles'])->withoutMiddleware('auth:sanctum');
    Route::post('/users', [UserController::class, 'store']);
    Route::patch('/users/{id}', [UserController::class, 'update']);
    Route::delete('/users/{id}', [UserController::class, 'destroy']);
});


Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);


