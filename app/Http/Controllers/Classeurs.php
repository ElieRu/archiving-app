<?php

namespace App\Http\Controllers;

use App\Models\Classeur;
use App\Models\Document;
use App\Models\Service;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class Classeurs extends Controller
{
    public function index()
    {
        dd('getting');
    }

    public function create(Request $request)
    {
        $classeurs = Classeur::where('user_id', Auth::user()->id)->get();
        $lenClasseurs = count($classeurs) + 1;
        $defaultName = "classeur(" . $lenClasseurs . ")";
        Classeur::create([
            'nom' => $defaultName,
            'user_id' => Auth::user()->id,
            'classeur_id' => $request->classeur_id ? $request->classeur_id : null,
            'service_id' => $request->service_id ? $request->service_id : null,
        ]);

        if ($request->service_id) {
            return redirect()->route('service.more', [
                'id' => $request->service_id
            ]);
        }

        return redirect()->route('document.show');
    }

    public function update(Request $request)
    {
        try {
            $valid = $request->validate([
                'nom' => 'required',
                'description' => "required"
            ]);
            DB::table('classeurs')
                ->where('id', $request->id)
                ->update([
                    'nom' => $request->nom,
                    'description' => $request->description
                ]);
            if ($request->service_id) {
                return Inertia::render('ServicesMore', [
                    'id' => $request->service_id
                ]);
            }
        } catch (Exception $e) {
            // if (!$request->service_id) {
            return Inertia::render('ServicesMore', [
                'id' => $request->service_id,
                'erros' => true
            ]);
            // }
        }

        // $classeurs = Classeur::where('user_id', '=', Auth::user()->id);
        // return Inertia::render('Documents', [
        //     'user' => Auth::user(),
        //     'documents' => Document::where(
        //         'user_id',
        //         '=',
        //         Auth::user()->id
        //     )
        //         ->where('classeur_id', '=', null)
        //         ->get(),
        //     'users' => User::all()
        //         ->where('role', '=', null)
        //         ->where('id', '!=', Auth::user()->id),
        //     'services' => Service::all(),
        //     'classeurs' => $classeurs
        //         ->get()
        // ]);
    }

    public function delete(Request $request)
    {
        // dd($request);
        Classeur::findOrFail($request->id)->delete();
        if ($request->table === 'documents') {
            return Inertia::render('Documents');
        }

        return Inertia::render('ServicesMore', [
            'id' => $request->service_id
        ]);
    }

    public function more(Request $request)
    {
        $classeur = Classeur::findOrFail($request->id);

        if ($request->service_id) {
            $documents = Document::where('service_id', '=', $request->service_id)
                ->where('classeur_id', '=', $request->id)
                ->paginate(24)
                ->withQueryString();
            $service = Service::where('id', '=', $request->service_id)->get()->last();

            return Inertia::render('Classeur', [
                'user' => Auth::user(),
                'classeur' => $classeur,
                'documents' => $documents,
                'service' => $service
            ]);
        } else {
            $documents = Document::where('classeur_id', '=', $request->id)
                ->where('user_id', '=', Auth::user()->id)
                ->paginate(24)
                ->withQueryString();

            return Inertia::render('Classeur', [
                'user' => Auth::user(),
                'classeur' => $classeur,
                'documents' => $documents
            ]);
        }
    }

    public function deleteMore(Request $request)
    {
        for ($i = 0; $i < count($request->datas); $i++) {
            Classeur::findOrFail($request->datas[$i])->delete();
        }
        $classeurs = Classeur::where('user_id', '=', Auth::user()->id);

        return Inertia::render('Documents', [
            'user' => Auth::user(),
            'documents' => Document::where(
                'user_id',
                '=',
                Auth::user()->id
            )
                ->where('classeur_id', '=', null)
                ->get(),
            'users' => User::all()
                ->where('role', '=', null)
                ->where('id', '!=', Auth::user()->id),
            'services' => Service::all(),
            'classeurs' => $classeurs
                ->get()
        ]);
    }
}
