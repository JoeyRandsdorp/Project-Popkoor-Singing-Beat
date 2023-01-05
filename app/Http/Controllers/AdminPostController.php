<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::query()
            ->orderByRaw('pinned DESC, created_at DESC')
            ->get();
        return view('post_admin.posts', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('post_admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $path = request()->file('thumbnail')->store('thumbnails');


        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
            'thumbnail' => 'image'
        ]);

        $request['user_id'] = auth()->id();
//        $request['thumbnail'] === $path;

        Post::create([
            'title' => $request['title'],
            'user_id' => $request ['user_id'],
            'thumbnail' => $path,
            'description' => $request['description'],
            'file' => $request['file'],
            'date' => $request['date'],
            'comments' => $request['comments'],
            'pinned' => $request['pinned']
        ]);

//        $attributes = request()->validate([
//            'title' => 'required|string|max:255',
//            'thumbnail' => 'image',
//            'description' => 'required|string',
//            'file' => 'required|string|max:255',
//            'date' => 'required|integer',
//            'comments' => 'required|integer',
//            'pinned' => 'required|integer'
//        ]);
//
//        $attributes['user_id'] = auth()->id();
//        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
//
////        Post::create($attributes);
//
//        Post::create([
//            'user_id' => $attributes['user_id'],
//            'title' => $attributes['title'],
//            'thumbnail' => $attributes['thumbnail'],
//            'description' => $attributes['description'],
//            'file' => $attributes['file'],
//            'date' => $attributes['date'],
//            'comments' => $attributes['comments'],
//            'pinned' => $attributes['pinned'],
//        ]);



        return redirect()->route('posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post_admin.details', ['post' => Post::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post_admin.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|string|max:255'
        ]);
        $post = Post::find($id);
        $post->user_id = $request->get('user_id');
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->date = $request->get('date');
        $post->file = $request->get('file');
        $post->comments = $request->get('comments');
        $post->pinned = $request->get('pinned');
        $post->save();
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    }
}
