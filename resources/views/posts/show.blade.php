@extends('posts.layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">
        <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white mb-10">{{ $post->title }}</h1>
        
        @if ($post->image_path)
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="{{ $post->title }}" class="mb-6 rounded-lg shadow-lg">
        @endif

        <p class="text-2xl font-semibold text-gray-500 dark:text-gray-400 text-justify">{{ $post->content }}</p>
    </div>
@endsection
