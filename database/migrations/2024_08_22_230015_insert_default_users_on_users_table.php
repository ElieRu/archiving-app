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
            ['name' => 'john', 'postname' => 'doe', 'poste' => 'caissier', 'sexe' => 'homme', 'matricule' => 'rtpokk09', 'email' => 'john@gmail.com', 'password' => $defaultPassword],
            ['name' => 'black', 'postname' => 'adam', 'poste' => 'caissier', 'sexe' => 'homme', 'matricule' => 'rtpkjju09', 'email' => 'black@gmail.com', 'password' => $defaultPassword],
            ['name' => 'billy', 'postname' => 'backer', 'poste' => 'caissier', 'sexe' => 'homme', 'matricule' => 'rtpkjju9', 'email' => 'billy@gmail.com', 'password' => $defaultPassword],
            ['name' => 'johny', 'postname' => 'walker', 'poste' => 'agent', 'sexe' => 'femme', 'matricule' => 'poijpokk09', 'email' => 'johny@gmail.com', 'password' => $defaultPassword],
            ['name' => 'paul', 'postname' => 'walker', 'poste' => 'agent', 'sexe' => 'femme', 'matricule' => 'ruhnokk09', 'email' => 'paul@gmail.com', 'password' => $defaultPassword],
            ['name' => 'chris', 'postname' => 'doe', 'poste' => 'agent', 'sexe' => 'femme', 'matricule' => 'rtpp0kk09', 'email' => 'chris@gmail.com', 'password' => $defaultPassword],
            ['name' => 'degol', 'postname' => 'adam', 'poste' => 'caissier', 'sexe' => 'homme', 'matricule' => 'rtpokk09', 'email' => 'degol@gmail.com', 'password' => $defaultPassword],
            ['name' => 'ndeko', 'postname' => 'backer', 'poste' => 'caissier', 'sexe' => 'homme', 'matricule' => 'rtpokk09', 'email' => 'ndeko@gmail.com', 'password' => $defaultPassword],
            ['name' => 'mondo', 'postname' => 'walker', 'poste' => 'caissier', 'sexe' => 'homme', 'matricule' => 'rtpokk09', 'email' => 'mondo@gmail.com', 'password' => $defaultPassword],
            ['name' => 'xavi', 'postname' => 'walker', 'poste' => 'caissier', 'sexe' => 'homme', 'matricule' => 'rtpokk09', 'email' => 'xavi@gmail.com', 'password' => $defaultPassword],
            ['name' => 'jean', 'postname' => 'walker', 'poste' => 'caissier', 'sexe' => 'homme', 'matricule' => 'rtpokk09', 'email' => 'jean@gmail.com', 'password' => $defaultPassword],
            ['name' => 'jeanne', 'postname' => 'doe', 'poste' => 'agent', 'sexe' => 'femme', 'matricule' => 'rtpokk09', 'email' => 'jeanne@gmail.com', 'password' => $defaultPassword],
            ['name' => 'doris', 'postname' => 'adam', 'poste' => 'agent', 'sexe' => 'femme', 'matricule' => 'rtpokk09', 'email' => 'doris@gmail.com', 'password' => $defaultPassword],
            ['name' => 'paolla', 'postname' => 'backer', 'poste' => 'agent', 'sexe' => 'femme', 'matricule' => 'rtpokk09', 'email' => 'paolla@gmail.com', 'password' => $defaultPassword],
            ['name' => 'marth', 'postname' => 'walker', 'poste' => 'agent', 'sexe' => 'femme', 'matricule' => 'rtpokk09', 'email' => 'marth@gmail.com', 'password' => $defaultPassword],
            ['name' => 'allonzo', 'postname' => 'walker', 'poste' => 'agent', 'sexe' => 'femme', 'matricule' => 'rtpokk09', 'email' => 'allonzo@gmail.com', 'password' => $defaultPassword],
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
