<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $posts = Post::query();
        $posts->where("is_published", 1);

        $searchTerm = $request->input("search-term");
        if ($searchTerm) {
            $posts->where("title", "like", "%" . $searchTerm . "%");
        }

        $results = $posts->paginate(10);

        return view("pages.blog.index", ["posts" => $results]);
    }

    public function show(string $slug)
    {
        $post = Post::where("slug", $slug)->with(["category", 'tags'])->first();

        return view("pages.blog.post.show", ["post" => $post]);
    }
}
