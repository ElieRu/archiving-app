<?php

namespace App\Http\Controllers;

use App\Models\Etagere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Archivage extends Controller
{
    public function index()
    {
        return Inertia::render('Archivage', [
            'user' => Auth::user(),
            'etageres' => Etagere::all(),
        ]);
    }
}
