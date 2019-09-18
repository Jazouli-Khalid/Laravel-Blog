<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, $slug){
        $request->validate([
            'body' => 'required'
            ]);
        $post = Post::where('slug', $slug)->firstOrFail();

        $userId = Auth::id();

        $comment = new Comment();
        $comment->body = $request->body;
        $comment->post()->associate($post);
        $comment->user_id = $userId;

        $comment->save();

        return redirect()->route('posts.show', $slug)->with('success', 'Comment Added Successfully');
    }
}
