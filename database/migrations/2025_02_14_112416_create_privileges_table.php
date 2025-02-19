<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('privileges', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Stores the privilege name (e.g., "manage_users")
            $table->timestamps();
        });

        // Insert default privileges
        DB::table('privileges')->insert([
            ['name' => 'manage_users'],  // Admin-only
            ['name' => 'approve_expenses'],  // Admin-only
            ['name' => 'approve_money_request'],  // Admin-only
            ['name' => 'approve_pump_shift'],  // Accountant/Admin
            ['name' => 'edit_shift_sheet'], // Pump Attendant
            ['name' => 'view_timetable'], // Shared Privilege
            ['name' => 'manage_fuel_delivery'], // Accountant/Admin
            ['name' => 'manage_creditors_debtors'], // Accountant/Admin
            ['name' => 'view_pump_leaderboard'], // Accountant/Admin
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('privileges');
    }
};
