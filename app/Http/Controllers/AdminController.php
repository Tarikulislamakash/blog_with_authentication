<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.admin', compact('posts'));
    }
}
