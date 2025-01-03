<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Apropos extends Controller
{
    public function show()
    {
        return Inertia::render('Apropos', [
            'user' => Auth::user()
        ]);
    }
}
