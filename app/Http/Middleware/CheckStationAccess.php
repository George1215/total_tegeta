<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStationAccess
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $selectedStation = $request->route('station_id'); // Get station from URL

        if (!$selectedStation) {
            \Log::error("Middleware: No station selected.");
            return redirect('/')->withErrors(['station' => 'No station selected.']);
        }

        // Super Admin can access all stations
        if ($user->role->name === 'Super Admin') {
            return $next($request);
        }

        // ✅ Fix: Client Admin should check station_id, NOT a collection
        if ($user->role->name === 'Client Admin' && $user->station_id == $selectedStation) {
            return $next($request);
        }

        // Everyone else can only access their assigned station
        if ($user->station_id != $selectedStation) {
            \Log::error("Unauthorized station access attempt: Station ID $selectedStation");
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
