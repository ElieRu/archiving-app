<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // The Default password...
        $defaultPassword = Hash::make('@Pass123');
        DB::table('users')->insert([
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'poste' => 'admin',
                'password' => $defaultPassword
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
