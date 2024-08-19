<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class Agents extends Controller
{
    public function show()
    {
        return Inertia::render('Agents', [
            'users' => User::all()
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

        return Inertia::render('Agents');
    }
}
