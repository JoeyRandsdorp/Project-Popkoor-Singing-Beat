<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
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
        return view('post_user.posts', ['posts' => $posts]);
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
            return view('post_user.details_comments', ['post' => Post::find($id)], ['comments' => $comments]);
        } else {
            return view('post_user.details', ['post' => Post::find($id)]);
        }
    }
}
