<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomLoginController extends Controller
{
    // Show custom login form
    public function showLoginForm()
    {
        return view('auth.custom-login'); // Custom login page
    }

    // Handle login logic
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        \Log::info("Attempting login for email: " . $request->email);
    
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            \Log::info("Login successful for: " . $user->email);
            \Log::info("User Role ID: " . $user->role_id);
            \Log::info("User Role Name: " . $user->role->name ?? 'NULL');
    
            // Ensure role exists
            if (!$user->role) {
                \Log::error("User does not have a role assigned!");
                Auth::logout();
                return redirect()->route('login')->withErrors(['role' => 'Your account is missing a role.']);
            }
    
            // Ensure Client Admin is assigned a station
            if ($user->role->name === 'Client Admin' && !$user->station) {
                \Log::error("Client Admin does not have an assigned station!");
                Auth::logout();
                return redirect()->route('login')->withErrors(['station' => 'You must be assigned to a station.']);
            }
    
            // Redirect user based on role
            switch ($user->role->name) {
                case 'Super Admin':
                    return redirect()->route('super_admin.dashboard'); // Now redirects to super admin dashboard
                case 'Client Admin':
                    return redirect()->route('admin.dashboard'); // Client Admin Dashboard
                case 'Accountant':
                    return redirect()->route('accountant.dashboard');
                case 'Pump Attendant':
                    return redirect()->route('pump_attendant.dashboard');
                default:
                    Auth::logout();
                    return redirect()->route('login')->withErrors(['role' => 'Role not recognized.']);
            }            
        }
    
        \Log::error("Login failed for email: " . $request->email);
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
    


    // Handle logout logic
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
