<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import the model if used

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', compact('posts'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:255',
            'title' => 'required|string',
        ]);

        Post::create($request->only(['title', 'name', 'content']));

        return redirect()->route('post.index');
        
    }
}
?>