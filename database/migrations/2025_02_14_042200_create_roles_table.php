<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB facade

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // Automatically creates an unsignedBigInteger primary key
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Insert default roles
        DB::table('roles')->insert([
            ['id' => 1, 'name' => 'Super Admin', 'created_at' => now(), 'updated_at' => now()], // Monitors all clients & stations
            ['id' => 2, 'name' => 'Client Admin', 'created_at' => now(), 'updated_at' => now()], // Manages their own stations
            ['id' => 3, 'name' => 'Accountant', 'created_at' => now(), 'updated_at' => now()], // Manages finances
            ['id' => 4, 'name' => 'Pump Attendant', 'created_at' => now(), 'updated_at' => now()], // Handles fuel sales
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
};
