<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use Illuminate\Http\Request;

class AdminCalendarController extends Controller
{
    public function index()
    {
        $calendar_dates = Calendar::query()
            ->orderByRaw('date ASC')
            ->get();
        return view('admin_calendar.calendar', ['calendar_dates' => $calendar_dates]);
    }

    public function create()
    {
        return view('admin_calendar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
            'place' => 'required', 'string', 'max:255'
        ]);

        Calendar::create([
            'date' => $request['date'],
            'start_time' => $request['start_time'],
            'end_time' => $request['end_time'],
            'title' => $request['title'],
            'description' => $request['description'],
            'place' => $request['place']
        ]);

        return redirect()->route('calendar.index');
    }

    public function edit($id)
    {
        $calendar = Calendar::find($id);
        return view('admin_calendar.edit', compact('calendar'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
            'place' => 'required', 'string', 'max:255'
        ]);

        $calendar = Calendar::find($id);

        $calendar->date = $request->get('date');
        $calendar->start_time = $request->get('start_time');
        $calendar->end_time = $request->get('end_time');
        $calendar->title = $request->get('title');
        $calendar->description = $request->get('description');
        $calendar->place = $request->get('place');

        $calendar->save();
        return redirect()->route('calendar.index');
    }

    public function destroy($id)
    {
        $calendar = Calendar::find($id);
        $calendar->delete();
        return redirect()->route('calendar.index');
    }
}
