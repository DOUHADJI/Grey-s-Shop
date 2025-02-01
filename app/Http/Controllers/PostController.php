<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where("is_published", 1)->paginate(10);
        return view("pages.blog.index", ["posts" => $posts]);
    }

    public function show(string $slug)
    {
        $post = Post::where("slug", $slug)->with(["category", 'tags'])->first();

        return view("pages.blog.post.show", ["post" => $post]);
    }
}
