<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog Site</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=VT323&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-black font-vt323 text-white mx-6 font-medium">
    <div class="flex justify-between items-center border-b border-white/30 py-6">
        <a href="{{ route('home') }}" class="text-4xl text-center font-bold  hover:text-orange-500">Awesome Blog Site</a>
        {{-- @auth
            <x-dev-info/>
        @endauth --}}
         @auth   
            <nav class="flex gap-4 justify-end">
                <x-notification-icon/>
                <x-header-anchor href="{{ route('posts.create')  }}" class="text-2xl"> Create a Post</x-header-anchor>
                <div class="space-x-6">
                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')
                        <button class="text-2xl cursor-pointer hover:text-orange-500">Logout</button>
                    </form>
                </div>
            </nav>
        @endauth
        @guest
            
        <nav class="flex gap-4">
            <x-header-anchor href="{{ route('register')  }}">Register</x-header-anchor>
            <x-header-anchor href="{{ route('login')  }}">Login</x-header-anchor>
        </nav>
        @endguest
    </div>
    <main class="mt-8">
        {{ $slot }}
    </main>

</body>
</html>
