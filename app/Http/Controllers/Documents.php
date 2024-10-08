<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocumentRequest;
use App\Models\Classeur;
use App\Models\Document;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
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

    public function show(Request $request)
    {
        $classeurs = Classeur::query()
            ->where(
                'user_id',
                '=',
                Auth::user()->id
            )->where(
                'service_id',
                '=',
                null
            )->when($request->searchClasseur, function ($query, $searchClasseur) {
                $query->where('classeurs.nom', 'like', "%{$searchClasseur}%");
            })
            ->paginate(24)
            ->withQueryString();

        $documents = Document::where(
            'user_id',
            '=',
            Auth::user()->id
        )->where(
            'service_id',
            '=',
            null
        )
            ->where('classeur_id', '=', null)
            ->when($request->search, function ($query, $search) {
                $query->where('documents.titre', 'like', "%{$search}%");
            })->paginate(24)
            ->withQueryString();

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

            // Classeurs

            // return to_route('classeur.more', [
            //     'id' => $request->classeur_id
            // ]);

            // if ($request->service_id) {
            //     return redirect()->route('service.more', [
            //         'id' => $request->service_id
            //     ]);
            // }

            if ($request->classeur_id) {
                return redirect()->route('classeur.more', [
                    'id' => $request->classeur_id
                ]);
            }
            
            if ($request->classeur_id && $request->etagere_id) {
                return redirect()->route('classeur.more', [
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
        if ($request->render_page === 'documents') {
            $request->id = $request->classeur_id;
            return $this->index($request);
        } else if ($request->render_page === 'services') {
            return redirect()->route('services.show');
        }
    }

    public function share(Request $request)
    {
        $content = json_decode($request->getContent());
        $sharedDoc = Document::findOrFail($content->docId);

        if ($content->checkedUsers) {
            for ($i = 0; $i < count($content->checkedUsers); $i++) {
                Document::create([
                    'user_id' => Auth::user()->id,
                    'titre' => $sharedDoc->titre,
                    'chemin' => $sharedDoc->chemin,
                    'taille' => $sharedDoc->taille,
                    'extension' => $sharedDoc->extension,
                    'user_id' => $content->checkedUsers[$i]
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
                    'service_id' => $content->checkedServices[$i]
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
}
