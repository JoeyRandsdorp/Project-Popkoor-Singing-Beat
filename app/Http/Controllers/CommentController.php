<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CommentController extends Controller
{
    public static function users($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();
        $user_name = $user->name;
        $user_lastname = $user->lastname;
        $user_full_name = $user_name . " " . $user_lastname;
        return $user_full_name;
    }

    public function index($id)
    {
        $comments = DB::table('comments')->where('post_id', '=', $id)->get();
        return $comments;
    }

    public function store(Request $request)
    {
        $request->validate([
           'comment' => 'required', 'string'
        ]);

        Comment::create([
            'user_id' => $request['user_id'],
            'post_id' => $request['post_id'],
            'comment' => $request['comment'],
            'date' => $request['date']
        ]);

        $comments = $this->index($request['post_id']);

        if(auth()->user()?->admin_role !== 1){
            return view('post_user.details_comments', ['post' => Post::find($request['post_id'])], ['comments' => $comments]);
        }
        else {
            return view('post_admin.details_comments', ['post' => Post::find($request['post_id'])], ['comments' => $comments]);
        }
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        $posts = Post::query()
            ->orderByRaw('pinned DESC, created_at DESC')
            ->get();
        if(auth()->user()?->admin_role !== 1){
            return view('post_user.posts', ['posts' => $posts]);
        }
        else {
            return view('post_admin.posts', ['posts' => $posts]);
        }
    }
}
