<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() {
        $posts = Post::where('status', Post::PUBLICADO)->latest('id')->paginate(8);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post) {

        $this->authorize('published', $post);

        $author = $post->user;

        $relateds = Post::where('category_id', $post->category_id)
                ->where('status', Post::PUBLICADO)
                ->where('id', '!=', $post->id)
                ->latest('id')
                ->take(4)
                ->get();

        return view('posts.show', compact('post', 'relateds', 'author'));
    }

    public function category(category $category) {
        $posts = Post::where('category_id', $category->id)
                        ->where('status', Post::PUBLICADO)
                        ->latest('id')
                        ->paginate(6);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag) {
        $posts = $tag->posts()
                        ->where('status', Post::PUBLICADO)
                        ->latest('id')
                        ->paginate(6);
                        
        return view('posts.tag', compact('posts', 'tag'));
    }
}
