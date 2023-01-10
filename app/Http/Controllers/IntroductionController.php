<?php

namespace App\Http\Controllers;

use App\Models\Introduction;
use Illuminate\Http\Request;

class IntroductionController extends Controller
{
    public function index()
    {
        $introductions = Introduction::all();
        return view('introduction', ['introductions' => $introductions]);
    }

    public function show($id)
    {
        $introduction = Introduction::find($id);
        return view('introduction_details', ['introduction' => $introduction]);
    }
}
