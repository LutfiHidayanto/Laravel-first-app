@extends('posts.layouts.app')

@section('content')
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">{{ isset($post) ? 'Edit Post' : 'Create Post' }}</h1>
    <form class="flex-col space-y-10" action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST">
        @csrf
        @if (isset($post))
            @method('PUT')
        @endif
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Title" id="username" type="text" name="title" value="{{ old('title', isset($post) ? $post->title : '') }}">
        </div>
        <div>
            <label class="block text-gray-700 text-sm font-bold mb-2" for="content">Content</label>
            <textarea class="w-full h-64 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Title" id="content"  name="content">{{ old('content', isset($post) ? $post->content : '') }}</textarea>
        </div>
        <button class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="submit">{{ isset($post) ? 'Update' : 'Create' }}</button>
    </form>
@endsection
