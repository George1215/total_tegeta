<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            \Log::error("Middleware: User is not authenticated.");
            return redirect('/')->withErrors(['auth' => 'You must be logged in.']);
        }

        $user = Auth::user();

        // ✅ Check if role exists before accessing 'name'
        if (!$user->role) {
            \Log::error("Middleware: User has no assigned role. Access denied.");
            return redirect('/')->withErrors(['role' => 'Access Denied. No role assigned.']);
        }

        $roleName = $user->role->name;

        \Log::info("Middleware: Checking role. User role: $roleName, Required role: $role");

        if ($roleName !== $role) {
            \Log::error("Access Denied: User role is $roleName, but required is $role.");
            return redirect('/')->withErrors(['role' => 'Access Denied.']);
        }

        return $next($request);
    }
}
