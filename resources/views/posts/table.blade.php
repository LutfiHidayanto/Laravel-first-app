@extends('posts.layouts.app')

@section('content')
    <div>
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">View Table Posts</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Title</th>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Content</th>
                    <th class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                            <a href="{{ route('posts.show', $post->id) }}" class="text-2xl font-semibold text-gray-500 dark:text-gray-400 hover:text-black">{{ $post->title }}</a>
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                            <a class="text-2xl font-semibold text-gray-500 dark:text-gray-400 hover:text-black">{{ $post->content }}</a>
                        </td>
                        <td class="py-2 px-4 border-b border-gray-200 dark:border-gray-700">
                            <a href="{{ route('posts.edit', $post->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-block bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
