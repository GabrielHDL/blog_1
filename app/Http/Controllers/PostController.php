<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('status', Post::PUBLICADO)->latest('id')->paginate(20);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {
        $author = $post->user;

        $relateds = Post::where('category_id', $post->category_id)
                ->where('status', Post::PUBLICADO)
                ->where('id', '!=', $post->id)
                ->latest('id')
                ->take(4)
                ->get();

        return view('posts.show', compact('post', 'relateds', 'author'));
    }
}
