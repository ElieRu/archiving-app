<?php

namespace App\Http\Controllers;

use App\Models\Classeur;
use App\Models\Document;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class Classeurs extends Controller
{
    public function index()
    {
        dd('getting');
    }

    public function create(Request $request)
    {
        $classeurs = Classeur::where('user_id', Auth::user()->id)->get();
        $lenClasseurs = count($classeurs) + 1;
        $defaultName = "classeur(" . $lenClasseurs . ")";
        Classeur::create([
            'nom' => $defaultName,
            'user_id' => Auth::user()->id,
            'service_id' => $request->service_id ? $request->service_id : null
        ]);

        if ($request->service_id) {
            return redirect()->route('service.more', [
                'id' => $request->service_id
            ]);
        }

        return redirect()->route('document.show');
    }

    public function update(Request $request)
    {
        DB::table('classeurs')
            ->where('id', $request->id)
            ->update([
                'nom' => $request->nom,
                'description' => $request->description
            ]);

        $classeurs = Classeur::where('user_id', '=', Auth::user()->id);
        return Inertia::render('Documents', [
            'user' => Auth::user(),
            'documents' => Document::where(
                'user_id',
                '=',
                Auth::user()->id
            )
                ->where('classeur_id', '=', null)
                ->get(),
            'users' => User::all()
                ->where('role', '=', null)
                ->where('id', '!=', Auth::user()->id),
            'services' => Service::all(),
            'classeurs' => $classeurs
                ->get()
        ]);
    }

    public function delete(Request $request)
    {
        // dd($request);
        Classeur::findOrFail($request->id)->delete();
        if ($request->table === 'documents') {
            return Inertia::render('Documents');
        }

        return Inertia::render('ServicesMore', [
            'id' => $request->service_id
        ]);
    }

    public function deleteMore(Request $request)
    {
        for ($i = 0; $i < count($request->datas); $i++) {
            Classeur::findOrFail($request->datas[$i])->delete();
        }
        $classeurs = Classeur::where('user_id', '=', Auth::user()->id);

        return Inertia::render('Documents', [
            'user' => Auth::user(),
            'documents' => Document::where(
                'user_id',
                '=',
                Auth::user()->id
            )
                ->where('classeur_id', '=', null)
                ->get(),
            'users' => User::all()
                ->where('role', '=', null)
                ->where('id', '!=', Auth::user()->id),
            'services' => Service::all(),
            'classeurs' => $classeurs
                ->get()
        ]);
    }
}
