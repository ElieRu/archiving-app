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
            ['nom' => "administration", "user_id" => 1],
            ['nom' => 'commerciale', "user_id" => 1],
            ['nom' => 'technique', "user_id" => 1],
            ['nom' => 'finance', "user_id" => 1],
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
