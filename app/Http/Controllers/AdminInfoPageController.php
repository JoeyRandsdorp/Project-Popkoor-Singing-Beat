<?php

namespace App\Http\Controllers;

use Illuminate\Console\View\Components\Info;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;
use Michelf\Markdown;
use App\Models\InfoPage;

class AdminInfoPageController extends Controller
{
    public function index()
    {
        $infoPage = InfoPage::all();
        return view('admin_info_page.info', ['infoPage' => $infoPage]);
    }

    public function create()
    {
        return view('admin_info_page.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string',
            'image' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG']),
        ]);

        if(request()->file('image') === null){
            $image = null;
        } else {
            $image = request()->file('image')->store('info_images');
        }

        $text = $request['description'];
        $richText = Markdown::defaultTransform($text);

        InfoPage::create([
            'title' => $request['title'],
            'description' => $richText,
            'image' => $image
        ]);

        return redirect()->route('info.index');
    }

    public function edit($id)
    {
        $infoPage = InfoPage::find($id);
        return view('admin_info_page.edit', compact('infoPage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string',
            'image' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG']),
        ]);

        $infoPage = InfoPage::find($id);
        $infoPage->title = $request->get('title');
        $infoPage->description = $request->get('description');

        if(request()->file('image') === null){
            $infoPage->save();
            return redirect()->route('info.index');
        } else {
            $image = request()->file('image')->store('info_images');
            $infoPage->image = $image;

            $infoPage->save();
            return redirect()->route('info.index');
        }
    }

    public function destroy($id)
    {
        $infoPage = InfoPage::find($id);
        $infoPage->delete();
        return redirect()->route('info.index');
    }
}
