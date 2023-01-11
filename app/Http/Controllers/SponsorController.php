<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('sponsors', ['sponsors' => $sponsors]);
    }

    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        return view('sponsor_details', ['sponsor' => $sponsor]);
    }
}
