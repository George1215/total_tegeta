<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route; // ✅ Import Route
use App\Http\Middleware\RoleMiddleware; // ✅ Import Middleware (Optional)

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    //         // ✅ Register Middleware Alias
    // Route::aliasMiddleware('role', \App\Http\Middleware\RoleMiddleware::class);
    Route::prefix('api')
    ->middleware('api')
    ->group(base_path('routes/api.php'));
    }
}
