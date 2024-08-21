<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Services extends Controller
{
    public function show()
    {
        return Inertia::render('Services', [
            'user' => Auth::user()
        ]);
    }
}
