<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Dashboard extends Controller
{
    public function show()
    {
        return Inertia::render('Dashboard', [
            'user' => Auth::user()
        ]);
    }
}
