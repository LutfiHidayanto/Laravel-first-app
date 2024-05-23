<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
        // return "Bas";
    }

    public function create() {
        return view('posts.create');
        // return "Hello, this is a simple string response!";
    }
    
    public function table() {
        $posts = Post::all();
        return view('posts.table', compact('posts'));
    }
    
    public function test() {
        return "Test";
    }
    
    public function show($id) {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }


    public function store(Request $request) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create($request->all());
        return redirect()->route('home');
    }

    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('home');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home');
    }
}
