<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class Agents extends Controller
{
    public function show()
    {
        $users = User::all();        
        return Inertia::render('Agents', [
            'users' => $users
        ]);
    }

    public function create(UserRequest $request)
    {
        $agent = User::create([
            'name' => $request->name,
            'postname' => $request->postname,
            'sexe' => $request->sexe,
            'matricule' => $request->matricule,
            'poste' => $request->poste,
            'email' => $request->email,
            'password' => '#Pass081'
        ]);

        return Inertia::render('Agents', [
            'users' => User::all()
        ]);
    }

    public function delete(Request $request)
    {
        User::findOrFail($request->id)->delete();
        return Inertia::render('Agents', [
            'users' => User::all()
        ]);
    }

    public function resetPassword(Request $request)
    {
        $defaultPassword = "#Pass081";
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'password' => $defaultPassword
            ]);
        return Inertia::render('Agents', [
            'users' => User::all()
        ]);
    }
}
