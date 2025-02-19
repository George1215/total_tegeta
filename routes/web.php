<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FuelSupervisorController;
use App\Http\Controllers\PumpSupervisorController;
use App\Http\Controllers\FuelAssistantController;
use App\Http\Controllers\AccountantController;
use App\Http\Controllers\PumpAttendantController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\CheckStationAccess;

// ✅ Login Routes
Route::get('/', [CustomLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [CustomLoginController::class, 'login'])->name('login.post');
Route::post('/logout', [CustomLoginController::class, 'logout'])->name('logout');

// ✅ Super Admin Dashboard Route (Has access to everything)
Route::middleware(['auth', 'role:Super Admin'])->group(function () {
    Route::get('/super-admin-dashboard', function () {
        return view('super_admin.dashboard');
    })->name('super_admin.dashboard');

    // ✅ Super Admin manages all users and stations
    Route::prefix('super-admin')->group(function () {
        Route::get('/manage-users', [UserController::class, 'index'])->name('super_admin.manage-users');
        Route::post('/store-user', [UserController::class, 'store']);
        Route::get('/edit-user/{id}', [UserController::class, 'edit']);
        Route::post('/update-user/{id}', [UserController::class, 'update']);
        Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);
    });
});

// ✅ Client Admin Dashboard Route (Manages a single station)
Route::middleware(['auth', RoleMiddleware::class . ':Client Admin'])->group(function () {
    Route::get('/admin-dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // ✅ Client Admin can manage users within their station
    Route::prefix('admin')->group(function () {
        Route::get('/manage-users', function () {
            return view('admin.manage-users');
        })->name('admin.manage-users');

        Route::post('/store-user', [UserController::class, 'store']);
        Route::get('/edit-user/{id}', [UserController::class, 'edit']);
        Route::post('/update-user/{id}', [UserController::class, 'update']);
        Route::delete('/delete-user/{id}', [UserController::class, 'destroy']);
    });
});

// ✅ Accountant Dashboard (Restricted to their station)
Route::middleware(['auth', RoleMiddleware::class . ':Accountant', CheckStationAccess::class])->group(function () {
    Route::get('/accountant-dashboard', [AccountantController::class, 'index'])->name('accountant.dashboard');
});

// ✅ Pump Attendant Dashboard (Restricted to their station)
Route::middleware(['auth', RoleMiddleware::class . ':Pump Attendant', CheckStationAccess::class])->group(function () {
    Route::get('/pump-attendant-dashboard', [PumpAttendantController::class, 'index'])->name('pump_attendant.dashboard');
});

// ✅ Fuel Delivery Report Page (Any authenticated user can view)
Route::middleware('auth')->group(function () {
    Route::get('/fuel-delivery-report', function () {
        return view('fuel_supervisor.fuel-delivery-report');
    })->name('fuel.delivery.report');
});
