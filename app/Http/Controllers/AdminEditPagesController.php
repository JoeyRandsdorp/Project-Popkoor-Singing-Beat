<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminEditPagesController extends Controller
{
    public function index()
    {
        return view('admin_edit_pages.edit_pages');
    }
}
