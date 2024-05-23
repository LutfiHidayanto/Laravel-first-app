@extends('posts.layouts.app')

@section('content')
    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white mb-10">{{ $post->title }}</h1>
    <p class="ms-2 text-2xl font-semibold text-gray-500 dark:text-gray-400 text-justify">{{ $post->content }}</p>
@endsection
