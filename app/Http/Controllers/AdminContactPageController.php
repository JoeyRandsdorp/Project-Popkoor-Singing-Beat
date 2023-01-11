<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactPage;
use Illuminate\Validation\Rules\File;
use Michelf\Markdown;

class AdminContactPageController extends Controller
{
    public function index()
    {
        $contactPages = ContactPage::all();
        return view('admin_contact_page.contact', ['contactPages' => $contactPages]);
    }

    public function create()
    {
        return view('admin_contact_page.create');
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
            $image = request()->file('image')->store('contact_images');
        }

        $text = $request['description'];
        $richText = Markdown::defaultTransform($text);

        ContactPage::create([
            'title' => $request['title'],
            'description' => $richText,
            'image' => $image
        ]);

        return redirect()->route('contact.index');
    }

    public function edit($id)
    {
        $contactPage = ContactPage::find($id);
        return view('admin_contact_page.edit', compact('contactPage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string',
            'image' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG']),
        ]);

        $contactPage = ContactPage::find($id);
        $contactPage->title = $request->get('title');
        $contactPage->description = $request->get('description');

        if(request()->file('image') === null){
            $contactPage->save();
            return redirect()->route('contact.index');
        } else {
            $image = request()->file('image')->store('contact_images');
            $contactPage->image = $image;
            $contactPage->save();
            return redirect()->route('contact.index');
        }
    }

    public function destroy($id)
    {
        $contactPage = ContactPage::find($id);
        $contactPage->delete();
        return redirect()->route('contact.index');
    }
}
