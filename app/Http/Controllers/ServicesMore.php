<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ServicesMore extends Controller
{
    public function show(Request $request)
    {
        $service = Service::findOrFail($request->id);
        return Inertia::render('ServicesMore', [
            'user' => Auth::user(),
            'service' => $service
        ]);
    }
}
