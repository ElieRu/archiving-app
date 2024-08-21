<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AddAgents extends Controller
{
    public function show(Request $request)
    {
        return Inertia::render('AddAgents', [
            'user' => Auth::user()
        ]);
    }
}
