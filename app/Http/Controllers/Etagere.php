<?php

namespace App\Http\Controllers;

use App\Models\Etagere as ModelsEtagere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use function Termwind\render;

class Etagere extends Controller
{
    public function create (Request $request) 
    {
        $default_name = "étagère(".$request->number.")";
        ModelsEtagere::create([
            'nom' => $default_name,
            'user_id' => Auth::user()->id
        ]);

        return to_route('archivage.index');
    }

    public function remove (Request $request)
    {
        ModelsEtagere::findOrFail($request->id)->delete();
        return to_route('archivage.index');
    }

    public function more (Request $request)
    {
        $etagere = ModelsEtagere::findOrFail($request->id);
        return Inertia::render('Etagere', [
            'user' => Auth::user(),
            'etagere' => $etagere
        ]);
    }
}
