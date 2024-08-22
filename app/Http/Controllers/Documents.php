<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

use function PHPSTORM_META\type;

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
            $fileSize = $file->getSize();
            $extension = '.'.$file->getClientOriginalExtension();
            $filename = substr($file->getClientOriginalName(), 0, strlen($file->getClientOriginalName()) - strlen($extension));
            $path = $file->store("documents", 'public');
            $path = "/" . $path;

            Document::create([
                'titre' => $filename,
                'chemin' => $path,
                'taille' => $fileSize,
                'extension' => $extension,
                'user_id' => Auth::id()
            ]);

            return Inertia::render('Documents', [
                'user' => Auth::user(),
                'documents' => $documents
            ]);
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
            'documents' => $documents
        ]);
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
