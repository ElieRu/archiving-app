<?php

namespace App\Http\Controllers;

use App\Models\Classeur;
use App\Models\Document;
use App\Models\Etagere;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class Dashboard extends Controller
{
    public function show(Request $request)
    {
        $classeurs = Classeur::where(
            'user_id',
            Auth::user()->id,
            'service_id',
            null,
            'etagere_id',
            null
        )->count();

        $documents = Document::where(
            'user_id',
            Auth::user()->id,
            'service_id',
            null,
            'etagere_id',
            null
        )->count();

        $services = Service::join('services_users', 'services_users.service_id', '=', 'services.id')
            ->where('services_users.user_id', '=', Auth::user()->id)->count();

        // Archibvage > Etagere
        $etageres = Etagere::all()->count();
        $etageres_classeurs = DB::table('classeurs')
            ->join('etageres', 'etageres.id', '=', 'classeurs.etagere_id')
            ->count();

        $etageres_documents = DB::table('documents')
            ->join('etageres', 'documents.etagere_id', '=', 'etageres.id')
            ->count();

        // Services > Classeurs
        $all_classeurs_services = Classeur::where('service_id', '<>', null)
            ->count();

        $classeurs_services = DB::table('classeurs')
            ->join('services', 'classeurs.service_id', '=', 'services.id')
            ->join('services_users', 'services_users.service_id', '=', 'services.id')
            ->where('services_users.user_id', '=', Auth::user()->id)
            ->select('classeurs.nom')
            ->count();

        $documents_services = DB::table('documents')
            ->join('services', 'documents.service_id', '=', 'services.id')
            ->join('services_users', 'services_users.service_id', '=', 'services.id')
            ->where('services_users.user_id', '=', Auth::user()->id)
            ->count();

        $all_documents_services = Document::where('service_id', '<>', null)
            ->count();

        return Inertia::render('Dashboard', [
            'user' => Auth::user(),
            'users' => User::all()->count(),
            'classeurs' => $classeurs,
            'documents' => $documents,
            'services' => Auth::user()->role ? Service::all()->count() : $services,
            'etageres' => $etageres,
            'etageres_classeurs' => $etageres_classeurs,
            'etageres_documents' => $etageres_documents,
            'classeurs_services' => Auth::user()->role ? $all_classeurs_services : $classeurs_services,
            'documents_services' => Auth::user()->role ? $all_documents_services : $documents_services,
        ]);
    }
}
