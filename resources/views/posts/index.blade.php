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
    <div class="flex-col space-y-6">
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a class="ms-2 text-2xl font-semibold text-gray-500 dark:text-gray-400 mr-4 hover:text-black" href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                    <a  class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" href="{{ route('posts.edit', $post->id) }}">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button  class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" type="submit">Delete</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
