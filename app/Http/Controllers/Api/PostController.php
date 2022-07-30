<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('published', true)->with(['category', 'tags', 'user'])->get();

        return response()->json($posts);
    }
    // api/post/come creare un div
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->with(['category', 'tags', 'user'])->get()->first();

        // caso 404
        if ( empty($post) ) {
            return response()->json(['message' => 'Post not found'], 404);
        }

        return response()->json($post);
    }
}
