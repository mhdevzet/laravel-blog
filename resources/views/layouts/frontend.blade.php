<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Page</title>

    {{-- Tailwind css cdn --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header class="bg-indigo-600 text-white py-3">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between gap-10 text-xl">
                <a href="{{url('blog')}}">Blog</a>

                @if (!empty(Auth::user()->name))
                <h2 class="text-2xl font-semibold text-center my-3 capitalize">Welcome {{Auth::user()->name}}</h2>
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    @method('DELETE')
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Logout
                    </button>
                </form>
                @endif
            </div>
        </div>
    </header>
    <main class="py-20">
        <div class="container mx-auto px-4">
            @yield('content')
        </div>
    </main>
</body>

</html>