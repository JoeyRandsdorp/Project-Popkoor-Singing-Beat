<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Michelf\Markdown;
use App\Models\Introduction;

class AdminIntroductionController extends Controller
{
    public function index()
    {
        $introductions = Introduction::all();
        return view('admin_introduction.introduction', ['introductions' => $introductions]);
    }

    public function create()
    {
        return view('admin_introduction.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'function' => 'required', 'string', 'max:255',
            'name' => 'required', 'string', 'max:255',
            'introduction' => 'required', 'string',
            'image' => 'required', File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG'])
        ]);

        if(request()->file('image') === null){
            $image = null;
        } else {
            $image = request()->file('image')->store('introduction_images');
        }

        $text = $request['introduction'];
        $richText = Markdown::defaultTransform($text);

        Introduction::create([
            'function' => $request['function'],
            'name' => $request['name'],
            'introduction' => $richText,
            'image' => $image
        ]);

        return redirect()->route('introduction.index');
    }

    public function edit($id)
    {
        $introduction = Introduction::find($id);
        return view('admin_introduction.edit', compact('introduction'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'function' => 'required', 'string', 'max:255',
            'name' => 'required', 'string', 'max:255',
            'introduction' => 'required', 'string',
            'image' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG'])
        ]);

        $introduction = Introduction::find($id);

        $introduction->function = $request->get('function');
        $introduction->name = $request->get('name');
        $introduction->introduction = $request->get('introduction');

        if(request()->file('image') === null){
            $introduction->save();
            return redirect()->route('introduction.index');
        } else {
            $image = request()->file('image')->store('introduction_images');
            $introduction->image = $image;

            $introduction->save();
            return redirect()->route('introduction.index');
        }
    }

    public function destroy($id)
    {
        $introduction = Introduction::find($id);
        $introduction->delete();
        return redirect()->route('introduction.index');
    }
}
