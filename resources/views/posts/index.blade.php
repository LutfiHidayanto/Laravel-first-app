@extends('posts.layouts.app')

@section('content')
    <div>
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Blog Posts</h1>
    </div>
    <div class="flex justify-center items-center mb-10">
        <a href="{{ route('posts.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Create New Post
        </a>
    </div>
    <div class="space-y-6">
        <ul>
            @foreach ($posts as $post)
                <li class="flex justify-between items-center mb-4 p-4 bg-gray-100 rounded-lg shadow dark:bg-gray-800">
                    <a class="text-2xl font-semibold text-gray-500 dark:text-gray-400 hover:text-black" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    <div class="flex space-x-2">
                        <a class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" href="{{ route('posts.show', $post->id) }}">View</a>
                        <a class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
