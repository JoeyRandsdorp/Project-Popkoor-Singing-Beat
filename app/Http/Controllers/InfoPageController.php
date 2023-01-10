<?php

namespace App\Http\Controllers;

use App\Models\InfoPage;

class InfoPageController extends Controller
{
    public function index()
    {
        $infoPage = InfoPage::all();
        return view('info', ['infoPage' => $infoPage]);
    }
}
