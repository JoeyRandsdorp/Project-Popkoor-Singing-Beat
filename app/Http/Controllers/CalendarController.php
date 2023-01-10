<?php

namespace App\Http\Controllers;

use App\Models\Calendar;

class CalendarController extends Controller
{
    public function index()
    {
        $calendar_dates = Calendar::query()
            ->orderByRaw('date ASC')
            ->get();
        return view('calendar', ['calendar_dates' => $calendar_dates]);
    }
}
