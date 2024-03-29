<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\File;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use Michelf\Markdown;

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
        $request->validate([
            'title' => 'required', 'string', 'max:255',
            'description' => 'required', 'string',
            'thumbnail' => 'required', File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG']),
            'file' => File::types(['mp3', 'pdf', 'txt']),
            'video' => File::types(['mp4', 'avi', 'mov', 'flv', 'avchd', 'mkv', 'mpeg'])
        ]);

        $path = request()->file('thumbnail')->store('thumbnails');

        if(request()->file('file') === null){
            $file_path = null;
        } else {
            $file_path = request()->file('file')->store('files');
        }

        if(request()->file('video') === null){
            $video_path = null;
        } else {
            $video_path = request()->file('video')->store('videos');
        }

        $text = $request['description'];
        $richText = Markdown::defaultTransform($text);

        Post::create([
            'title' => $request['title'],
            'user_id' => $request ['user_id'],
            'thumbnail' => $path,
            'description' => $richText,
            'file' => $file_path,
            'video' => $video_path,
            'date' => $request['date'],
            'comments' => $request['comments'],
            'pinned' => $request['pinned']
        ]);

        return redirect()->route('posts.index');
    }

    public function comments($id)
    {
        $comments = DB::table('comments')->where('post_id', '=', $id)->get();
        return $comments;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if($post['comments'] === 1){
            $comments = $this->comments($id);
            return view('post_admin.details_comments', ['post' => Post::find($id)], ['comments' => $comments]);
        } else {
            return view('post_admin.details', ['post' => Post::find($id)]);
        }
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
            'thumbnail' => File::types(['gif', 'GIF', 'jpeg', 'JPEG', 'jpg', 'JPG', 'png', 'PNG']),
            'file' => File::types(['mp3', 'pdf', 'txt']),
            'video' => File::types(['mp4', 'avi', 'mov', 'flv', 'avchd', 'mkv', 'mpeg'])
        ]);

        $post = Post::find($id);

        $post->user_id = $request->get('user_id');
        $post->title = $request->get('title');
        $post->description = $request->get('description');
        $post->date = $request->get('date');
        $post->comments = $request->get('comments');
        $post->pinned = $request->get('pinned');

        if(request()->file('thumbnail') === null){
            if(request()->file('file') === null){
                if(request()->file('video') === null){
                    $post->save();
                    return redirect()->route('posts.index');
                } else {
                    $video = request()->file('video')->store('videos');
                    $post->video = $video;

                    $post->save();
                    return redirect()->route('posts.index');
                }
            } else {
                if(request()->file('video') === null){
                    $file = request()->file('file')->store('files');
                    $post->file = $file;

                    $post->save();
                    return redirect()->route('posts.index');
                } else {
                    $file = request()->file('file')->store('files');
                    $post->file = $file;

                    $video = request()->file('video')->store('videos');
                    $post->video = $video;

                    $post->save();
                    return redirect()->route('posts.index');
                }
            }
        } else {
            if(request()->file('file') === null){
                if(request()->file('video') === null){
                    $thumbnail = request()->file('thumbnail')->store('thumbnails');
                    $post->thumbnail = $thumbnail;

                    $post->save();
                    return redirect()->route('posts.index');
                } else {
                    $thumbnail = request()->file('thumbnail')->store('thumbnails');
                    $post->thumbnail = $thumbnail;

                    $video = request()->file('video')->store('videos');
                    $post->video = $video;

                    $post->save();
                    return redirect()->route('posts.index');
                }
            } else {
                if(request()->file('video') === null){
                    $thumbnail = request()->file('thumbnail')->store('thumbnails');
                    $post->thumbnail = $thumbnail;

                    $file = request()->file('file')->store('files');
                    $post->file = $file;

                    $post->save();
                    return redirect()->route('posts.index');
                } else {
                    $thumbnail = request()->file('thumbnail')->store('thumbnails');
                    $post->thumbnail = $thumbnail;

                    $file = request()->file('file')->store('files');
                    $post->file = $file;

                    $video = request()->file('video')->store('videos');
                    $post->video = $video;

                    $post->save();
                    return redirect()->route('posts.index');
                }
            }
        }
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
        $comments = Comment::where('post_id', $id);

        $comments->delete();
        $post->delete();
        return redirect()->route('posts.index');
    }
}
