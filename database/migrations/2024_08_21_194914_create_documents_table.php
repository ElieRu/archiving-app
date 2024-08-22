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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('titre')->max(50)->nullable();
            $table->string('chemin')->max(50)->nullable();
            $table->string('type')->max(50)->nullable();
            $table->integer('taille')->nullable();
            $table->string('extension')->max(50)->nullable();
            $table->string('description')->max(255)->nullable();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('classeur_id')->nullable()->constrained();
            $table->foreignId('service_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
