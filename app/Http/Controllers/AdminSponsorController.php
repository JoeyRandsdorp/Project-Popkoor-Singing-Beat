<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sponsor;
use Illuminate\Validation\Rules\File;
use Michelf\Markdown;

class AdminSponsorController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin_sponsor.sponsors', ['sponsors' => $sponsors]);
    }

    public function show($id)
    {
        $sponsor = Sponsor::find($id);
        return view('admin_sponsor.details', ['sponsor' => $sponsor]);
    }

    public function create()
    {
        return view('admin_sponsor.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'description' => 'required', 'string',
            'image' => 'required', File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG']),
            'site' => 'string'
        ]);

        if(request()->file('image') === null){
            $image = null;
        } else {
            $image = request()->file('image')->store('welcome_images');
        }

        $text = $request['description'];
        $richText = Markdown::defaultTransform($text);

        Sponsor::create([
            'name' => $request['name'],
            'description' => $richText,
            'image' => $image,
            'site' => $request['site']
        ]);

        return redirect()->route('sponsors.index');
    }

    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        return view('admin_sponsor.edit', compact('sponsor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required', 'string', 'max:255',
            'description' => 'required', 'string',
            'image' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG']),
            'site' => 'required', 'string'
        ]);

        $sponsor = Sponsor::find($id);
        $sponsor->name = $request->get('name');
        $sponsor->description = $request->get('description');
        $sponsor->site = $request->get('site');

        if(request()->file('image') === null){
            $sponsor->save();
            return redirect()->route('sponsors.index');
        } else {
            $image = request()->file('image')->store('sponsor_images');
            $sponsor->image = $image;

            $sponsor->save();
            return redirect()->route('sponsors.index');
        }
    }

    function destroy($id)
    {
        $sponsor = Sponsor::find($id);
        $sponsor->delete();
        return redirect()->route('sponsors.index');
    }
}
