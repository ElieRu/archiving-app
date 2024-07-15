<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class Home extends Controller
{
    public function show()
    {
        return Inertia::render('Home');
    }
}
