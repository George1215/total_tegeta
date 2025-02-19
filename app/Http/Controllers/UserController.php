<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    /**
     * Login a user and issue a Sanctum token.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            return response()->json([
                'success' => true,
                'token' => $token,
                'user' => $user
            ], 200);
        }

        return response()->json(['success' => false, 'message' => 'Invalid credentials'], 401);
    }

    /**
     * Logout a user and revoke their token.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json(['success' => true, 'message' => 'Logged out successfully']);
    }

    /**
     * Display users for the Client Admin's current station.
     */
    public function index()
{
    Log::info("🔵 Fetching users for station: " . (auth()->user()->station_id ?? 'null'));

    if (!auth()->check()) {
        Log::error("❌ User is not authenticated.");
        return response()->json(['success' => false, 'message' => 'Unauthenticated'], 401);
    }

    $stationId = auth()->user()->station_id ?? null;

    if (!$stationId) {
        Log::error("❌ Unauthorized access: No station ID found.");
        return response()->json([
            'success' => false,
            'message' => 'Unauthorized access'
        ], 403);
    }

    $users = User::where('station_id', $stationId)->get();
    
    Log::info("✅ Successfully fetched users", ['count' => count($users)]);
    
    return response()->json(['success' => true, 'users' => $users]);
}


    /**
     * Fetch all roles except "Super Admin".
     */
    public function getRoles()
    {
        $roles = Role::where('name', '!=', 'Super Admin')->get();
        return response()->json(['roles' => $roles]);
    }

    /**
     * Store a new user.
     */
    public function store(Request $request)
    {
        Log::info('🔵 Step 1: Received request', $request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'required|string|max:20',
            'role_id' => 'required|exists:roles,id',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            Log::error('❌ Step 2: Validation Failed', ['errors' => $validator->errors()]);
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $admin = auth()->user();

            if (!$admin || !$admin->hasRole('Client Admin')) {
                Log::error('❌ Step 3: Unauthorized User (Not a Client Admin)');
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized action. Only Client Admins can create users.'
                ], 403);
            }

            $stationId = session('current_station_id', $admin->station_id); 

            if (!$stationId) {
                Log::error('❌ Step 4: No Station Selected');
                return response()->json([
                    'success' => false,
                    'message' => 'No station selected. Please select a station before creating users.'
                ], 400);
            }

            Log::info('✅ Step 5: Creating user in station ID: ' . $stationId);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number, // ✅ Corrected 'phone' to 'phone_number'
                'role_id' => $request->role_id,
                'password' => Hash::make($request->password),
                'station_id' => $stationId,
            ]);

            Log::info('✅ Step 6: User created successfully', ['user_id' => $user->id]);

            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'user' => $user
            ], 201);

        } catch (\Exception $e) {
            Log::error('❌ Step 7: Error creating user', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to create user',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function getUser(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => $request->user()
        ]);
    }


    /**
     * Fetch a user for editing.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        
        // Allow only Client Admins or the user themselves to view the data
        if (auth()->user()->id !== $user->id && !auth()->user()->hasRole('Client Admin')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }

        return response()->json($user);
    }


    /**
     * Update user details.
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
            'role_id' => 'required|exists:roles,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number, // ✅ Ensure consistency
                'role_id' => $request->role_id,
            ]);

            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'user' => $user
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update user',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
