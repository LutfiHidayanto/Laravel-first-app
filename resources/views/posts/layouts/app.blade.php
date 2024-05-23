<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog App')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="m-0 p-0">
    <header class="flex items-center justify-around bg-sky-500 h-16">
        <figure class="logo w-1/2 h-10 px-4">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRJ1mPVqs8jJ5SGlt3iqip6KkV3rKRYPNxwc5oNWaBiEA&s" class="max-h-full">
        </figure>
        <nav class="flex items-center justify-end w-1/2 h-full gap-x-4">
            <a href="{{ route('home') }}" class="flex items-center hover:text-white hover:bg-sky-700 h-full p-5">Home</a>
            <a href="{{ route('posts.create') }}" class="flex items-center hover:text-white hover:bg-sky-700 h-full p-5">Create Posts</a>
            <a href="{{ route('posts.table') }}" class="flex items-center hover:text-white hover:bg-sky-700 h-full p-5">Table</a>
        </nav>
    </header>

    <main class="flex justify-center items-center py-8 px-10">
        <div class="flex-col justify-center items-center">
            @yield('content')
        </div>
    </main>

    <footer>
        <!-- Add footer content here -->
    </footer>

    <!-- Add your JavaScript scripts or links here -->
</body>
</html>
