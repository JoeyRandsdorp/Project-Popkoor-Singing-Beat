<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archive;
use Illuminate\Validation\Rules\File;

class AdminArchiveController extends Controller
{
    public function index()
    {
        $archive = Archive::query()
            ->orderByRaw('date DESC')
            ->get();
        return view('admin_archive.archive', ['archive' => $archive]);
    }

    public function show($id)
    {
        $archive = Archive::find($id);
        return view('admin_archive.details', ['archive' => $archive]);
    }

    public function create()
    {
        return view('admin_archive.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
            'pdf' => 'required', File::types(['pdf']),
            'date' => 'required'
        ]);

        if(request()->file('pdf') === null){
            $pdf = null;
        } else {
            $pdf = request()->file('pdf')->store('pdfs');
        }

        Archive::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'pdf' => $pdf,
            'date' => $request['date']
        ]);

        return redirect()->route('archive.index');
    }

    public function edit($id)
    {
        $archive = Archive::find($id);
        return view('admin_archive.edit', compact('archive'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
            'pdf' => File::types(['pdf']),
            'date' => 'required'
        ]);

        $archive = Archive::find($id);

        $archive->title = $request->get('title');
        $archive->description = $request->get('description');
        $archive->date = $request->get('date');

        if(request()->file('pdf') === null){
            $archive->save();
            return redirect()->route('archive.index');
        } else {
            $pdf = request()->file('pdf')->store('pdfs');
            $archive->pdf = $pdf;

            $archive->save();
            return redirect()->route('archive.index');
        }
    }

    public function destroy($id)
    {
        $archive = Archive::find($id);
        $archive->delete();
        return redirect()->route('archive.index');
    }
}
