<?php

namespace App\Http\Controllers;

use App\Models\Etagere as ModelsEtagere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Etagere extends Controller
{
    public function create (Request $request) 
    {
        $default_name = "etagere(".$request->number.")";
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
}
