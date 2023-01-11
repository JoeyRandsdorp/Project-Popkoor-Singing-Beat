<?php

namespace App\Http\Controllers;

use App\Models\Archive;

class ArchiveController extends Controller
{
    public function index()
    {
        $archive = Archive::query()
            ->orderByRaw('date DESC')
            ->get();
        return view('archive', ['archive' => $archive]);
    }

    public function show($id)
    {
        $archive = Archive::find($id);
        return view('archive_details', ['archive' => $archive]);
    }
}
