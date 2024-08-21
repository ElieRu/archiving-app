<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Archivage extends Controller
{
    public function show()
    {
        return Inertia::render('Archivage', [
            'user' => Auth::user()
        ]);
    }
}
