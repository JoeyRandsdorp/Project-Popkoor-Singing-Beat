<?php

namespace App\Http\Controllers;

use App\Models\ContactPage;
use Illuminate\Http\Request;

class ContactPageController extends Controller
{
    public function index()
    {
        $contactPages = ContactPage::all();
        return view('contact', ['contactPages' => $contactPages]);
    }
}
