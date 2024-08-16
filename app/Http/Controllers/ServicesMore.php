<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ServicesMore extends Controller
{
    public function show()
    {
        return Inertia::render('ServicesMore');
    }
}
