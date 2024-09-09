<?php

namespace App\Http\Controllers;

use App\Http\Requests\createService;
use App\Http\Requests\updateServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class Services extends Controller
{
    public function show()
    {
        $services = DB::table('services')
            ->join('services_users', 'services_users.service_id', '=', 'services.id')
            ->where('services_users.user_id', '=', Auth::user()->id)
            ->get();
        
        $all = Service::all();

        return Inertia::render('Services', [
            'user' => Auth::user(),
            'services' => Auth::user()->role == 'admin' ? $all : $services
        ]);
    }

    public function create(createService $request)
    {
        Service::create([
            'nom' => $request->nom,
            // 'description' => $request->description,
        ]);

        return Inertia::render('Services', [
            'user' => Auth::user(),
            'services' => Service::all()
        ]);
    }

    public function update(UpdateServiceRequest $request)
    {
        $service = DB::table('services')
            ->where('id', '=', $request->id)
            ->update([
                'nom' => $request->nom,
                'description' => $request->description
            ]);

        return Inertia::render('Services', [
            'user' => Auth::user(),
            'updated' => $service ? true : false,
            'services' => Service::all()
        ]);
    }

    public function delete(Request $request)
    {
        Service::findOrFail($request->id)->delete();
        return Inertia::render('Services', [
            'user' => Auth::user(),
            'services' => Service::all()
        ]);
    }
}
