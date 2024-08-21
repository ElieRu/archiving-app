<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class Agents extends Controller
{
    public function show(Request $request)
    {
        $users = User::query()
            ->when($request->search, function ($query, $search) {
                $query->where('users.name', 'like', "%{$search}%");
            })
            ->when($request->sort, function ($query, $sort) {
                $query->where('users.poste', 'like', "%{$sort}%");
            })
            ->paginate(10)
            ->withQueryString();

        return Inertia::render('Agents', [
            'users' => $users,
            'user' => Auth::user()
        ]);
    }

    public function create(UserRequest $request)
    {
        User::create([
            'name' => $request->name,
            'postname' => $request->postname,
            'sexe' => $request->sexe,
            'matricule' => $request->matricule,
            'poste' => $request->poste,
            'email' => $request->email,
            'password' => '#Pass081'
        ]);

        return Inertia::render('Agents', [
            'users' => User::all(),
            'user' => Auth::user() 
        ]);
    }

    public function delete(Request $request)
    {
        User::findOrFail($request->id)->delete();
        return Inertia::render('Agents', [
            'users' => User::all()
        ]);
    }

    public function update(UserRequest $request)
    {
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'name' => $request->name,
                'postname' => $request->postname,
                'sexe' => $request->sexe,
                'matricule' => $request->matricule,
                'poste' => $request->poste,
                'email' => $request->email,
            ]);
            
        return Inertia::render('Agents', [
            'users' => User::all(),
            'user' => Auth::user()
        ]);
    }

    public function resetPassword(Request $request)
    {
        $defaultPassword = Hash::make("#Pass081");
        DB::table('users')
            ->where('id', $request->id)
            ->update([
                'password' => $defaultPassword
            ]);
        return Inertia::render('Agents', [
            'users' => User::all()
        ]);
    }

    public function findById(Request $request)
    {
        $user = User::select('id', 'name', 'postname', 'poste', 'sexe', 'matricule', 'email', 'image')->findOrFail($request->id);
        
        return Inertia::render('AddAgents', [
            'user' => $user
        ]);
    }

    public function updatePassword(UserRequest $request)
    {
        dd('updated');
    }
    
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $image = $file->store("profile", 'public');
            $image = "/" . $image;

            User::where('id', $request->id)
                ->update([
                    'image' => $image
                ]);

                return Inertia::render('Profile', [
                    'user' => Auth::user()
                ]);
        }
    }
}
