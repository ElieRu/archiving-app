<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class Agents extends Controller
{
    public function show()
    {
        return Inertia::render('Agents');
    }
}
