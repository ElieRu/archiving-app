<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestsEtagere;
use App\Models\Classeur;
use App\Models\Etagere as ModelsEtagere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

use function Laravel\Prompts\alert;
use function Laravel\Prompts\search;
use function Termwind\render;

class Etagere extends Controller
{
    public function index(Request $request)
    {
        $etageres = ModelsEtagere::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%");
            })->get();

        return Inertia::render('Archivage', [
            'user' => Auth::user(),
            'etageres' => $etageres,
        ]);
    }

    public function create(Request $request)
    {
        $default_name = "étagère(" . $request->number . ")";
        ModelsEtagere::create([
            'nom' => $default_name,
            'user_id' => Auth::user()->id
        ]);

        $last = ModelsEtagere::all()->last();

        Classeur::create([
            'nom' => 'accueil',
            'type' => 'default',
            'user_id' => Auth::user()->id,
            'etagere_id' => $last->id,
        ]);

        return to_route('etageres.index');
    }

    public function update(RequestsEtagere $request)
    {
        DB::table('etageres')
            ->where('id', $request->id)
            ->update([
                'nom' => $request->nom,
                'description' => $request->description
            ]);

        return Inertia::render('Archivage', [
            'user' => Auth::user(),
            'updated' => true,
            'etageres' => ModelsEtagere::all(),
        ]);
    }

    public function remove(Request $request)
    {
        ModelsEtagere::findOrFail($request->id)->delete();
        return to_route('etageres.index');
    }

    public function more(Request $request)
    {
        $etagere = ModelsEtagere::findOrFail($request->id);
        $classeurs = Classeur::where('etagere_id', '=', $request->id)
            ->where('service_id', null)
            ->when($request->search, function ($query, $search) {
                $query->where('nom', 'like', "%{$search}%");
            })
            ->paginate(24)
            ->withQueryString();

        return Inertia::render('Etagere', [
            'user' => Auth::user(),
            'etagere' => $etagere,
            'classeurs' => $classeurs
        ]);
    }
}
