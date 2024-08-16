<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class AddAgents extends Controller
{
    public function show()
    {
        return Inertia::render('AddAgents');
    }
}
