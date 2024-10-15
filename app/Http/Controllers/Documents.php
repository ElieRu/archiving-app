<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Classeur;
use App\Models\Document;
use App\Models\Etagere;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;


use function PHPSTORM_META\type;

class Documents extends Controller
{
    public function index(Request $request)
    {
        $classeur = Classeur::findOrFail($request->id);
        if ($request->id && !$request->service_id && !$request->etagere_id) {
            // Documents > Classeur
            $classeurs = Classeur::query()
                ->where('user_id', Auth::user()->id)
                ->where('id', '<>', $request->id)
                ->where('service_id', null)
                ->where('etagere_id', null)
                ->when($request->search, function ($query, $search) {
                    $query->where('classeurs.nom', 'like', "%{$search}%");
                })
                ->paginate(24)
                ->withQueryString();

            $services = DB::table('services')
                ->join('classeurs', 'classeurs.service_id', '=', 'services.id')
                ->where('classeurs.type', '=', 'default')
                ->select('classeurs.id as classeur_id', 'services.nom', 'services.id')
                ->get();

            $documents = Document::where('user_id', Auth::user()->id)
                ->where('service_id', null)
                ->where('classeur_id', $request->id)
                ->where('etagere_id', null)
                ->when($request->search, function ($query, $search) {
                    $query->where('documents.titre', 'like', "%{$search}%");
                })->paginate(24)
                ->withQueryString();

            $users = DB::table('users')
                ->join('classeurs', 'classeurs.user_id', '=', 'users.id')
                ->where('users.role', '=', null)
                ->where('classeurs.type', '=', 'default')
                ->where('users.id', '!=', Auth::user()->id)
                ->select('users.id', 'users.name', 'users.postname', 'users.email', 'classeurs.id as classeur_id')
                ->get();
            
            $etageres = DB::table('etageres')
                ->join('classeurs', 'etageres.id', '=', 'classeurs.etagere_id')
                ->where('classeurs.type', '=', 'default')
                ->select('etageres.id', 'etageres.nom', 'classeurs.id as classeur_id')
                ->get();
            // dd($etageres);  

            return Inertia::render('Classeur', [
                'user' => Auth::user(),
                'documents' => $documents,
                'users' => $users,
                'services' => $services,
                'classeurs' => $classeurs,
                'classeur' => $classeur,
                'back_menu' => false,
                'etagere' => '',
                'etageres' => $etageres
            ]);
        }
    }

    public function show(Request $request)
    {
        $classeurs = Classeur::query()
            ->where('user_id', Auth::user()->id)
            ->where('service_id', null)
            ->where('etagere_id', null)
            ->when($request->search, function ($query, $search) {
                $query->where('classeurs.nom', 'like', "%{$search}%");
            })
            ->paginate(24)
            ->withQueryString();

        $documents = Document::where('user_id', Auth::user()->id)
            ->where('service_id', null)
            ->where('classeur_id', '=', null);

        return Inertia::render('Documents', [
            'user' => Auth::user(),
            'documents' => $documents,
            'users' => User::all()
                ->where('role', '=', null)
                ->where('id', '!=', Auth::user()->id),
            'services' => Service::all(),
            'classeurs' => $classeurs
        ]);
    }

    public function create(Request $request)
    {
        $documents = Document::where('user_id', '=', Auth::user()->id)->get();
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileSize = $file->getSize();
            $extension = '.' . $file->getClientOriginalExtension();
            $filename = substr($file->getClientOriginalName(), 0, strlen($file->getClientOriginalName()) - strlen($extension));
            $path = $file->store("documents", 'public');
            $path = "/" . $path;

            Document::create([
                'titre' => $filename,
                'chemin' => $path,
                'taille' => $fileSize,
                'extension' => $extension,
                'user_id' => Auth::user()->id,
                'service_id' => $request->service_id,
                'classeur_id' => $request->classeur_id,
                'etagere_id' => $request->etagere_id,
            ]);

            if ($request->service_id && $request->classeur_id && !$request->etagere_id) {
                // Etagere > Classeur > Services
                return redirect()->route('service.classeur', [
                    'service_id' => $request->service_id,
                    'id' => $request->classeur_id
                ]);
            }

            if ($request->classeur_id && !$request->etagere_id && !$request->service_id) {
                // Classeur > More
                return redirect()->route('classeur.more', [
                    'id' => $request->classeur_id
                ]);
            }

            if ($request->classeur_id && $request->etagere_id && !$request->service_id) {
                // Etagere > Classeur > Documents
                return redirect()->route('etagere.classeur', [
                    'etagere_id' => $request->etagere_id,
                    'id' => $request->classeur_id
                ]);
            }
        }
    }

    public function update(Request $request)
    {
        $documents = Document::where('user_id', '=', Auth::user()->id)->get();
        DB::table('documents')
            ->where('id', $request->id)
            ->update([
                'titre' => $request->titre,
                'type' => $request->type,
                'description' => $request->description
            ]);

        return Inertia::render('Documents', [
            'user' => Auth::user(),
            'users' => User::all()
                ->where('role', '=', null)
                ->where('id', '!=', Auth::user()->id),
            'services' => Service::all(),
            'documents' => $documents,
            'updated' => true
        ]);
    }

    public function delete(Request $request)
    {
        Document::findOrFail($request->id)->delete();
        // Done for *documents
        if ($request->classeur_id && !$request->service_id && !$request->etagere_id) {
            $request->id = $request->classeur_id;
            return $this->index($request);
        }

        // Done for archivage
        if ($request->classeur_id && $request->etagere_id && !$request->service_id) {
            $request->id = $request->classeur_id;
            return $this->index($request);
        }

        // Done for *services
        if ($request->classeur_id && $request->service_id) {
            $request->id = $request->classeur_id;
            return $this->index($request);
        }
    }

    public function share(Request $request)
    {
        $content = json_decode($request->getContent());
        $sharedDoc = Document::findOrFail($content->docId);

        if ($content->checkedUsers) {
            for ($i = 0; $i < count($content->checkedUsers); $i++) {
                // dd($content->checkedUsers[$i]);
                Document::create([
                    'user_id' => Auth::user()->id,
                    'titre' => $sharedDoc->titre,
                    'chemin' => $sharedDoc->chemin,
                    'taille' => $sharedDoc->taille,
                    'extension' => $sharedDoc->extension,
                    'classeur_id' => $content->checkedUsers[$i]->classeur_id,
                    'user_id' => $content->checkedUsers[$i]->id
                ]);
            }
        }
        if ($content->checkedServices) {
            for ($i = 0; $i < count($content->checkedServices); $i++) {
                Document::create([
                    'user_id' => Auth::user()->id,
                    'titre' => $sharedDoc->titre,
                    'chemin' => $sharedDoc->chemin,
                    'taille' => $sharedDoc->taille,
                    'extension' => $sharedDoc->extension,
                    'classeur_id' => $content->checkedServices[$i]->classeur_id,
                    'service_id' => $content->checkedServices[$i]->id
                ]);
            }
        }
        if ($content->checkedClasseurs) {
            for ($i = 0; $i < count($content->checkedClasseurs); $i++) {
                Document::create([
                    'user_id' => Auth::user()->id,
                    'titre' => $sharedDoc->titre,
                    'chemin' => $sharedDoc->chemin,
                    'taille' => $sharedDoc->taille,
                    'extension' => $sharedDoc->extension,
                    'classeur_id' => $content->checkedClasseurs[$i]
                ]);
            }
        }

        $documents = Document::where('user_id', '=', Auth::user()->id)->get();
        return Inertia::render('Documents', [
            'user' => Auth::user(),
            'users' => User::all()
                ->where('role', '=', null)
                ->where('id', '!=', Auth::user()->id),
            'services' => Service::all(),
            'documents' => $documents
        ]);
    }

    public function archiving (Request $request)
    {
        $content = json_decode($request->getContent());
        $document = Document::findOrFail($request->docId);
        for ($i = 0; $i < count($content->checkedEtageres); $i++) {
            Document::create([
                'user_id' => Auth::user()->id,
                'titre' => $document->titre,
                'chemin' => $document->chemin,
                'taille' => $document->taille,
                'extension' => $document->extension,
                'classeur_id' => $content->checkedEtageres[$i]->classeur_id,
                'etagere_id' => $content->checkedEtageres[$i]->id
            ]);
        }
    }
}
