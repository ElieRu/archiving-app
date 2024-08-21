<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class Documents extends Controller
{
    public function show()
    {
        $documents = Document::where('user_id', '=', Auth::user()->id)->get();
        return Inertia::render('Documents', [
            'user' => Auth::user(),
            'documents' => $documents
        ]);
    }

    public function create(Request $request)
    {
        $documents = Document::where('user_id', '=', Auth::user()->id)->get();
        if ($request->hasFile('file')) {

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();            
            $path = $file->store("documents", 'public');
            $path = "/" . $path;

            Document::create([
                'titre' => $filename,
                'chemin' => $path,
                'user_id' => Auth::id()
            ]);

            return Inertia::render('Documents', [
                'user' => Auth::user(),
                'documents' => $documents
            ]);
        }
    }

    public function delete(Request $request)
    {
        $documents = Document::where('user_id', '=', Auth::user()->id)->get();
        Document::findOrFail($request->id)->delete();
        return redirect('show');
        // return Inertia::render('Documents', [
        //     'users' => Auth::user(),
        //     'documents' => $documents
        // ]);
    }
}
