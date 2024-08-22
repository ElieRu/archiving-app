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
        $defaultPassword = Hash::make('@Pass123');
        DB::table('users')->insert([
            ['name' => 'john', 'postname' => 'doe', 'email' => 'john@gmail.com', 'password' => $defaultPassword],
            ['name' => 'black', 'postname' => 'adam', 'email' => 'black@gmail.com', 'password' => $defaultPassword],
            ['name' => 'billy', 'postname' => 'backer', 'email' => 'billy@gmail.com', 'password' => $defaultPassword],
            ['name' => 'johny', 'postname' => 'walker', 'email' => 'johny@gmail.com', 'password' => $defaultPassword],
            ['name' => 'paul', 'postname' => 'walker', 'email' => 'paul@gmail.com', 'password' => $defaultPassword],
            ['name' => 'chris', 'postname' => 'doe', 'email' => 'chris@gmail.com', 'password' => $defaultPassword],
            ['name' => 'degol', 'postname' => 'adam', 'email' => 'degol@gmail.com', 'password' => $defaultPassword],
            ['name' => 'ndeko', 'postname' => 'backer', 'email' => 'ndeko@gmail.com', 'password' => $defaultPassword],
            ['name' => 'mondo', 'postname' => 'walker', 'email' => 'mondo@gmail.com', 'password' => $defaultPassword],
            ['name' => 'xavi', 'postname' => 'walker', 'email' => 'xavi@gmail.com', 'password' => $defaultPassword],
            ['name' => 'jean', 'postname' => 'walker', 'email' => 'jean@gmail.com', 'password' => $defaultPassword],
            ['name' => 'jeanne', 'postname' => 'doe', 'email' => 'jeanne@gmail.com', 'password' => $defaultPassword],
            ['name' => 'doris', 'postname' => 'adam', 'email' => 'doris@gmail.com', 'password' => $defaultPassword],
            ['name' => 'paolla', 'postname' => 'backer', 'email' => 'paolla@gmail.com', 'password' => $defaultPassword],
            ['name' => 'marth', 'postname' => 'walker', 'email' => 'marth@gmail.com', 'password' => $defaultPassword],
            ['name' => 'allonzo', 'postname' => 'walker', 'email' => 'allonzo@gmail.com', 'password' => $defaultPassword],
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
