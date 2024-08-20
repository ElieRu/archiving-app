<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('postname')->max(50)->nullable(true);
            $table->string('sexe')->max(50)->nullable(true);
            $table->string('matricule')->max(50)->nullable(true);
            $table->string('poste')->max(50)->nullable(true);
            $table->string('image')->max(50)->nullable(true)->default("/storage/default-img.png");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
