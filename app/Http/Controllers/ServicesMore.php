<?php

namespace App\Http\Controllers;

use App\Models\Classeur;
use App\Models\Document;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ServicesMore extends Controller
{
    public function show(Request $request)
    {
        $service = Service::findOrFail($request->id);
        // dd($request->searchClasseur);
        if ($request->role) {
            $classeurs = Classeur::where('id', '=', $service->id)
                ->get();
        } else {
            $classeurs = Classeur::query()
                ->where('user_id', '=', Auth::user()->id)
                ->where('service_id', '=', $service->id)
                ->when($request->searchClasseur, function ($query, $searchClasseur) {
                    $query->where('classeurs.nom', 'like', "%{$searchClasseur}%");
                })
                ->paginate(24)
                ->withQueryString();
        }

        return Inertia::render('ServicesMore', [
            'user' => Auth::user(),
            'service' => $service,
            'classeurs' => $classeurs,
            'documents' => Document::all()
        ]);
    }
}
