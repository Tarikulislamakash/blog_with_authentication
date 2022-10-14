<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard', compact('posts'));
    }


    public function view(Post $post)
    {
        $comments = Comment::where('status', 1)->get();
        return view('post.post', compact('post', 'comments'));
    }


    public function create()
    {
        return view('post.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->back()->with('post-success', 'Post Published Successfully.');
    }


    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }


    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('post.view', $post)->with('post-update', 'Post Updated Successfully.');

    }


    public function hide(Post $post)
    {
        $post->update(['status' => 0]);

        return redirect()->route('admin')->with('post-hide', 'Post Hide Successfully.');
    }

}
