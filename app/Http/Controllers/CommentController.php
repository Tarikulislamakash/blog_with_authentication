<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'username' => 'required',
            'comment' => 'required',
        ]);

        Comment::create([
            'content' => $request->comment,
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('post.view', $post)->with('comment-create', 'Comment Created Successfully.');
    }


    public function hide(Comment $comment, Post $post)
    {
        $comment->update(['status' => 0]);
        return redirect()->route('post.view', $post)->with('comment-hide', 'Comment Hide Successfully.');
    }
}
