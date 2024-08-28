<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::table('services')->insert([
            ['nom' => "service d'administration", "user_id" => 1],
            ['nom' => 'service commerciale', "user_id" => 1],
            ['nom' => 'service technique', "user_id" => 1],
            ['nom' => 'service de finance', "user_id" => 1],
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
