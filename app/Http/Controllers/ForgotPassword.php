<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class ForgotPassword extends Controller
{
    public function show()
    {
        return Inertia::render('Auth/ForgotPassword');
    }
}
