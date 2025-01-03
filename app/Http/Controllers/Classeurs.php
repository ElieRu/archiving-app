<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateClasseur;
use App\Models\Classeur;
use App\Models\Document;
use App\Models\Etagere;
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

    public function returnArchive(Request $request, $updated = null)
    {
        $etagere = Etagere::findOrFail($request->etagere_id);
        $classeurs = Classeur::where('etagere_id', '=', $request->etagere_id)
            ->paginate(24)
            ->withQueryString();

        return Inertia::render('Etagere', [
            'user' => Auth::user(),
            'etagere' => $etagere,
            'classeurs' => $classeurs,
            'updated' => $updated
        ]);
    }

    public function returnDocument($request)
    {
        $classeurs = Classeur::query()
            ->where(
                'user_id',
                Auth::user()->id
            )->where(
                'service_id',
                null
            )->when($request->search, function ($query, $search) {
                $query->where('classeurs.nom', 'like', "%{$search}%");
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
            'classeurs' => $classeurs,
        ]);
    }

    public function returnService($request)
    {
        $service = Service::findOrFail($request->id);
        if ($request->role) {
            $classeurs = Classeur::where('id', '=', $service->id)
                ->get();
        } else {
            $classeurs = Classeur::query()
                ->where('user_id', '=', Auth::user()->id)
                ->where('service_id', '=', $service->id)
                ->when($request->search, function ($query, $search) {
                    $query->where('classeurs.nom', 'like', "%{$search}%");
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
            ->select('services_users.id as id', 'users.name', 'users.postname', 'services_users.service_id')
            ->get();

        if (!$users->isEmpty()) {
            $all_users = DB::table('users')
                ->join('services_users', 'services_users.user_id', '<>', 'users.id')
                ->where('services_users.service_id', '=', $request->id)
                ->where('users.role', '=', null)
                ->distinct()
                ->select('users.id as id', 'users.name', 'users.postname', 'services_users.service_id')
                ->get();
            $array_users = [];
            foreach ($all_users as $row) {
                if (!in_array($row->id, $users->pluck('id')->toArray())) {
                    $array_users[] = $row;
                }
            }
            $add_users = collect($array_users);
            return $this->returnDatas($users, $add_users, $service, $classeurs, $documents);
        } else {
            $add_users = DB::table('users')
                ->where('users.role', '=', null)
                ->select('users.id as id', 'users.name', 'users.postname')
                ->get();
            return $this->returnDatas($users, $add_users, $service, $classeurs, $documents);
        }
    }

    public function create_classeur($classeurs, $request)
    {
        // dd('not cereated');
        $lenClasseurs = count($classeurs) + 1;
        $defaultName = "Workbooks(" . $lenClasseurs . ")";
        Classeur::create([
            'nom' => $defaultName,
            'user_id' => Auth::user()->id,
            'classeur_id' => $request->classeur_id,
            'service_id' => $request->service_id,
            'etagere_id' => $request->etagere_id,
        ]);
    }

    public function create(Request $request)
    {
        // Classeurs > Documents        
        if (!$request->etagere_id && !$request->service_id) {
            $classeurs = Classeur::where('user_id', Auth::user()->id)->get();
            $this->create_classeur($classeurs, $request);
            return redirect()->route('document.show');
        }

        // Classeurs > Etagere
        if (!$request->service_id && $request->etagere_id) {
            $classeurs = Classeur::where('user_id', Auth::user()->id)
                ->where('etagere_id', $request->etagere_id)->get();

            $this->create_classeur($classeurs, $request);
            return redirect()->route('etagere.more', [
                'id' => $request->etagere_id
            ]);
        }

        // Classeurs > Services
        if ($request->service_id && !$request->etagere_id) {
            $classeurs = Classeur::where('user_id', Auth::user()->id)
                ->where('service_id', $request->service_id)->get();

            $this->create_classeur($classeurs, $request);
            return redirect()->route('service.more', [
                'id' => $request->service_id
            ]);
        }
    }

    public function update(UpdateClasseur $request)
    {
        DB::table('classeurs')
            ->where('id', $request->id)
            ->update([
                'nom' => $request->nom,
                'description' => $request->description
            ]);

        return $this->returnDocument($request);

        // if ($request->etagere_id) {
        //     return $this->returnArchive($request, true);
        // } else {
        //     return $this->returnDocument($request, true);
        // }

        // if ($request->service_id) {
        //     return Inertia::render('ServicesMore', [
        //         'id' => $request->service_id
        //     ]);
        // }

        // } catch (Exception $e) {
        //     if ($request->etagere_id) {
        //         return $this->returnArchive($request);
        //     }

        // if ($request->classeur_id) {
        //     dd('errors');
        //     return $this->returnArchive($request, true);
        // }

        // if (!$request->service_id) {
        // return Inertia::render('ServicesMore', [
        //     'id' => $request->service_id,
        //     'erros' => true
        // ]);
        // }
        // }

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
        Classeur::findOrFail($request->id)->delete();
        if ($request->table === 'documents') {
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

        if ($request->table === 'etageres') {
            return $this->returnArchive($request);
        }

        if ($request->table === 'services') {
            return $this->returnService($request);
        }
    }

    public function more(Request $request)
    {
        if ($request->service_id && $request->id && !$request->etagere_id) {
            // Documents > Service > Classeur            
            $classeurs = Classeur::query()
                ->where('service_id', $request->service_id)
                ->where('etagere_id', null)
                ->when($request->search, function ($query, $search) {
                    $query->where('classeurs.nom', 'like', "%{$search}%");
                })
                ->paginate(24)
                ->withQueryString();

            $classeur = Classeur::findOrFail($request->id);
            $service = Service::findOrFail($request->service_id);

            $documents = Document::where('service_id', $request->service_id)
                ->where('classeur_id', $request->id)
                ->when($request->search, function ($query, $search) {
                    $query->where('documents.titre', 'like', "%{$search}%");
                })->paginate(24)
                ->withQueryString();

            $services = Service::where('id', '<>', $request->service_id)->get();

            return Inertia::render('Classeur', [
                'user' => Auth::user(),
                'documents' => $documents,
                'users' => User::all()
                    ->where('role', '=', null)
                    ->where('id', '!=', Auth::user()->id),
                'services' => $services,
                'service' => $service,
                'classeurs' => $classeurs,
                'classeur' => $classeur,
                'back_menu' => true,
                'etagere' => ''
            ]);
        }

        if (!$request->service_id && $request->id && $request->etagere_id) {
            // Archivage > Etagere > Classeur

            $etagere = Etagere::findOrFail($request->etagere_id);
            $documents = Document::where('etagere_id', $request->etagere_id)
                ->where('classeur_id', $request->id)
                ->where('service_id', null)
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

            $services = DB::table('services')
                ->join('classeurs', 'classeurs.service_id', '=', 'services.id')
                ->where('classeurs.type', '=', 'default')
                ->select('classeurs.id as classeur_id', 'services.nom', 'services.id')
                ->get();

            $classeurs = Classeur::query()
                ->where('user_id', Auth::user()->id)
                ->where('id', '<>', $request->id)
                ->where('service_id', null)
                ->where('etagere_id', $request->etagere_id)
                ->when($request->search, function ($query, $search) {
                    $query->where('classeurs.nom', 'like', "%{$search}%");
                })
                ->paginate(24)
                ->withQueryString();

            $classeur = Classeur::findOrFail($request->id);

            return Inertia::render('Classeur', [
                'user' => Auth::user(),
                'documents' => $documents,
                'users' => $users,
                'services' => $services,
                'service' => '',
                'classeurs' => $classeurs,
                'classeur' => $classeur,
                'back_menu' => true,
                'etagere' => $etagere
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
