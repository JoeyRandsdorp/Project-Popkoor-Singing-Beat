<?php

namespace App\Http\Controllers;

use App\Models\WelcomePage;

class WelcomePageController extends Controller
{
    public function index()
    {
        $welcomePage = WelcomePage::all();
        return view('welcome', ['welcomePage' => $welcomePage]);
    }
}
