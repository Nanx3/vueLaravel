<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('list', compact('posts'));
    }

    public function delete(Post $post) {
        $post->delete();
        return redirect()->route('post.index');
    }
}
