<?php

namespace App\Http\Controllers;

use App\Models\Classeur;
use App\Models\Document;
use App\Models\Service;
use App\Models\Services_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class ServicesMore extends Controller
{
    public function show(Request $request)
    {
        // dd($request->id);
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

            $documents = Document::query()
                ->where('service_id', '=', $service->id)
                ->paginate(24)
                ->withQueryString();
        }

        $users = DB::table('users')
            ->join('services_users', 'services_users.user_id', '=', 'users.id')
            ->where('services_users.service_id', '=', $request->id)
            ->get();

        return Inertia::render('ServicesMore', [
            'user' => Auth::user(),
            'users' => $users,
            'service' => $service,
            'classeurs' => $classeurs,
            'documents' => $documents
        ]);
    }

    public function deleteMembers(Request $request)
    {
        for ($i=0; $i<count($request->users_checked); $i++) {
            Services_user::findOrFail($request->users_checked[$i])->delete();
        }        
        return $this->show($request);
    }
}
