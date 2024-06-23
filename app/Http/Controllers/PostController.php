<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index() {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    public function create() {
        return view('posts.create');
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
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('posts', 'public');

            $postData = $request->except('image');
            $postData['image_path'] = $imagePath;
            
            $post = new Post();
            $post->title = $postData['title'];
            $post->content = $postData['content'];
            $post->image_path = $imagePath;

            $post->save();
        } else {
            Post::create($request->only('title', 'content'));
        }


        // Post::create($request->all());
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
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $postData = $request->except('image');

        $post = Post::findOrFail($id);

        $post->title = $postData['title'];
        $post->content = $postData['content'];

        if ($request->hasFile('image')) {
            if ($post->image_path) {
                Storage::disk('public')->delete($post->image_path);
            }

            $imagePath = $request->file('image')->store('posts', 'public');
            $post->image_path = $imagePath;
        }

        $post->save();


        return redirect()->route('home');
    }

    public function destroy($id) {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home');
    }
}
