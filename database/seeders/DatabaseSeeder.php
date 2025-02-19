<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ✅ Insert Default Roles (Ensure roles exist before creating users)
        DB::table('roles')->insertOrIgnore([
            ['id' => 1, 'name' => 'Super Admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Client Admin', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'name' => 'Accountant', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'name' => 'Pump Attendant', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ✅ Insert a Default Client
        DB::table('clients')->insertOrIgnore([
            ['id' => 1, 'company_name' => 'Total Tegeta', 'contact_email' => 'contact@totaltegeta.com', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ✅ Insert a Default Station for the Client
        DB::table('stations')->insertOrIgnore([
            ['id' => 1, 'client_id' => 1, 'station_name' => 'TotalTegeta Station', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // ✅ Insert a Default User (Client Admin)
        DB::table('users')->insertOrIgnore([
            [
                'id' => 1,
                'name' => 'Client Admin User',
                'email' => 'clientadmin@example.com',
                'phone_number' => '255123456789',
                'password' => Hash::make('password'), // Default password: password
                'role_id' => 2, // Client Admin Role
                'station_id' => 1, // Assign to first station
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // ✅ Insert a Default User (Super Admin)
        DB::table('users')->insertOrIgnore([
            [
                'id' => 2,
                'name' => 'Super Admin User',
                'email' => 'admin@example.com',
                'phone_number' => '255987654321',
                'password' => Hash::make('password'), // Default password: password
                'role_id' => 1, // Super Admin Role
                'station_id' => null, // Super Admin can access all stations
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
